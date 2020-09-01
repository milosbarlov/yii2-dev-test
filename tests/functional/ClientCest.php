<?php

class ClientCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('client/index');
    }

    public function openIndexPage(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnRoute('client/index');
        $I->see('Clients', 'h1');

    }

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnRoute('client/create');
        $I->submitForm('#create-client', []);
        $I->expectTo('see validations errors');
        $I->see('Name cannot be blank');
        $I->see('Surname cannot be blank');
        $I->see('Email cannot be blank');
    }

    public function submitFormWithWrongEmail(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnRoute('client/create');
        $I->submitForm('#create-client', [
            'Client[name]' => 'test',
            'Client[surname]' => 'test surname',
            'Client[email]' => 'email'
        ]);
        $I->expectTo('see validations errors');
        $I->see('Email is not a valid email address.');

    }

    public function submitCorrectForm(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnRoute('client/create');
        $I->submitForm('#create-client', [
            'Client[name]' => 'test',
            'Client[surname]' => 'test surname',
            'Client[email]' => 'email2ds@gmail.com'
        ]);
        $I->expectTo('client information');
        $I->see('update');
        $I->see('delete');

    }

}
