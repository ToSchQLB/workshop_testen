<?php

namespace app\models;

use yii\helpers\ArrayHelper;

class User extends \Da\User\Model\User
{
    public function getName()
    {
        return $this->username;
    }

    public static function allArray(){
        return ArrayHelper::map(
            User::find()->select(['id', 'username'])->asArray()->all(),
            'id',
            'username'
        );

    }
}
