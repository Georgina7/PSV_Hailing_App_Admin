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
			$nNo = $_POST['phone_number'];
			$nNumber = trim($nNo,"0");
			$database -> getReference($ref_table)->update([
				'email' => $_POST['email'],
				'fullName' => $_POST['name'],
				'number' => '+254'.$nNumber,
			]);
			break;
			//Disable User
		case 'disableUserData':
			$user_id = $_POST['user_id'];

			$updatedUser = $auth->disableUser($user_id);
			$user_ref ='Users/'.$user_id;
			$database->getReference($user_ref)
		->update(
				$user_data=[
					'status' => "disabled"
			]);
			break;

		// case 'disableUser':
		// 	$user_id = $_POST['user_id_disable'];

		// 	$updatedUser = $auth->disableUser($user_id);
		// 	header("location: ./Dashboard.php");
		// 	break;
		
		//enable user
		case 'enableUser':
			$user_id = $_POST['user_id'];

			$updatedUser = $auth->enableUser($user_id);
			$user_ref ='Users/'.$user_id;
			$database->getReference($user_ref)
		->update(
				$user_data=[
					'status' => "enabled"
			]);
			break;

		case 'disableDriver':
		$user_id = $_POST['user_id'];
		$driver_ref ='Drivers/'.$user_id;
		$database->getReference($driver_ref)
	->update(
			$driver_data=[
				'status' => "disabled"
		]);
		break;

		case 'enableDriver':
			$user_id = $_POST['user_id'];
			$driver_ref ='Drivers/'.$user_id;
			$database->getReference($driver_ref)
		->update(
				$driver_data=[
					'status' => "enabled"
			]);
			break;
		
		case 'createUser':
			$nEmail = $_POST['email'];
			$nName = $_POST['name'];
			$nNo = $_POST['phone_number'];
			$nNumber = trim($nNo,"0");
			$uid = md5($nNumber);

			$userProperties = [
			'uid' => $uid,
			'phoneNumber' => '+254'.$nNumber,
			'displayName' => $nName,
			'disabled' => false,
		];

		$createdUser = $auth->createUser($userProperties);
		if($createdUser)
		{
			$ref ='Users/'.$uid;
			$nProfilePhotoPath = "";
			$database->getReference($ref)
		->set(
				$user_data=[
					'email' => $nEmail,
					'fullName' => $nName,
					'number' => '+254'.$nNumber,
					'profileImagePath' => $nProfilePhotoPath,
					'status' => 'enabled'
			]);

			$database->getReference($uid)->set();
			header("location: ./Dashboard.php");
		}
		break;

		//create Driver
		case 'createDriver':
			$dEmail = $_POST['driver_email'];
			$dName = $_POST['driver_name'];
			$dNo = $_POST['driver_phone_number'];
			$dLicense = $_POST['driver_licence'];
			$dSeat = $_POST['driver_seat'];
			$dRoutes = $_POST['driver_routes'];
			$dPlate = $_POST['driver_plate'];
			$dAvailabilty = 'active';
			$dNumber = trim($dNo,"0");
			$dUid = md5($dNumber);

			$driverUserProperties = [
			'uid' => $dUid,
			'phoneNumber' => '+254'.$dNumber,
			'displayName' => $dName,
			'disabled' => false,
		];

		$createdDriver = $auth->createUser($driverUserProperties);
		if($createdDriver)
		{
			$driverUserRef ='Users/'.$dUid;
			$dProfilePhotoPath = "";
			$database->getReference($driverUserRef)
		->set(
				$driverUser_data=[
					'email' => $dEmail,
					'fullName' => $dName,
					'number' => '+254'.$dNumber,
					'profileImagePath' => $dProfilePhotoPath,
					'status' => 'enabled'
			]);

			//Add Driver to Driver Child
			$driverRef ='Drivers/'.$dUid;
			$database->getReference($driverRef)
		->set(
				$driver_data=[
					'availability' => $dAvailabilty,
					'licenceNo' => $dLicense,
					'matatuPlate' => $dPlate,
					'routes' => $dRoutes,
					'seats' => $dSeat,
					'status' => 'enabled'
			]);

			// $database->getReference($dUid)->set();
		}
		break;
		default:
		echo "Not executed";
		break; 
	}
}

// if(isset($_POST['add_user_btn']))
// {
// 	$nEmail = $_POST['email'];
// 	$nName = $_POST['name'];
// 	$nNumber = $_POST['phone_number'];
// 	$uid = md5($nNumber);

// 	$userProperties = [
// 	'uid' => $uid,
//     'phoneNumber' => '+254'.$nNumber,
//     'displayName' => $nName,
//     'disabled' => false,
// ];

// $createdUser = $auth->createUser($userProperties);
// if($createdUser)
// {
// 	$ref ='Users/'.$uid;
// 	$nProfilePhotoPath = "";
// 	$database->getReference($ref)
//    ->set(
// 		$user_data=[
// 			'email' => $nEmail,
// 			'fullName' => $nName,
// 			'number' => '+254'.$nNumber,
// 			'profileImagePath' => $nProfilePhotoPath
// 	]);

// 	$database->getReference($uid)->set('New name');

// 		echo '<script>alert("Account Created")</script>';
// }
// // else{
// // 		echo '<script>alert("Account Failed to Create!")</script>';
// // }

// }

//print_r($_POST);

?>