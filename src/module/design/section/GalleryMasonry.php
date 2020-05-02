<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\section;

class GalleryMasonry extends \module\design\Section {

    public $items = [];

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_CLICK_MENU,self::LAYOUT_MEGA_MENU,self::LAYOUT_DEFAULT_MENU,self::LAYOUT_RIGHT_MENU];
    }

    public function getViewFileName()
    {
        return 'section/gallery_masonry';
    }


    public function getCategories()
    {
        $categories = [];
        foreach ($this->items as $item) {
            foreach ($item['category']??[] as $category) {
                $categories[] = $category;
            }
        }
        return array_unique($categories);

    }

    public function getAverageWidth()
    {
        $result = [];
        foreach ($this->items as $item) {
            $result[] = $item['width'];
        }
        return $result ? array_sum($result)/count($result) : 100;
    }

    public function getAverageHeight()
    {
        $result = [];
        foreach ($this->items as $item) {
            $result[] = $item['height'];
        }
        return $result ? array_sum($result)/count($result) : 100;
    }


}