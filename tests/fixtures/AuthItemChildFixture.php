<?php
/**
 * Created by PhpStorm.
 * User: Toni.Schreiber
 * Date: 10.07.2018
 * Time: 14:05
 */

namespace app\tests\fixtures;


use yii\test\ActiveFixture;

class AuthItemChildFixture extends ActiveFixture
{
    public $depends = [
        'app\\tests\\fixtures\\AuthItemFixture'
    ];

    public $tableName = 'auth_item_child';

    public $dataFile = 'auth_item_child';
}