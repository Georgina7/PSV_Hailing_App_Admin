

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test</title>
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
	<p class="text-2xl">Hhbhhv</p>
	<button type="button" onclick="getData()">Read Data</button>
	<button type="button" onclick="logout()">Logout</button>
	<?php
		include('dbconn.php');
		$ref_table = 'Users';
		$fetchUserData = $database->getReference($ref_table)->getValue();
		if($fetchUserData > 0){
			print_r($fetchUserData);
		}else
		{
			echo "No data found";
		}
		$ref_table = 'Trips';
		$fetchTripData = $database->getReference($ref_table)->getValue();
		if($fetchTripData > 0){
			print_r($fetchTripData);
		}else
		{
			echo "No data found";
		}
	?>

	<script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-auth.js"></script>
	<script type="text/javascript" src="js/firebaseConfig.js"></script>

</body>
</html>


