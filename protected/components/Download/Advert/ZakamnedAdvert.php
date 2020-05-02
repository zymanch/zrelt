<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 29.06.14
 * Time: 7:18
 */
Yii::import('ext.EGMap.*');
class ZakamnedAdvert extends DownloadAdvert {

    const SOURCE_ID = 3;

    protected $_address;
    protected $_floor;
    protected $_space;
    protected $_balcony;
    protected $_phoneExist;
    protected $_steelDoor;
    protected $_info;
    protected $_price;
    protected $_seller;
    protected $_sellerPhone;
    protected $_url;

    public function __construct(phpQueryObject $row, $url) {
        $cells = $row->find('td');
        $address = pq($cells->elements[0])->text();
        $floor = pq($cells->elements[1])->text();
        $space = pq($cells->elements[2])->text();
        $balcony = pq($cells->elements[3])->text();
        $homePhone = pq($cells->elements[4])->text();
        $door = pq($cells->elements[5])->text();
        $reltor = pq($cells->elements[6])->text();
        $reltorPhone = pq($cells->elements[7])->text();
        $price = intval(pq($cells->elements[8])->text());
        $info = pq($cells->elements[9])->text();

        $this->_address = $address;
        $this->_floor = explode('/',$floor);
        $this->_space = explode('/',$space);
        $this->_balcony = $this->_parseBool($balcony, true);
        $this->_phoneExist = $this->_parseBool($homePhone, false);
        $this->_steelDoor = $this->_parseBool($door, false);
        $this->_info = trim($info);
        $this->_price = $this->_parsePrice($price);
        $this->_seller = trim($reltor);
        $this->_sellerPhone = trim($reltorPhone);
        $this->_url = $url;

    }

    protected function _parsePrice($price) {
        if (!$price) {
            return null;
        }
        if ($price > 33 && $price < 55) {
            if (!$this->_space[0]) {
                return null;
            }
            return $this->_space[0]*$price*1000;
        }
        if ($price < 20000) {
            return 1000*($price < 30 ? 1000: 1) * $price;
        }
        return $price;
    }

    protected function _parseBool($text,$canBeInt = false) {
        switch (trim($text)) {
            case '+':
                if ($canBeInt) {
                    return 1;
                }
                return true;
            case '-':
                if ($canBeInt) {
                    return 0;
                }
                return false;
            default:
                $int = (int)$text;
                if ($canBeInt && $int > 0) {
                    return $int;
                }
                return null;
        }
    }

    public function save() {
        $mainAttributes = array(
            'type' => $this->_getType(),
            'floor' => $this->_floor[0],
            'space_total' => intval($this->_space[0],10),
            'seller_id' => $this->_getSellerId($this->_seller, $this->_sellerPhone),
            'address_id' => $this->_getAddressId(),
            'source_id' => self::SOURCE_ID,
        );
        $additionalAttributes = array(
            'floor_max' => $this->_floor[1],
            'balcony' => is_null($this->_balcony) ? null : $this->_balcony,
            'phone' => is_null($this->_phoneExist) ? null : ($this->_phoneExist ? 'yes' : 'no'),
            'steel_door' => is_null($this->_steelDoor) ? null : ($this->_steelDoor ? 'yes' : 'no'),
            'space_living' => isset($this->_space[1]) && intval($this->_space[1],10)? intval($this->_space[1],10) : null,
            'space_cookroom' => isset($this->_space[2]) && intval($this->_space[2],10)? intval($this->_space[2],10) : null,
            'url' => $this->_url,
            'created' => date('Y-m-d H:i:s')
        );
        $newAttributes = array(
            'information' => $this->_info,
            'price' => $this->_price,
        );
        $advert = Advert::model()->findByAttributes($mainAttributes);
        if (!$advert) {
            $advert = new Advert();
            $advert->setAttributes($mainAttributes);
            $advert->setAttributes($additionalAttributes);
        }
        $advert->setAttributes($newAttributes);
        if (!$advert->save()) {
            print iconv('utf-8','cp866',$advert->getErrorsAsText())."\n";
        }
        return array(
            $advert->id
        );
    }


    protected function _getAddressId() {
        $accessor = new AddressFindOrCreateCommand();
        $address = $accessor->findOrCreate($this->_address);
        return $address ? $address->id : null;
    }

    protected function _getType() {
        parse_str(parse_url($this->_url, PHP_URL_QUERY), $params);
        if ($params['b']) {
            return $params['b'].'_room';
        } else {
            return 'barchelor';
        }
    }
}