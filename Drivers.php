<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Drivers</title>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="build/styles.css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<section>
		<article>

<!-- {{-- EDIT Modal --}} -->
    		<div id="edit_modal" class="fixed inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 rounded-lg bg-gray-50">
					<div class="flex items-center justify-between">
						<h4 class="text-lg font-semibold">Edit Driver</h4>
						<svg onclick="closeEditModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
					<form action="/edit_drivers" method="POST">
					<div class="grid grid-cols-2 gap-6 p-4">
						<div class="col-span-6 sm:col-span-3">
			                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
			                <input type="text" name="name" id="edit_name" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
			                <input type="text" name="phone_number" id="edit_phone_number" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="licence" class="block text-sm font-medium text-gray-700">Driver's Licence</label>
			                <input type="text" name="licence" id="edit_licence" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>	
						<input type="text" hidden name="user_id" id="user_id">	
					</div>
					<div class="flex items-center justify-center mb-3">
						<button class="px-3 py-1 bg-gray-800 rounded text-gray-50 hover:opacity-75">Edit</button>
					</div>					
				</div>
				</form>        
    		</div>

<!-- {{-- START OF ADD MODAL --}} -->
    		<div id="add_modal" class="absolute inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 rounded-lg bg-gray-50">
					<div class="flex items-center justify-between text-center">
						<h4 class="text-lg font-semibold text-center">Add Driver</h4>
						<svg onclick="closeAddModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
			<form id="driverAdd">
			
				<div class="form-group">
					<div class="grid grid-cols-6 gap-6 p-4">
						<div class="col-span-6 sm:col-span-3">
			                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
			                <input type="text" name="driver_name" placeholder="John Doe " class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
			                <input type="text" name="driver_phone_number"  placeholder="0712345678" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
			                <input type="email" name="driver_email"  placeholder="johndoe@example.com" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>	
						<div class="col-span-6 sm:col-span-3">
			                <label for="driver_licence" class="block text-sm font-medium text-gray-700">Driver's Licence</label>
			                <input type="text" name="driver_licence"  placeholder="DL-1234567" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="driver_seat" class="block text-sm font-medium text-gray-700">Seats</label>
			                <input type="number" name="driver_seat" placeholder="3" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="driver_plate" class="block text-sm font-medium text-gray-700">Matatu No. Plate</label>
			                <input type="text" name="driver_plate"  placeholder="KBC 778C" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>	
						<div class="col-span-6 sm:col-span-3">
			                <label for="driver_routes" class="block text-sm font-medium text-gray-700">Routes</label>
			                <input type="text" name="driver_routes"  placeholder="Madaraka - CBD" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			            </div>				
					</div>
					<div class="flex items-center justify-center">
						<button class="px-3 py-1 bg-gray-800 rounded text-gray-50 hover:opacity-75">Add</button>
					</div>
						<p class="flex items-center justify-center text-green-500" id="driver_add_success"></p>	
				</div>  
			</div>
			</form>
		</div>
				
				<!-- {{-- END OF ADD MODAL --}} -->
				<!-- {{-- Disable Driver Modal --}} -->
			<div id="driver_disable_user_modal" class="fixed inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 rounded-lg bg-gray-50">
					<div class="flex items-center justify-between p-4 text-center">
						<h4 class="justify-start text-lg font-semibold">Disable User</h4>
						<svg onclick="closeDriverDisableModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
					<div class="hidden w-auto p-3 mb-4 font-medium bg-green-300 rounded-sm justify-items-start" id="driver_disable_success_message">
						<p class="h-auto text-green-800 text-md">Driver Disabled Successfully!</p>
					</div>
					<div class="flex flex-row w-auto h-auto p-6 bg-red-300 rounded-md justify-items-start">
						<i class="mt-1 mr-6 text-red-700 fas fa-exclamation-triangle"></i>
						<p class="h-auto text-center text-white text-md">Drivers with disabled accounts won't be able to access their accounts as drivers</p>
					</div>
					<div class="grid grid-cols-6 gap-6 p-4">
						
						<input type="text" class="hide_data" name="user_id_disable" id="user_id" hidden>	
					</div>
					<div class="flex items-center justify-center mb-3">
						<button onclick="closeDriverDisableModal()" class="px-3 py-1 mr-4 text-gray-800 border-2 border-gray-800 rounded bg-gray-50 hover:opacity-75">Okay</button>
						<button onclick="disableDriverConfirm('<?php echo $user; ?>')" class="hidden px-3 py-1 bg-gray-800 rounded text-gray-50 hover:opacity-75">Disable</button>						
					</div>
					<p class="flex items-center justify-center text-green-500" id="userEdit_success"></p>				
				</div>       
			</div>
			<!-- {{-- End of Disable Driver Modal --}} -->
						<!-- {{-- Enable Driver Modal --}} -->
			<div id="driver_enable_user_modal" class="fixed inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 rounded-lg bg-gray-50">
					<div class="flex items-center justify-between p-4 text-center">
						<h4 class="justify-start text-lg font-semibold">Enable User</h4>
						<svg onclick="closeDriverEnableModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
					<div class="hidden w-auto p-3 mb-4 font-medium bg-green-300 rounded-sm justify-items-start" id="driver_enable_success_message">
						<p class="h-auto text-green-800 text-md">Driver Enabled Successfully!</p>
					</div>
					<div class="flex flex-row w-auto p-6 bg-gray-700 rounded-md justify-items-start">
						<i class="mt-1 mr-6 text-white fas fa-info-circle"></i>
						<p class="h-auto text-center text-white text-md">Drivers with enabled accounts have driver capabilities</p>
					</div>
					<div class="grid grid-cols-6 gap-6 p-4">
						
						<input type="text" class="hide_data" name="user_id" id="user_id" hidden>	
					</div>
					<div class="flex items-center justify-center mb-3">
						<button onclick="closeDriverEnableModal()" class="px-3 py-1 mr-4 text-gray-800 border-2 border-gray-800 rounded bg-gray-50 hover:opacity-75">Okay</button>
						<button onclick="enableDriverConfirm('<?php echo $user; ?>')" class="hidden px-3 py-1 bg-gray-800 rounded text-gray-50 hover:opacity-75">Enable</button>						
					</div>
					<p class="flex items-center justify-center text-green-500" id="userEdit_success"></p>				
				</div>       
			</div>
			<!-- {{-- End of Enable Driver Modal --}} -->


			<div class="box-content p-2 m-1 bg-red-600 rounded-lg ">
                <center class="text-lg cursor-default text-gray-50">Drivers</center>
            </div>
			
			<div class="m-2">
				<input id="search_drivers" onkeyup="filterDrivers()" class="w-full h-12 px-8 mb-4 text-lg rounded shadow-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none focus:shadow-outline" type="search" placeholder="Search by name">
				<table class="box-border min-w-full divide-y divide-gray-200" id="drivers_table">
			          <thead class="bg-gray-50">
			            <tr>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Number
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Driver
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                License
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Matatu No. Plate
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Seats
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Route
			              </th>			              
			              <th scope="col" class="relative px-6 py-3">
			                <span class="sr-only">Edit</span>
			              </th>
			            </tr>
			          </thead>
			          <tbody class="bg-white divide-y divide-gray-200">
			          <?php
			          	include('dbconn.php');
						$ref_table = 'Drivers';
						$fetchDriverData = $database->getReference($ref_table)->getValue();
						$count = 1;
						if($fetchDriverData > 0){
							//print_r($fetchDriverData);
							foreach($fetchDriverData as $key => $value)
							{
								$ref_table = 'Users/'.$key;
								$fetchDriverDetails = $database->getReference($ref_table)->getValue();
								if($value['status']== "enabled"){
									?><tr>
					              <td class="px-6 py-4 whitespace-nowrap">
								  <div class="user_id hide_data">
								  </div>
					                <div class="flex items-center">
					                  <div class="ml-4">
					                    <div class="text-sm font-medium text-gray-900"><?php echo $count; ?></div>
					                  </div>
					                </div>
					              </td>
					              <td class="px-6 py-4 text-center whitespace-nowrap">
					                <div class="text-sm text-gray-900 driver_name"><?php echo $fetchDriverDetails['fullName']; ?></div>
					                <div class="mt-2 text-sm text-gray-900 driver_name"><?php echo $fetchDriverDetails['number']; ?></div>
					              </td>
					              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number"><?php echo $value['licenceNo']; ?></td>
					              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap driver_licence"><?php echo $value['matatuPlate']; ?></td>
					              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap driver_licence"><?php echo $value['seats']; ?></td>
					              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap driver_licence"><?php echo $value['routes']; ?></td>
					              <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
					                <button onclick="editModal()" class="px-3 py-1 text-gray-800 bg-blue-100 rounded hover:underline">Edit</button>
									<button onclick="disableDriver('<?php echo $key; ?>')" class="px-3 py-1 text-gray-800 bg-red-100 rounded hover:underline" id="disable_btn">Disable</button>
									<button onclick="enableDriver('<?php echo $key; ?>')" class="hidden px-3 py-1 text-gray-800 bg-green-400 rounded hover:underline"  id="enable_btn">Enable</button>
					              </td>
					            </tr><?php
								}
								else{
									?>
									<tr class="bg-gray-50">
					              <td class="px-6 py-4 whitespace-nowrap">
								  <div class="user_id hide_data">
								  </div>
					                <div class="flex items-center">
					                  <div class="ml-4">
					                    <div class="text-sm font-medium text-gray-900 opacity-25"><?php echo $count; ?></div>
					                  </div>
					                </div>
					              </td>
					              <td class="px-6 py-4 text-center opacity-25 whitespace-nowrap">
					                <div class="text-sm text-gray-900 driver_name"><?php echo $fetchDriverDetails['fullName']; ?></div>
					                <div class="mt-2 text-sm text-gray-900 driver_name"><?php echo $fetchDriverDetails['number']; ?></div>
					              </td>
					              <td class="px-6 py-4 text-sm text-gray-500 opacity-25 whitespace-nowrap driver_phone_number"><?php echo $value['licenceNo']; ?></td>
					              <td class="px-6 py-4 text-sm text-gray-500 opacity-25 whitespace-nowrap driver_licence"><?php echo $value['matatuPlate']; ?></td>
					              <td class="px-6 py-4 text-sm text-gray-500 opacity-25 whitespace-nowrap driver_licence"><?php echo $value['seats']; ?></td>
					              <td class="px-6 py-4 text-sm text-gray-500 opacity-25 whitespace-nowrap driver_licence"><?php echo $value['routes']; ?></td>
					              <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
					                <button onclick="editModal()" class="px-3 py-1 text-gray-800 bg-blue-100 rounded hover:underline">Edit</button>
									<button onclick="disableDriver('<?php echo $key; ?>')" class="hidden px-3 py-1 text-gray-800 bg-red-100 rounded hover:underline" id="disable_btn">Disable</button>
									<button onclick="enableDriver('<?php echo $key; ?>')" class="px-3 py-1 text-gray-800 bg-green-400 rounded hover:underline"  id="enable_btn">Enable</button>
					              </td>
					            </tr>
								<?php
								}
								$count =$count+1;
							}
						}else
						{
							echo "No data found";
						}
			          ?>				  
						
			            
			            <!-- More people... -->
			          </tbody>
			        </table>

			</div>
			<button onclick="addModal()" class="fixed bottom-0 right-0 p-2 px-4 m-3 bg-red-600 rounded-lg text-gray-50 hover:opacity-75">Add</button>
			
		</article>
	</section>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/components.js"></script>
</body>
</html>
