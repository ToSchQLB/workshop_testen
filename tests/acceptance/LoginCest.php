<?php

 use yii\helpers\Url;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function _fixtures()
    {
        return [
            'users' => [
                'class'    => \app\tests\fixtures\UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    public function ensureThatLoginWorks(AcceptanceTester $I)
    {
        $users = $this->getData();
        $user = $users['Tom.Test'];
        $I->maximizeWindow();

        $I->amOnPage(Url::toRoute('/user/security/login'));
        $I->see('Anmelden');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('#loginform-login', $user['login']);
        $I->fillField('#loginform-password', $user['password']);
        $I->click('form#LoginForm button.btn-primary');

        $I->wait(2);

//        $I->see('abmelden ('.$user['login'].')');
        $I->see($user['login']);
        $I->click($user['login']);
        $I->click('abmelden');

        $I->wait(2);


        $I->see('Login');
        $I->see('Gast');
    }

    private function getData()
    {
        return require codecept_data_dir() . 'login.php';
    }
}
