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