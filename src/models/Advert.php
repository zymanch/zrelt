<?php
namespace models;

use models\base;

class Advert extends base\BaseAdvert {

    const STEEL_DOOR_YES = 'yes';
    const STEEL_DOOR_NO = 'no';
    const PHONE_YES = 'yes';
    const PHONE_NO = 'no';
    const EXCHANGE_YES = 'yes';
    const EXCHANGE_NO = 'no';


    public function getTypeLabel() {
        $variants = self::getVariants();
        return $variants[$this->type];
    }

    public function getHumanPrice() {
        if ($this->price) {
            return number_format($this->price).'&#8381;';
        }
        return 'договорная';
    }

    public function get1MeterPrice()
    {
        if ($this->price && $this->space_total) {
            return number_format($this->price/$this->space_total).'&#8381;/м';
        }
    }

    public function getHumanSpace() {
        $result = array($this->space_total);
        if ($this->space_living) {
            $result[] = $this->space_living;
        }
        if ($this->space_cookroom) {
            $result[] = $this->space_cookroom;
        }
        return implode('/',$result);
    }

    public function getHumanBalcony() {
        if (is_null($this->balcony)) {
            return 'неизвестно';
        }
        if ($this->balcony == 0) {
            return 'нет';
        }
        if ($this->balcony == 1) {
            return 'есть';
        }
        return $this->balcony.'м.';
    }

    public function getHumanPhone() {
        if (is_null($this->phone)) {
            return 'неизвестно';
        }
        if ($this->phone == 'yes') {
            return 'есть';
        }
        return 'нет';
    }

    public function getHumanSteelDoor() {
        if (is_null($this->steel_door)) {
            return 'неизвестно';
        }
        if ($this->steel_door == 'yes') {
            return 'есть';
        }
        return 'нет';
    }

    public static function getVariants() {
        return array(
            '1_room' => 'Однокомнатная',
            '2_room' => 'Двухкомнатная',
            '3_room' => 'Трехкомнатная',
            '4_room' => 'Четырехкомнатная',
            '5_room' => 'Патикомнатная',
            '6_room' => 'Шестикомнатная',
            'barchelor' => 'Малосемейка'
        );
    }
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'type' => 'Тип',
            'address_id' => 'Адресс',
            'floor' => 'Этаж',
            'floor_max' => 'Всего этажей',
            'space_total' => 'Общая площадь, м',
            'space_living' => 'Жилая площадь, м',
            'space_cookroom' => 'Кухня, м',
            'balcony' => 'Балкон, м',
            'phone' => 'Телефон',
            'steel_door' => 'Железная дверь',
            'information' => 'Дополнительно',
            'price' => 'Цена',
            'seller_id' => 'Продавец',
            'source_id' => 'Источник',
            'url' => 'Ссылка',
            'created' => 'Создано',
            'expired' => 'Истекло',
            'status' => 'Статус',
            'changed' => 'Изменен',
        );
    }

    public function save($runValidation=true,$attributes=null) {
        if ($this->getIsNewRecord()) {
            $this->exchange = strpos($this->information,'обмен') ? 'yes' : 'no';
        }
        return parent::save($runValidation, $attributes);
    }

}