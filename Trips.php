<?php
include('dbconn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trip</title>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="build/styles.css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
	<section>
		<article>

<!-- {{-- EDIT Modal --}} -->
    		<div id="trip_edit_modal" class="fixed inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 bg-white rounded-lg">
					<div class="flex items-center justify-between">
						<h4 class="text-lg font-semibold">Edit Trip</h4>
						<svg onclick="closeTripEditModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
					<form id="tripEdit">
					
					<div class="grid grid-cols-6 gap-6 p-4">
						<div class="col-span-6 sm:col-span-3">
							<label for="trip_date" class="block text-sm font-medium text-gray-700">Date</label>
			                <input id="trip_date" name="trip_date" placeholder="17 August 2021 " class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-600 focus:border-blue-600 focus:outline-none focus:shadow-outline sm:text-sm">
							<input id="trip_day" name="trip_day" placeholder="17 August 2021 " class="hidden w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-600 focus:border-blue-600 focus:outline-none focus:shadow-outline sm:text-sm">
						</div>
						<div class="col-span-6 sm:col-span-3">
							<label for="trip_time" class="block text-sm font-medium text-gray-700">Time</label>
							<div class="flex flex-row ">
								<input id="trip_time" type="time" name="trip_time" class="block w-auto p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
								<select id="trip_time_1" name="trip_time_1" class="block w-auto p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm" required>
									<option value="PM">PM</option>
									<option value="AM">AM</option>
								</select>
							</div>
						</div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="trip_source" class="block text-sm font-medium text-gray-700"> Source</label>
			                <input type="text" name="trip_source" id="trip_source" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="trip_destination" class="block text-sm font-medium text-gray-700">Destination</label>
			                <input type="text" name="trip_destination" id="trip_destination" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <!-- <label for="licence" class="block text-sm font-medium text-gray-700">Driver's Licence</label> -->
			                <!-- <input type="text" name="licence" id="edit_licence" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> -->
							<label for="trip_status" class="block text-sm font-medium text-gray-700">Status</label>
			                <!-- <input type="text" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> -->
							<select id="trip_status" name="trip_status" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
								<option value="pending">pending</option>
								<option value="canceled">canceled</option>
							</select>
			            </div>	
					</div>
					<input type="text" class="hidden hide_data" name="trip_id" id="trip_id">	
					<div class="flex items-center justify-center mb-3">
						<button class="px-3 py-1 bg-blue-600 rounded text-gray-50 hover:opacity-75">Edit</button>
					</div>
					<p class="flex items-center justify-center text-green-500" id="trip_edit_success"></p>									
				</div>
				</form>        
    		</div>

<!-- {{-- START OF ADD MODAL --}} -->
    		<div id="trip_add_modal" class="absolute inset-0 items-center justify-center hidden bg-black bg-opacity-50 ">
				<div class="p-3 bg-white rounded-lg">
					<div class="flex items-center justify-between">
						<h4 class="text-lg font-semibold">Add Trip</h4>
						<svg onclick="closeTripAddModal()" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</div>
				<form id="tripAdd">
			
				<div class="form-group">
					<div class="grid grid-cols-6 gap-6 p-4">
						<div class="col-span-6 sm:col-span-3">
							<label for="add_trip_date" class="block text-sm font-medium text-gray-700">Date</label>
			                <input id="add_trip_date" name="add_trip_date" placeholder="17 August 2021 " class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
							<input id="add_trip_day" name="add_trip_day" placeholder="17 August 2021 " class="hidden w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm" required>
						</div>
						<div class="col-span-6 sm:col-span-3">
							<label for="add_trip_time" class="block text-sm font-medium text-gray-700">Time</label>
							<div class="flex flex-row ">
								<input id="add_trip_time" type="time" name="add_trip_time" class="block w-auto p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 sm:text-sm">
								<select id="add_trip_time_1" name="add_trip_time_1" class="block w-auto p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 sm:text-sm" required>
									<option value="PM">PM</option>
									<option value="AM">AM</option>
								</select>
							</div>
						</div>
						<div class="col-span-6 sm:col-span-3">
							<label for="add_trip_source" class="block text-sm font-medium text-gray-700">Source</label>
							<select id="add_trip_source" name="add_trip_source" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
							<?php
								$source_ref_table = 'Routes';
								$fetchSourceData = $database->getReference($source_ref_table)->getValue();
								if($fetchSourceData > 0){
									foreach($fetchSourceData as $source => $valueSource){
										foreach ($valueSource as $valueS => $bool) {		
							?>
							<div class="value_id hide_data">
									</div>
								<option value="<?php echo $valueS;?>"><?php echo $valueS;?></option>
							<?php		
										}	
									}
								}
							?>	
							</select>	            
						</div>
						<div class="col-span-6 sm:col-span-3">
							<label for="add_trip_dest" class="block text-sm font-medium text-gray-700">Destination</label>
							<select id="add_trip_dest" name="add_trip_dest" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
							<?php							
								$dest_ref_table = 'Routes';
								$fetchDestData = $database->getReference($dest_ref_table)->getValue();
								if($fetchDestData > 0){
									foreach($fetchDestData as $dest => $valueDest){
										foreach ($valueDest as $valueD => $bool) {		
							?>
							<div class="value_id hide_data">
									</div>
								<option value="<?php echo $valueD;?>"><?php echo $valueD;?></option>
							<?php		
										}	
									}
								}
							?>	
							</select>	            
						</div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="add_trip_rider" class="block text-sm font-medium text-gray-700">Riders Name</label>
							<select id="add_trip_rider" name="add_trip_rider" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
							<?php
								$rider_ref_table = 'Users';
								$fetchRiderData = $database->getReference($rider_ref_table)->getValue();
								if($fetchRiderData>0){
									foreach($fetchRiderData as $rider => $val){
							?>
								<option value="<?php echo $rider;?>"><?php echo $val['fullName'];?></option>
							<?php	
								}
								}
							?>	
							</select>
						</div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="add_trip_driver" class="block text-sm font-medium text-gray-700">Driver's Name</label>
							<select id="add_trip_driver" name="add_trip_driver" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm">
							<?php
								$driver_ref_table = 'Drivers';
								$fetchDriverData = $database->getReference($driver_ref_table)->getValue();
								if($fetchDriverData > 0){
									foreach($fetchDriverData as $driver => $driver_name)
									{
										$details_ref_table = 'Users/'.$driver;
										$fetchDriverName = $database->getReference($details_ref_table)->getValue();								
							?>
								<option value="<?php echo $driver;?>"><?php echo $fetchDriverName['fullName'];?></option>	
							<?php	
									}
								}
							?>
							</select>			            
						</div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="add_trip_msg" class="block text-sm font-medium text-gray-700">Short Message</label>
			                <input type="text" name="add_trip_msg" id="add_trip_msg" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm" required>
			            </div>
						<div class="col-span-6 sm:col-span-3">
			                <label for="add_trip_seats" class="block text-sm font-medium text-gray-700">Select Seats</label>
			                <input type="number" name="add_trip_seats" id="add_trip_seats" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline sm:text-sm" required>
			            </div>					
					</div>
					<div class="flex items-center justify-center">
						<button type="submit" class="px-3 py-1 bg-blue-600 rounded text-gray-50 hover:opacity-75">Add</button>
					</div>
					<p class="flex items-center justify-center text-green-500" id="trip_add_success"></p>	
				</div>  
			</div>
			</form>
		</div>
				
				<!-- {{-- END OF ADD MODAL --}} -->


			<div class="box-content p-2 m-1 bg-blue-600 rounded-lg ">
                <center class="text-lg cursor-default text-gray-50">Trips</center>
            </div>
			
			<div class="m-2">
				<input id="search_trips" onkeyup="filterTrips()" class="w-full h-12 px-8 mb-4 text-lg rounded shadow-lg focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline" type="search" placeholder="Search by Date">
				<table class="box-border min-w-full divide-y divide-gray-200" id="trips_table">
			          <thead class="bg-gray-50">
			            <tr>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Number
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Date and Time
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			               	Route
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Rider Name
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Driver Name
			              </th>
			              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
			                Status
			              </th>
			              <th scope="col" class="relative px-6 py-3">
			                <span class="sr-only">Edit</span>
			              </th>
			            </tr>
			          </thead>
			          <tbody class="bg-white divide-y divide-gray-200">
			          <?php
			          	// include('dbconn.php');
						$ref_table = 'Trips';
						$fetchTripData = $database->getReference($ref_table)->getValue();
						if($fetchTripData > 0){
							$count = 1;
							foreach($fetchTripData as $trip => $value){
								$ref_table1 = 'Users/'.$value['pwdID'];
								$fetchPWDDetails = $database->getReference($ref_table1)->getValue();
								$fetchDriverDetails = $database->getReference($ref_table1)->getValue();

								if($value['status'] == "pending"){
								?>
								<tr>
								<td class="px-4 py-4 whitespace-nowrap">
								<div class="trip_id hide_data">
								</div>
									<div class="flex items-center">
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900"><?php echo $count; ?></div>
										</div>
									</div>
								</td>
								<td class="px-4 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900 trip_date"><?php echo $value['date_time'];?></div>
								</td>
								<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap trip_source_destination"><?php echo $value['source']." - ".$value['destination']; ?></td>
								<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap trip_rider_name"><?php echo $fetchPWDDetails['fullName']; ?></td>
								<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap trip_driver_name"><?php $fetchDriverDetails['fullName']; ?></td>
								<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap trip_status"><?php echo $value['status']; ?></td>				              
								<td class="px-4 py-4 text-sm font-medium text-right whitespace-nowrap">
					                <button onclick="tripEditModal('<?php echo $trip; ?>')" class="px-3 py-1 text-gray-800 bg-blue-100 rounded hover:underline">Edit</button>
								</td>
								</tr>
							<?php
								}
								else
								{ if($value['status'] == "completed"){ ?>
									<tr class="bg-blue-200">
									<td class="px-4 py-4 whitespace-nowrap">
									<div class="trip_id hide_data">
									</div>
										<div class="flex items-center">
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900"><?php echo $count; ?></div>
										</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="text-sm text-gray-900 driver_name"><?php echo $value['date_time'];; ?></div>
									</td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_licence"><?php echo $value['source']." - ".$value['destination']; ?></td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number"><?php echo $fetchPWDDetails['fullName']; ?></td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number">Shem Nzamba</td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number"><?php echo $value['status']; ?></td>				              
									<td class="px-4 py-4 text-sm font-medium text-right whitespace-nowrap">
									</td>
									</tr>

								
									<?php 
									} else{?>
									<tr class="w-auto bg-gray-100">
									<td class="px-4 py-4 whitespace-nowrap">
									<div class="trip_id hide_data">
									</div>
										<div class="flex items-center">
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900"><?php echo $count; ?></div>
										</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="text-sm text-gray-900 driver_name"><?php echo $value['date_time']; ?></div>
									</td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_licence"><?php echo $value['source']." - ".$value['destination']; ?></td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number"><?php echo $fetchPWDDetails['fullName']; ?></td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number">Shem Nzamba</td>
									<td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap driver_phone_number"><?php echo $value['status']; ?></td>				              
									<td class="px-4 py-4 text-sm font-medium text-right whitespace-nowrap">
									</td>
									</tr>

									<?php }
								}
							$count =$count+1;
							}
							
							//print_r($fetchUserData);
						}else
						{
							echo "No data found";
						}
			          ?>				  
						
			            
			            <!-- More people... -->
			          </tbody>
			        </table>

			</div>
			<button onclick="trip_addModal()" class="fixed bottom-0 right-0 p-2 px-4 m-3 bg-blue-600 rounded-lg text-gray-50 hover:opacity-75">Add</button>
			
		</article>
	</section>
	<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDG4LfDl2SkDlvsZcVx3TEc5fhVBQqVUQw&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/components.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
<script type="text/javascript" src="js/firebaseConfig.js"></script>
</body>
</html>