<?php
/**
 * Created by PhpStorm.
 * User: Toni.Schreiber
 * Date: 10.07.2018
 * Time: 14:01
 */

namespace app\tests\fixtures;


use yii\test\ActiveFixture;

class AuthItemFixture extends ActiveFixture
{
    public $tableName = 'auth_item';
    public $dataFile ='auth_item';

}