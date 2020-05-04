<?php
namespace models\search;
use ActiveGenerator\Criteria;
use models\Address;
use models\AddressQuery;

/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:50
 */
class SearchAddress extends \models\base\BaseAddress {

    public function getAddressTree() {
        $addresses = Address::find()
            ->andWhere('complex is not null')
            ->andWhere('complex_house is not null')
            ->andWhere('complex_house<>""')
            ->andWhere('map_x <> 0')
            ->andWhere('map_y <> 0')
            ->orderBy('cast(complex as unsigned) asc, cast(complex_house as unsigned) asc')
            ->all();
        $result = array();
        /** @var Address $address */
        foreach ($addresses as $address) {
            if (!isset($result[$address->complex])) {
                $result[$address->complex] = array();
            }
            $result[$address->complex][] = $address;
        }
        return $result;
    }

    public function autocomplete($text)
    {
        $query = Address::find();
        $parts = explode(',',AddressQuery::normalizeAddress($text));
        foreach ($parts as $index => $part) {
            if (strpos($part, AddressQuery::SELO) !== false || strpos($part, AddressQuery::CITY) !== false) {
                unset($parts[$index]);
            }
        }
        $text = implode(',',$parts);
        $index = 0;
        $complex = explode('/',$text);
        if (strlen($text) < 10 && strpos($text,'/')===false &&  strpos($text,',')===false) {
            $query->filterByComplex($text,Criteria::LIKE);
            $query->orWhere(['like','street',$text]);
        } else if (strlen($text) < 10) {
            $query->filterByComplex($complex[0],Criteria::LIKE);
            if (isset($complex[1])) {
                $query->filterByComplexHouse($complex[1],Criteria::LIKE);
            }
            if (isset($complex[2])) {
                $query->filterByComplexStructure($complex[2],Criteria::LIKE);
            }
        } else {
            foreach ($parts as $part) {
                if ($index == 0) {
                    $query->filterByStreet($part,Criteria::LIKE);
                    $index++;
                } else if ($index == 1) {
                    $query->filterByStreetHouse($part,Criteria::LIKE);
                    $index++;
                } else if ($index == 2) {
                    $query->filterByStreetStructure($part,Criteria::LIKE);
                    $index++;
                }
            }
        }
        //print '<pre>';var_dump($query->where);die();
        return $query->limit(15)->all();
    }

}