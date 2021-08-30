<?php
include("dbconn.php");
include("authentication.php");
if(!isset($_SESSION['verified_user_id'])){
    $_SESSION['status'] = "Your Session Expired!";
    header("location: ./Login.php"); 
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Routes</title>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="build/styles.css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<section>
		<article>


<!-- {{-- START OF ADD MODAL --}} -->
    		<!-- <div id="add_modal" class="absolute inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 rounded-lg bg-gray-50">
					<div class="flex items-center justify-between">
						<h4 class="text-lg font-semibold">Add Stop</h4>
						<svg onclick="closeAddModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
			<form id="stopAdd">
			
				<div class="form-group">
					<div class="grid grid-cols-6 gap-6 p-4">
						<div class="col-span-6 sm:col-span-3">
			                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
			                <input type="text" name="name" placeholder="Barry " class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Numbera</label>
			                <input type="text" name="phone_number"  placeholder="0712345678" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="licence" class="block text-sm font-medium text-gray-700">Driver's Licence</label>
			                <input type="text" name="driver_licence"  placeholder="KE56F65" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>					
					</div>
					<div class="flex items-center justify-center">
						<button type="submit" class="px-3 py-1 bg-gray-800 rounded text-gray-50 hover:opacity-75">Add</button>
					</div>
				</div>  
			</div>
			</form>
		</div> -->
				
				<!-- {{-- END OF ADD MODAL --}} -->


			<div class="box-content p-2 m-1 bg-blue-600 rounded-lg ">
                <center class="text-lg cursor-default text-gray-50">Routes</center>
            </div>
			
			<div class="m-2">
				<table class="box-border min-w-full divide-y divide-gray-200">
			          <thead class="bg-gray-50">
			            <tr>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Number
			              </th>
			               <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Routes
			              </th>
						  <!--
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Phone Number
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Licence
			              </th> -->
			              <th scope="col" class="relative px-6 py-3">
			                <span class="sr-only">Edit</span>
			              </th>
			            </tr>
			          </thead>
			          <tbody class="bg-white divide-y divide-gray-200">
			        	<?php							
							$dest_ref_table = 'Routes';
							$fetchDestData = $database->getReference($dest_ref_table)->getValue();
							if($fetchDestData > 0){
								$count = 1;
									
								foreach($fetchDestData as $dest => $valueDest){	
						?>			  
						
							<tr>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="route_id hide_data">
									</div>
										<div class="flex items-center">
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900"><?php echo $count; ?></div>
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900 driver_name"><?php echo $dest;?></div>
								</td>
								<!-- <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number">+254 705 999 817</td>
								<td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap driver_licence">WL9899</td> -->
								<td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
									<button onclick="addStopModal('<?php echo $dest; ?>')" class="px-3 py-1 text-gray-800 bg-blue-100 rounded hover:underline">Add Stop</button>
									<!-- <button onClick="deleteDriver()" class="px-3 py-1 text-gray-800 bg-red-100 rounded hover:underline">Delete</button> -->
								</td>
							</tr>
<!-- {{-- EDIT Modal --}} -->
    		<div id="stop_edit_modal" class="fixed inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 rounded-lg bg-gray-50">
					<div class="flex items-center justify-between">
						<h4 class="text-lg font-semibold">Add Stops</h4>
						<svg onclick="closeStopModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
					<form id="stopAdd">
					<div class="grid grid-cols-6 gap-6 p-4">
						<div class="col-span-12 sm:col-span-6">
			               <div class="flex flex-row w-auto">
			                	<input type="text" name="stop" id="stop" class="block w-full p-2 mt-1 ml-20 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 sm:text-sm" required>
								<button class="px-3 py-1 bg-blue-600 rounded text-gray-50 hover:opacity-75">Add</button>
							</div>
			            </div>
						<p class="flex items-center justify-center text-green-500" id="stop_add_success"></p>	
					</form>
						<div class="col-span-auto sm:col-span-3">
						<label for="stops" class="block text-sm font-medium text-gray-700">Stops</label>
			             
						<div class="col-span-8 sm:col-span-3">		
							<!-- foreach($valueDest as $stop => $stopBool)
							{ -->
			                <input name="stops" id="stops" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 sm:text-sm"></input>
			            </div>
						       
			            </div>	
					</div>			
				</div>      
    		</div>
						<?php
						$count = $count + 1;
						}
							
						}
						else{
							echo "No data found";
						}		
						
							?>
			            <!-- More people... -->
			          </tbody>
			        </table>

			</div>
			<!-- <button onclick="addModal()" class="fixed bottom-0 right-0 p-2 px-4 m-3 bg-blue-600 rounded-lg text-gray-50 hover:opacity-75">Add</button> -->
			
		</article>
	</section>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/components.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
	<script type="text/javascript" src="js/firebaseConfig.js"></script>
</body>
</html>