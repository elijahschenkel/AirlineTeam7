<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('index.html#');
$I->see('Iowa Airline');
?>	
