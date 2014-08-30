<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:31
 */
class AvitoAdvert extends DownloadAdvert {

    const SOURCE_ID = 2;

    protected $id;

    protected $_roomCount;
    protected $_address;
    protected $_maxFloor;
    protected $_floor;
    protected $_space;
    protected $_info;
    protected $_price;
    protected $_seller;
    protected $_url;

    public function __construct($id, $url) {
        $this->id = $id;
        $this->_url = AvitoPagination::DOMAIN.$url;
        $content = Yii::app()->curl->get($this->_url);
        $document = phpQuery::newDocumentHTML($content,'iso-8859-1');
        $attributes = explode(',',$document->find('h1[itemprop=name]')->html());
        $this->_price = $this->_parsePrice($document->find('.t-item-price span')->html());
        $this->_seller = trim($document->find('#seller strong')->html());
        $this->_address = $document->find('[itemprop=address] span span')->html();
        $this->_info = trim(strip_tags($document->find('#desc_text')->html()));
        foreach ($attributes as $attribute) {
            if (strpos($attribute,'квартира')) {
                $this->_roomCount = intval($attribute);
            } else if (strpos($attribute,'эт.')) {
                $attribute = explode('/',$attribute,2);
                $this->_floor = intval($attribute[0]);
                if (sizeof($attribute) == 2) {
                    $this->_maxFloor = intval($attribute[1]);
                }

            } else if (strpos($attribute,' м')) {
                $this->_space = intval($attribute);
            }
        }
    }


    public function save() {
        if (!$this->_roomCount) {
            return array();
        }
        $advert = Advert::model()->findByAttributes(array(
            'source_id'   => self::SOURCE_ID,
            'source_code' => $this->id
        ));
        if ($advert) {
            $advert->attributes = array(
                'price' =>  $this->_price,
                'url' => $this->_url,
                'information' => $this->_info
            );
            $advert->save();
            return array(
                $advert->id
            );
        }
        $advert = new Advert();
        $advert->attributes = array(
            'type' => $this->_roomCount.'_room',
            'address_id' => $this->_getAddressId($this->_address),
            'floor' => $this->_floor,
            'floor_max' => $this->_maxFloor,
            'space_total' => $this->_space,
            'information' => $this->_info,
            'price' => $this->_price,
            'source_code' => $this->id,
            'seller_id' => $this->_getSellerId($this->_seller),
            'source_id' => self::SOURCE_ID,
            'url' => $this->_url,
            'created' => date('Y-m-d H:i:s')
        );
        $advert->save(false);
        return array();
    }
}