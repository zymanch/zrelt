<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:27
 */
Yii::import('ext.EGMap.*');
class HouseAgeCommand extends CConsoleCommand {


    public function run($args) {
        $houses = $this->_getHouses();
        foreach ($houses as $index => $house) {
            $this->_saveHouse(
                $house['address'],
                $house['year'],
                $house['floors']
            );
            printf(
                "\rParsed %d of %d",
                $index+1,
                count($houses)
            );
        }
    }

    protected function _getHouses() {
        $url = 'http://dom.mingkh.ru/api/houses';
        $content = Yii::app()->curl->post($url,[
            'current'=>1,
            'rowCount'=>-1,
            'searchPhrase'=>'',
            'region_url'=>'tatarstan',
            'city_url'=>'naberezhnye-chelny'
        ]);
        $content = json_decode($content,1);
        return $content['rows'];
    }

    protected function _saveHouse($address, $year, $floors) {
        $gMap = new EGMap();
        $gMap->setAPIKey(null,'AIzaSyDF3O46ycecR2StiCQhUbhzItdOC7aSxZA');
        $geocodedAddress = new EGMapGeocodedAddress($address);
        $geocodedAddress->geocode($gMap->getGMapClient());
        $mainAttributes = [
            'map_x' => $geocodedAddress->getLat(),
            'map_y' => $geocodedAddress->getLng(),
        ];
        /** @var Address[] $foundAddreses */
        $foundAddreses = Address::model()->findAllByAttributes($mainAttributes);
        if (count($foundAddreses)>1) {
            printf("\nFound address with multy address:".$address.'['.json_encode($mainAttributes).']');
        } else if ($foundAddreses) {
            $model = reset($foundAddreses);
            $model->setAttributes($mainAttributes);
            $model->construction_year = $year;
            $model->save();
        } else {
            $accessor = new AddressFindOrCreateCommand();
            $model = $accessor->findOrCreate($address);
            if ($model) {
                $model->setAttributes($mainAttributes);
                $model->construction_year = $year;
                $model->save();
            }
        }
    }

}