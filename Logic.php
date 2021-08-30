<?php
session_start();
include("dbconn.php");

if(isset($_POST['type'])){
	$type = $_POST['type'];
	switch($type){
		case 'getUserData':
			$ref_table = 'Users/'.$_POST['user_id'];
			$fetchUserData = $database->getReference($ref_table)->getValue();
			echo (json_encode($fetchUserData));
			break;
		case 'getDriverData':
			// $ref_table = 'Users/'.$_POST['user_id'];
			// $fetchDriverData = $database->getReference($ref_table)->getValue();
			// echo (json_encode($fetchDriverData));
			$ref_table1 = 'Drivers/'.$_POST['user_id'];
			$fetchDriverData1 = $database->getReference($ref_table1)->getValue();
			echo (json_encode($fetchDriverData1));
			break;
		case 'getTripData':
			$ref_table = 'Trips/'.$_POST['trip_id'];
			$fetchTripData = $database->getReference($ref_table)->getValue();
			echo (json_encode($fetchTripData));
			break;
		case 'updateUser':
			$user_id = $_POST['user_id'];
			$ref_table = 'Users/'.$user_id;
			$nNo = $_POST['phone_number'];
			$nNumber = trim($nNo,"0,+254");
			$database -> getReference($ref_table)->update([
				'email' => $_POST['email'],
				'fullName' => $_POST['name'],
				'number' => '+254'.$nNumber,
			]);
			break;
		case 'getRouteStop':
			$route_id =$_POST['route_id'];
			$ref_table = 'Routes/'.$route_id;
			$fetchRouteData = $database->getReference($ref_table)->getValue();
			echo (json_encode($fetchRouteData));
			break;
		case 'updateDriver':
			$user_id = $_POST['user_id'];
			$ref_table = 'Drivers/'.$user_id;
			$database -> getReference($ref_table)->update([
				'licenceNo' => $_POST['driver_edit_licence'],
				'matatuPlate' => $_POST['driver_edit_plate'],
				'routes' => $_POST['driver_edit_routes'],
				'seats' => $_POST['driver_edit_seat'],
			]);
			break;
		case 'updateTrip':
			$trip_id = $_POST['trip_id'];
			$ref_table = 'Trips/'.$trip_id;
			$source = $_POST['trip_source'];
			$destination = $_POST['trip_destination'];
			$day = $_POST['trip_day'];
			$date = $_POST['trip_date'];
			$time = $_POST['trip_time'];
			$time1 = $_POST['trip_time_1'];
			$status = $_POST['trip_status'];
			$date_time = $day.', '.$date.' '.$time.' '.$time1;
			if($date != null && $time != null){
					$database -> getReference($ref_table)->update([
					'source' => $source,
					'destination' => $destination,
					'date_time' => $date_time,
					'status' => $status,
					]);
				}
				
			else {
				$database -> getReference($ref_table)->update([
				'source' => $source,
				'destination' => $destination,
				'status' => $status,
				]);
			}
			
			break;
			case 'addStop':
			$route_id = $_POST['route_id'];
			$ref_table = 'Routes/'.$route_id;
			$stop = $_POST['stop'];			
			$database -> getReference($ref_table)->update([
				$stop=> 'true']);
			
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
		case 'logoutAdmin':
			unset($_SESSION['verified_user_id']);
			unset($_SESSION['idTokenString']);
			$_SESSION['status'] = "Logged Out Succesfully!";
			exit();
			
			
			break;
		case 'resetAdmin':
			$aEmail = $_POST['email_reset'];
			$auth->sendPasswordResetLink($aEmail);
			break;
		
		case 'createUser':
			$nEmail = $_POST['email'];
			$nName = $_POST['name'];
			$nNo = $_POST['phone_number'];
			$nNumber = trim($nNo,"0,+254");
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
			$dNumber = trim($dNo,"0,+254");
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
		case 'addTrip':
			$ref ='Trips';
			$tDay = $_POST['add_trip_day'];
			$tDate = $_POST['add_trip_date'];
			$tTime = $_POST['add_trip_time'];
			$tTime1 = $_POST['add_trip_time_1'];
			$tSource =  $_POST['add_trip_source'];
			$tDest = $_POST['add_trip_dest'];
			$tDriver = $_POST['add_trip_driver'];
			$tRider =  $_POST['add_trip_rider'];
			$tMessage = $_POST['add_trip_msg'];
			$tSeats = $_POST['add_trip_seats'];
			$tStatus =  'pending';
			$Date_Time = $tDay.', '.$tDate.' '.$tTime.' '.$tTime1;

			// if(!empty($tDay) && !empty($tDate) && !empty($tTime) && !empty($tSource) && !empty($tDest) &&  !empty($tRider) && !empty($tMessage) && !empty($tSeats)){
		
		$tripRef ='Trips';
		$database->getReference($tripRef)
		->push(	
			$tripProperties=[
				'status' => $tStatus,
				'date_time' => $Date_Time,
				'source' => $tSource,
				'destination' => $tDest,
				'seat' => $tSeats,
				'shortMessage' => $tMessage,
				'driverID' => $tDriver,
				'pwdID' => $tRider,
			]);
		
		
			

		break;
		case 'changePassword':
			$n_password = $_POST['new_password'];
			$c_new_password = $_POST['confirm_new_password'];
			$uid = $_SESSION['verified_user_id'];

			if($n_password != $c_new_password){
				echo 'Passwords do not match!!';
			}
			else{
				$updatedUser = $auth->changeUserPassword($uid, $n_password);
			}
		break;
		case 'updateAdmin':
			$admin_id = $_SESSION['verified_user_id'];
			$ref_table = 'Admins/'.$admin_id;
			$filename = $_FILES["uploadImage"]["name"];
    		$tempname = $_FILES["uploadImage"]["tmp_name"];    
        	$folder = "Image/".$filename;

		// 	if (move_uploaded_file($tempname, $folder))  {
        //    echo '<script>alert("Image In")</script>';
        // 	}else{
        //    echo '<script>alert("Image not In")</script>';
      	// 	}
			
  			$imageFileType = strtolower(pathinfo($folder,PATHINFO_EXTENSION));

			$extensions_arr = array("jpg","jpeg","png","gif");

			// Check extension
			if( in_array($imageFileType,$extensions_arr) ){
				if (move_uploaded_file($tempname, $folder))  {
					echo '<script>alert("Image In")</script>';
				}else{
					echo '<script>alert("Image not In")</script>';
				}

			}

			if($filename != null){
				if($_POST['phone_number'] != null){
					$nNo = $_POST['phone_number'];
					$nNumber = trim($nNo,"0,+254");
					$database -> getReference($ref_table)->update([
					'fullName' => $_POST['name'],
					'number' => '+254'.$nNumber,
					'profileImagePath' => $folder,
					]);
				}
				else{
					$nNo = "";
					$nNumber = trim($nNo,"0,+254");
					$database -> getReference($ref_table)->update([
					'fullName' => $_POST['name'],
					'number' => $nNumber,
					'profileImagePath' => $folder,
					]);
				}

			}
			else{
				if($_POST['phone_number'] != null){
					$nNo = $_POST['phone_number'];
					$nNumber = trim($nNo,"0,+254");
					$database -> getReference($ref_table)->update([
					'fullName' => $_POST['name'],
					'number' => '+254'.$nNumber,
					]);
				}
				else{
					$nNo = "";
					$nNumber = trim($nNo,"0,+254");
					$database -> getReference($ref_table)->update([
					'fullName' => $_POST['name'],
					'number' => $nNumber,
					]);
				}
			}
			// if(!empty($_POST['phone_number'])){
			// 	$nNo = $_POST['phone_number'];
			// 	$nNumber = trim($nNo,"0");
			// 	$database -> getReference($ref_table)->update([
			// 	'fullName' => $_POST['name'],
			// 	'number' => '+254'.$nNumber,
			// 	'profileImagePath' => $folder,
			// 	]);
			// }
			// elseif (empty($_POST['phone_number'])) {
			// 	$nNo = "";
			// 	$nNumber = trim($nNo,"0");
			// 	$database -> getReference($ref_table)->update([
			// 	'fullName' => $_POST['name'],
			// 	'number' => '+254'.$nNumber,
		
			// 	]);
			// }
			// elseif ($_FILES["uploadImage"] == null) {
			// 	$nNo = $_POST['phone_number'];
			// 	$nNumber = trim($nNo,"0");
			// 	$database -> getReference($ref_table)->update([
			// 	'fullName' => $_POST['name'],
			// 	'number' => '+254'.$nNumber,
			// 	'profileImagePath' => "",
			// 	]);
			// }
			// else{
			// 	$nNumber = "";
			// 	$database -> getReference($ref_table)->update([
			// 	'fullName' => $_POST['name'],
			// 	'number' => $nNumber,
			// 	'profileImagePath' => "",
			// 	]);
			// }
			
			break;


	}
}
//create Admin
if(isset($_POST['admin_register_btn'])){
	$aEmail = $_POST['admin_email'];
	$aName = $_POST['admin_name'];
	$aPassword = $_POST['admin_password'];
	$aUid = md5($aEmail);

	$adminUserProperties = [
	'uid' => $aUid,
	'email' => $aEmail,
	'emailVerified' => false,
	'password' => $aPassword,
	'displayName' => $aName,
	'disabled' => false,
	];

	$createdAdmin = $auth->createUser($adminUserProperties);
	if($createdAdmin)
	{
		$adminUserRef ='Users/'.$aUid;
		$aProfilePhotoPath = "";
		$database->getReference($adminUserRef)
	->set(
			$adminUser_data=[
				'email' => $aEmail,
				'fullName' => $aName,
				'number' => '',
				'profileImagePath' => $aProfilePhotoPath,
				'status' => 'enabled'
		]);

		//Add Admin to Admin Child
		$adminRef ='Admins/'.$aUid;
		$database->getReference($adminRef)
	->set(
			$admin_data=[
				'email' => $aEmail,
				'fullName' => $aName,
				'profileImagePath' => $aProfilePhotoPath,
				'number' => "",
				'status' => 'enabled'
		]);
		$auth->sendEmailVerificationLink($aEmail);
		$_SESSION['status'] = "Admin Registered Successfully!";
		header('Location: Login.php');
		exit();
	}
	else{
		$_SESSION['status'] = "Admin Registration Failed!";
		header('Location: Login.php');
		exit();
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