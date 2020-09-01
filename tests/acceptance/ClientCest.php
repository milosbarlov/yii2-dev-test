<?php

use yii\helpers\Url;

class ClientCest
{
    public function ensureThatCreateClientWorks(AcceptanceTester $I)
    {
        $this->userLogin($I);
        $I->amGoingTo('create client');
        $I->amOnPage('/client/create');
        $I->see('Create Client');
        $I->fillField('input[name="Client[name]"]', 'client name');
        $I->fillField('input[name="Client[surname]"]', 'client surname');
        $I->fillField('input[name="Client[email]"]', 'client email');
        $I->click('.btn-success');
        $I->see('update');
    }

    private function userLogin($I)
    {
        $I->amOnPage('/site/login');
        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', 'admin');
        $I->fillField('input[name="LoginForm[password]"]', 'admin');
        $I->click('login-button');
        $I->wait(2); // wait for button to be clicked

        $I->expectTo('see user info');
        $I->see('Logout');

    }
}
