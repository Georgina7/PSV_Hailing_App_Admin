<?php
include("authentication.php");
include("dbconn.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="build/styles.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
</head>

<body class="h-full">
    <div class="h-auto bg-gray-100">
        <div class="container p-5 mx-auto">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="p-3 bg-white border-t-4 border-green-400">
                        <div class="overflow-hidden image">
                            <?php
                                $admin_id = $_SESSION['verified_user_id'];
                                $ref_table = 'Admins/'.$admin_id;
                                $value = $database->getReference($ref_table)->getValue();
                            
                            if($value['profileImagePath']==""){
                                ?>
                            <img class="w-full h-auto mx-auto"
                                src="Image/default_profile.jpg"
                                alt="">
                                <?php
                            }else{?>
                             <img class="w-full h-auto mx-auto"
                                src="<?php echo $value['profileImagePath']; ?>"
                                alt="">
                                <?php
                            }
                                ?>
                        </div>
                        <h1 class="my-1 text-xl font-bold leading-8 text-gray-900"><?php echo $value['fullName']; ?></h1>
                        <h3 class="leading-6 text-gray-600 font-lg text-semibold">Administrator</h3>

                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>

                </div>
                <!-- Right Side -->
                <div class="w-full h-64 mx-2 md:w-9/12">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="p-3 bg-white rounded-sm shadow-sm">
                        <div
                            class="flex items-center justify-center mb-8 space-x-2 font-semibold leading-8 text-gray-900">
                            <span clas="text-green-500 ">
                                <svg class="h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="justify-center text-xl tracking-wide">Profile</span>
                        </div>
                        <form id="adminProfile">
                        <div class="pb-8 text-gray-700">
                            <div class="grid pt-6 text-sm md:grid-cols-2">
                                <div class="grid grid-cols-2">
                                    
                                    <div class="px-4 py-4 font-semibold">Full Name:</div>
                                    <div class="px-4 py-2">
                                        <input placeholder="Full Name" value="<?php echo $value['fullName']; ?>"
                                            class="w-full px-3 py-2 rounded shadow appearance-none leading-tighttext-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline"
                                            id="username" name="name" type="text">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">Email:</div>
                                    <div class="px-4 py-2">
                                        <input placeholder="Email" readonly
                                            class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline"
                                            id="username" name="email" value="<?php echo $value['email']; ?>" type="email">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">Phone Number:</div>
                                    <div class="px-4 py-2">
                                        <input placeholder="Phone Number"
                                            class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none focus:shadow-outline"
                                            id="username" name="phone_number" value="<?php echo $value['number']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">Profile Photo</div>
                                    <div class="px-2 py-1">
                                        <input class="hidden text-sm cursor-pointer w-36" name="uploadImage" id="uploadImage" type="file" multiple>
                                        <div class="h-auto px-3 py-2 font-semibold text-center text-white bg-blue-600 border border-gray-300 rounded cursor-pointer py-21 text hover:opacity-50" id="uploadImageDiv">Select Photo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="flex items-center justify-center text-green-500" id="update_success"></p>
                        <button
                        id="adminEditProfile"
                        class="block w-full p-3 my-4 text-sm font-semibold text-blue-600 rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs">Update Details</button>
                        </form>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    
                    <div class="p-3 bg-white rounded-sm shadow-sm">
                        <div
                            class="flex items-center justify-center mb-8 space-x-2 font-semibold leading-8 text-gray-900">
                            <span clas="text-green-500 ">
                                <svg fill="#000000" class="h-5" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px"><path d="M 9.6660156 2 L 9.1757812 4.5234375 C 8.3516137 4.8342536 7.5947862 5.2699307 6.9316406 5.8144531 L 4.5078125 4.9785156 L 2.171875 9.0214844 L 4.1132812 10.708984 C 4.0386488 11.16721 4 11.591845 4 12 C 4 12.408768 4.0398071 12.832626 4.1132812 13.291016 L 4.1132812 13.292969 L 2.171875 14.980469 L 4.5078125 19.021484 L 6.9296875 18.1875 C 7.5928951 18.732319 8.3514346 19.165567 9.1757812 19.476562 L 9.6660156 22 L 14.333984 22 L 14.824219 19.476562 C 15.648925 19.165543 16.404903 18.73057 17.068359 18.185547 L 19.492188 19.021484 L 21.826172 14.980469 L 19.886719 13.291016 C 19.961351 12.83279 20 12.408155 20 12 C 20 11.592457 19.96113 11.168374 19.886719 10.710938 L 19.886719 10.708984 L 21.828125 9.0195312 L 19.492188 4.9785156 L 17.070312 5.8125 C 16.407106 5.2676813 15.648565 4.8344327 14.824219 4.5234375 L 14.333984 2 L 9.6660156 2 z M 11.314453 4 L 12.685547 4 L 13.074219 6 L 14.117188 6.3945312 C 14.745852 6.63147 15.310672 6.9567546 15.800781 7.359375 L 16.664062 8.0664062 L 18.585938 7.40625 L 19.271484 8.5917969 L 17.736328 9.9277344 L 17.912109 11.027344 L 17.912109 11.029297 C 17.973258 11.404235 18 11.718768 18 12 C 18 12.281232 17.973259 12.595718 17.912109 12.970703 L 17.734375 14.070312 L 19.269531 15.40625 L 18.583984 16.59375 L 16.664062 15.931641 L 15.798828 16.640625 C 15.308719 17.043245 14.745852 17.36853 14.117188 17.605469 L 14.115234 17.605469 L 13.072266 18 L 12.683594 20 L 11.314453 20 L 10.925781 18 L 9.8828125 17.605469 C 9.2541467 17.36853 8.6893282 17.043245 8.1992188 16.640625 L 7.3359375 15.933594 L 5.4140625 16.59375 L 4.7285156 15.408203 L 6.265625 14.070312 L 6.0878906 12.974609 L 6.0878906 12.972656 C 6.0276183 12.596088 6 12.280673 6 12 C 6 11.718768 6.026742 11.404282 6.0878906 11.029297 L 6.265625 9.9296875 L 4.7285156 8.59375 L 5.4140625 7.40625 L 7.3359375 8.0683594 L 8.1992188 7.359375 C 8.6893282 6.9567546 9.2541467 6.6314701 9.8828125 6.3945312 L 10.925781 6 L 11.314453 4 z M 12 8 C 9.8034768 8 8 9.8034768 8 12 C 8 14.196523 9.8034768 16 12 16 C 14.196523 16 16 14.196523 16 12 C 16 9.8034768 14.196523 8 12 8 z M 12 10 C 13.111477 10 14 10.888523 14 12 C 14 13.111477 13.111477 14 12 14 C 10.888523 14 10 13.111477 10 12 C 10 10.888523 10.888523 10 12 10 z"/></svg>
                            </span>
                            <span class="justify-center text-xl tracking-wide">Account Settings</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center mb-3 space-x-2 font-semibold leading-8 text-gray-900">
                                    <span class="tracking-wide">Change Password</span>
                                </div>
                                <ul class="space-y-2 list-inside">
                                    <li>
                                         <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">New Password:</div>
                                    
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">Confirm New Password:</div>
                                    
                                </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center mb-3 space-x-2 font-semibold leading-8 text-gray-900">
                                    <span clas="text-green-500 my-4">
                                    
                                    </span>
                                    
                                </div>
                                <form id="adminChangePassword">
                                <ul class="mt-10 space-y-2 list-inside">
                                    <li>
                                        <div class="px-4 py-2">
                                        <input placeholder="New Password"
                                            class="w-full px-3 py-2 rounded shadow appearance-none focus:ring-2 focus:ring-blue-500 leading-tighttext-gray-700 focus:outline-none focus:shadow-outline"
                                            id="n_password" name="new_password" type="password"  onkeyup='check();' required>
                                    </div>
                                    </li>
                                    <li>
                                       <div class="px-4 py-2">
                                        <input placeholder="Confirm Password"
                                            class="w-full px-3 py-2 rounded shadow appearance-none focus:ring-2 focus:ring-blue-500 leading-tighttext-gray-700 focus:outline-none focus:shadow-outline"
                                            id="c_password" name="confirm_new_password" type="password"  onkeyup='check();' required>
                                            <span id='message'></span
                                         </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                        <p class="flex items-center justify-center text-green-500" id="success"></p>	
                        <p class="flex items-center justify-center text-red-600" id="error"></p>	
                        <div>
                            <button
                            id="admin_change_password_btn"
                            class="block w-full p-3 my-4 text-sm font-semibold text-blue-600 rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs">Update Details</button>
                        </div>
                            </form>
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
        integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/components.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
    <script type="text/javascript" src="js/firebaseConfig.js"></script>
</body>

</html>