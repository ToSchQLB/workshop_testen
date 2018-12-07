<?php

class LoginFormCest
{
    public function _before(\FunctionalTester $I)
    {
//        error_reporting(0);
//        ini_set('display_errors','Off');
        $I->amOnRoute('user/security/login');
    }

    public function openLoginPage(\FunctionalTester $I)
    {
        $I->see('Anmelden', 'h3');

    }

    // demonstrates `amLoggedInAs` method
    public function internalLoginById(\FunctionalTester $I)
    {
        $I->amLoggedInAs(2);
        $I->amOnPage('/');
        $I->see('Achim.Admin');
    }

//    // demonstrates `amLoggedInAs` method
//    public function internalLoginByInstance(\FunctionalTester $I)
//    {
//        $I->amLoggedInAs(\app\models\User::findOne(['username' => 'Tom.Tester']));
//        $I->amOnPage('/');
//        $I->see('Tom.Tester');
//    }

    public function loginWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#LoginForm', []);
        $I->expectTo('see validations errors');
        $I->see('Anmelden darf nicht leer sein.');
        $I->see('Passwort darf nicht leer sein.');
    }

    public function loginWithWrongCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#LoginForm', [
            'LoginForm[login]' => 'admin',
            'LoginForm[password]' => 'wrong',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Falscher Login oder falsches Passwort');
    }

    public function loginSuccessfully(\FunctionalTester $I)
    {
        $I->submitForm('#LoginForm', [
            'LoginForm[login]' => 'Bernd.Beispiel',
            'LoginForm[password]' => 'Bernd.Beispiel',
        ]);
        $I->see('Bernd.Beispiel');
        $I->dontSeeElement('form#login-form');              
    }
}