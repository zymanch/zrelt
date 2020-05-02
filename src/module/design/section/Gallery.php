<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\section;

class Gallery extends \module\design\Section {

    const COLUMNS = 5;
    const HALF_WIDTH_PERT = 0.6;

    const TYPE_FULL = 1;
    const TYPE_HALF = 2;



    public $items = [];

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_CLICK_MENU,self::LAYOUT_MEGA_MENU,self::LAYOUT_DEFAULT_MENU,self::LAYOUT_RIGHT_MENU];
    }

    public function getViewFileName()
    {
        return 'section/gallery';
    }


    public function getGroupedItems()
    {

        if (!$this->items) {
            return [];
        }
        $maxWidth = 0;
        foreach ($this->items as $item) {
            if ($item['width'] > $maxWidth) {
                $maxWidth = $item['width'];
            }
        }
        $halfGroup = [];
        $halfHeight = 0;
        $fullGroup = [];
        $fullHeight = 0;
        foreach ($this->items as $item) {
            if ($item['width'] > self::HALF_WIDTH_PERT*$maxWidth) {
                $fullGroup[] = $item;
                $fullHeight+=$item['height'];
            } else {
                $halfGroup[] = $item;
                $halfHeight+=$item['height'];
            }
        }
        $sortByHeight = function($a, $b) {
            if ($a['height'] == $b['height']) {
                return 0;
            }
            return ($a['height'] < $b['height']) ? 1 : -1;
        };
        usort($fullGroup, $sortByHeight);
        usort($halfGroup, $sortByHeight);
        $result = array_fill(0,self::COLUMNS,['type' => self::TYPE_FULL,'items' => []]);

        $halfSize = $halfHeight/2;
        $fullSize = $fullHeight;
        $fullColumns = round(self::COLUMNS*$fullSize/($fullSize+$halfSize));
        //var_dump($fullHeight,$halfHeight);die();
        $heights = array_fill(0,$fullColumns,0);
        foreach ($fullGroup as $item) {
            $column = 0;
            $minValue = $heights[$column];
            foreach ($heights as $index => $value) {
                if ($value < $minValue) {
                    $minValue = $value;
                    $column = $index;
                }
            }
            $result[$column]['items'][] = $item;
            $heights[$column]+=$item['height'];
        }

        $halfColumns = self::COLUMNS - $fullColumns;
        $heights = array_fill(0,$halfColumns,0);
        foreach ($halfGroup as $item) {
            $column = 0;
            $minValue = $heights[$column];
            foreach ($heights as $index => $value) {
                if ($value < $minValue) {
                    $minValue = $value;
                    $column = $index;
                }
            }
            $result[$fullColumns+$column]['type'] = self::TYPE_HALF;
            $result[$fullColumns+$column]['items'][] = $item;
            $heights[$column]+=$item['height'];
        }
        return $result;
    }



}