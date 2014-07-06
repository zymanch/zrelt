<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:50
 */
class Advert extends CAdvert {


    public function getTypeLabel() {
        $variants = self::getVariants();
        return $variants[$this->type];
    }

    public function getHumanPrice() {
        if ($this->price) {
            return number_format($this->price).'руб';
        }
        return 'договорная';
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
}