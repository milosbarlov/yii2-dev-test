<?php

use yii\helpers\Url;

class ClientCest
{
    public function ensureThatCreateClientWorks(AcceptanceTester $I)
    {
        $this->userLogin($I);
        $I->amGoingTo('create contract');
        $I->amOnPage('/contract/create');
        $I->see('Create Contract');
        $I->fillField('input["Contract[number]"]', '11111');
        $I->fillField('input["Contract[buyer_client]"]', '1');
        $I->fillField('input["Contract[date]"]', '2020-01-01');
        $I->fillField('input["Contract[financial_amount]]', '100');
        $I->fillField('input["Contract[description]]', '100');
        $I->click('.btn-success');
        $I->see('update');
        $I->see('delete');
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
