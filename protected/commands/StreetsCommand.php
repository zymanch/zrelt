<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:27
 */
class StreetsCommand extends CConsoleCommand {


    public function run($args) {
        Yii::import('ext.phpQuery.phpQuery.phpQuery',true);
        $url = 'http://www.most-e.ru/spravka-RT/Chelny-street-All/';
        $content = Yii::app()->curl->get($url);
        $document = phpQuery::newDocumentHTML($content,'windows-1252');
        $rows = $document->find('a');
        foreach ($rows as $link) {
            $link = pq($link)->attr('href');
            if (strpos($link,'/spravka-RT/Chelny-street-')===0) {
                $this->_downloadPage('http://www.most-e.ru'.$link);
            }
        }
    }

    protected function _downloadPage($url) {
        $content = Yii::app()->curl->get($url);
        //$document = phpQuery::newDocumentHTML($content,'utf-8');
        $document = phpQuery::newDocumentHTML($content,'windows-1252');
        $table = $document->find('table:eq(11)');
        $rows = $table->find('tr');
        $firstRow = true;
        foreach ($rows as $row) {
            if ($firstRow) {
                $firstRow = false;
            } else {
                $street = pq($row)->find('td:eq(0)')->html();
                $complex = pq($row)->find('td:eq(1)')->html();
                $this->_updateStreet($street, $complex);
            }
        }
    }

    protected function _updateStreet($street, $complex) {
        $street = iconv('cp1251','utf-8',$street);
        $complex = iconv('cp1251','utf-8',$complex);
        $street = explode(',',$street);
        $complex = explode(',',$complex);
        $complex = explode('/',$complex[2], 3);
        $streetName = $street[1];
        $street = explode('/',$street[2]);
        $streetNumber = strtolower(trim($street[0]));
        $streetStructure = isset($street[1]) ? strtolower(trim($street[1])) : null;
        $complexNumber = strtolower(trim($complex[0]));
        $complexHouse = strtolower(trim($complex[1]));
        $complexStructure = isset($complex[2]) ? strtolower(trim($complex[2])) : null;
        $streetName = trim(str_replace(
            array('б-р','ул.','пр.','пер.'),
            array('бульвар','улица','проспект','переулок'),
            $streetName
        ));
        $address = Address::model()->findByAttributes(array(
            'complex' => $complexNumber,
            'complex_house' => $complexHouse,
            'complex_structure' => $complexStructure
        ));
        if (!$address) {
            $address = Address::model()->findByAttributes(array(
                'street' => $streetName,
                'street_house' => $streetNumber,
                'street_structure' => $streetStructure
            ));
        }
        if (!$address) {
            $address = new Address();
        }
        $address->attributes = array(
            'complex' => $complexNumber,
            'complex_house' => $complexHouse,
            'complex_structure' => $complexStructure,
            'street' => $streetName,
            'street_house' => $streetNumber,
            'street_structure' => $streetStructure
        );
        if (!$address->save()) {
            print iconv('utf-8','cp866',implode(',',$address->getErrors('complex')))."\n";
            var_dump($streetNumber, $streetName, $complexNumber, $complexHouse, $complexStructure);
        }
    }



}