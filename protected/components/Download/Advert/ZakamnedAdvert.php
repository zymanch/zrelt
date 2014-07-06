<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 29.06.14
 * Time: 7:18
 */
class ZakamnedAdvert extends DownloadAdvert {

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
        $info = pq($cells->elements[6])->text();
        $price = (int)(pq($cells->elements[7])->text());
        $reltor = pq($cells->elements[8])->text();
        $reltorPhone = pq($cells->elements[9])->text();

        $this->_address = explode('/',$address);
        $this->_floor = explode('/',$floor);
        $this->_space = explode('/',$space);
        $this->_balcony = $this->_parseBool($balcony, true);
        $this->_phoneExist = $this->_parseBool($homePhone, false);
        $this->_steelDoor = $this->_parseBool($door, false);
        $this->_info = trim($info);
        $this->_price = $price ? $price * ($price < 20000 ? 1000*($price < 30 ? 1000: 1):1) : null;
        $this->_seller = trim($reltor);
        $this->_sellerPhone = trim($reltorPhone);
        $this->_url = $url;

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
            'seller_id' => $this->_getSellerId(),
            'address_id' => $this->_getAddressId(),
            'source_id' => 3,
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
            print ($advert->getErrorsAsText())."\n";
        }
        return array(
            $advert->id
        );
    }

    protected function _getSellerId() {
        $seller = Seller::model()->findByAttributes(array(
            'type' => 'reltor',
            'name' => $this->_seller
        ));
        if (!$seller) {
            $seller = new Seller();
            $seller->type = 'master';
            $seller->name = $this->_seller;
            $seller->save();
        }
        $phoneNumbers = $this->_extractPhones();
        foreach ($phoneNumbers as $phoneNumber) {
            $phone = SellerPhone::model()->findByAttributes(array(
                'seller_id' => $seller->id,
                'phone'     => $phoneNumber
            ));
            if (!$phone) {
                $phone = new SellerPhone();
                $phone->seller_id = $seller->id;
                $phone->phone = $phoneNumber;
                $phone->save();
            }
        }
        return $seller->id;
    }

    protected function _extractPhones() {
        return explode(',',preg_replace('/[^0-9\+,]+/','',$this->_sellerPhone));
    }

    protected function _getAddressId() {
        preg_match('/[0-9]+/',$this->_address[0], $complex);
        $complex = $complex[0];
        $complexHouse = isset($this->_address[1]) ? intval(trim($this->_address[1])) : null;
        $complexStructure = isset($this->_address[2]) ? trim($this->_address[2]) : null;
        $address = Address::model()->findByAttributes(array(
            'complex' => $complex,
            'complex_house' => $complexHouse,
            'complex_structure' => $complexStructure
        ));
        if (!$address) {
            $address = new Address();
            $address->complex = $complex;
            $address->complex_house = $complexHouse;
            $address->complex_structure = $complexStructure;
            if (!$address->save()) {
                var_dump($address->getErrorsAsText());
            }
        }
        return $address->id;
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