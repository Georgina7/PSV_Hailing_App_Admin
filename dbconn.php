<?php

require __DIR__.'/php-firebase/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
			->withServiceAccount('psvhailingapp-firebase-adminsdk-aaj46-67d7f591ea.json')
			->withDatabaseUri('https://psvhailingapp-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>