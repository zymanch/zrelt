<?php
namespace behaviours;

use models\Address;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class AddCoordinatesBehavior extends Behavior{


    public function events() {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate'
        ];
    }

    public function beforeValidate($e) {
        /** @var Address $address */
        $address = $this->owner;
        if (!$address->map_x || !$address->map_y) {
            $api = new \Yandex\Geo\Api();
            if (\Yii::$app->params['complex']) {
                $street = $address->getHumanComplex();
            } else {
                $street = $address->getHumanStreet();
            }
            $api->setQuery(\Yii::$app->params['city'].','.$street);
            $api
                ->setToken(\Yii::$app->params['yandex_map_key'])
                ->setLimit(1) // кол-во результатов
                ->setLang(\Yandex\Geo\Api::LANG_RU) // локаль ответа
                ->load();

            $response = $api->getResponse();
            $result = $response->getFirst();
            if ($result) {
                $address->map_x = $result->getLatitude(); // широта для исходного запроса
                $address->map_y = $result->getLongitude(); // долгота для исходного запроса
            }
        }
    }
}