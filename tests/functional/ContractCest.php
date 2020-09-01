<?php

class ContractCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('contract/index');
    }

    public function openIndexPage(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnRoute('contract/index');
        $I->see('Contracts');
    }

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnRoute('contract/create');
        $I->submitForm('#create-contract', []);
        $I->expectTo('see validations errors');
        $I->see('Number cannot be blank.');
        $I->see('Date cannot be blank');
        $I->see('Description cannot be blank');
    }

    public function submitCorrectForm(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnRoute('contract/create');
        $I->submitForm('#create-contract', [
            'Contract[number]' => '111',
            'Contract[buyer_client]' => '1',
            'Contract[seller_client]' => '1',
            'Contract[date]' => '2020-01-01',
            'Contract[financial_amount]' => '10',
            'Contract[description]' => 'some description',
        ]);
        $I->expectTo('contract information');
        $I->see('update');
        $I->see('delete');

    }

}
