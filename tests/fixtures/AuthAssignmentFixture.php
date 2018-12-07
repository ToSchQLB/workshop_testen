<?php
/**
 * Created by PhpStorm.
 * User: Toni.Schreiber
 * Date: 10.07.2018
 * Time: 14:07
 */

namespace app\tests\fixtures;


use yii\test\ActiveFixture;

class AuthAssignmentFixture extends ActiveFixture
{
    public $depends = [
        'app\\tests\\fixtures\\AuthItemChildFixture',
        'app\\tests\\fixtures\\AuthItemFixture',
        'app\\tests\\fixtures\\UserFixture'
    ];

    public $tableName = 'auth_assignment';

    public $dataFile = 'auth_assignment';

}