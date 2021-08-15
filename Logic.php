<?php

include("dbconn.php");

if(isset($_POST['type'])){
	$type = $_POST['type'];
	switch($type){
		case 'getUserData':
			$ref_table = 'Users/'.$_POST['user_id'];
			$fetchUserData = $database->getReference($ref_table)->getValue();
			echo (json_encode($fetchUserData));
			break;
		case 'updateUser':
			$user_id = $_POST['user_id'];
			$ref_table = 'Users/'.$user_id;
			$database -> getReference($ref_table)->update([
				'email' => $_POST['email'],
				'fullName' => $_POST['name'],
				'number' => $_POST['phone_number'],
			]);
			break;
		default:
           echo "Not executed";
           break;
	}
}

//print_r($_POST);

?>