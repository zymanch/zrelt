<?php
namespace models\search;
use models\base\BaseUserPeer;
use models\User;
use models\UserQuery;
use yii\data\ActiveDataProvider;

/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:50
 */
class SearchUser extends \models\base\BaseUser {

    public $id;
    public $email;

    public function rules() {
        return [
            [[BaseUserPeer::ID], 'integer'],
            [[BaseUserPeer::EMAIL], 'string','max'=>36],
        ];
    }

    public function search($count = 60) {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $count,
            ],
        ]);
        $query
            ->andFilterWhere([BaseUserPeer::ID => $this->id])
            ->andFilterWhere([BaseUserPeer::EMAIL => $this->email]);
        return $dataProvider;
    }

}