<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see results');
$I->amOnPage('http://127.0.0.1:8000/index.html#create');
$I->submitForm('#create_form', array('createuser' => array(
     'user' => 'hollandk',
     'pass' => 'test',
     'fn' => 'Krissy',
     'ln' => 'Holland',
     'email' => 'krissy_tester@iowaair.com'
)), 'Submit');
$I->expect('the form is submitted');
?>