<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    public $modelClass = 'Da\\User\\Model\\User';

    public function __construct(array $config = [])
    {
        $this->dataFile =  codecept_data_dir(). 'user.php';
        parent::__construct($config);
    }
}