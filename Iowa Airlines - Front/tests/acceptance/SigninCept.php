<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see results');
$I->amOnPage('http://127.0.0.1:8000/index.html#login');
$I->fillField('user','test');
$I->fillField('pass','test');
$I->click('Login');
$I->see('Welcome Traveller!');
?>