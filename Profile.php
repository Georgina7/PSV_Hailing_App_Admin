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
        <div class="container p-5 mx-auto my-5">
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
                            ?>
                            <img class="w-full h-auto mx-auto"
                                src="https://media.geeksforgeeks.org/wp-content/uploads/20200123100652/geeksforgeeks12.jpg"
                                alt="">
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
                                            class="w-full px-3 py-2 rounded shadow appearance-none leading-tighttext-gray-700 focus:outline-none focus:shadow-outline"
                                            id="username" name="name" type="text">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">Email:</div>
                                    <div class="px-4 py-2">
                                        <input placeholder="Email" readonly
                                            class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="username" name="email" value="<?php echo $value['email']; ?>" type="email">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">Phone Number:</div>
                                    <div class="px-4 py-2">
                                        <input placeholder="Phone Number"
                                            class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="username" name="phone_number" value="<?php echo $value['number']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-4 font-semibold">Profile Photo</div>
                                    <div class="px-2 py-1">
                                        <label>
                                            <input class="hidden text-sm cursor-pointer w-36" type="file" multiple>
                                            <div class="h-auto px-3 py-2 font-semibold text-center text-white bg-indigo-600 border border-gray-300 rounded cursor-pointer py-21 text hover:bg-indigo-500">Select Photo</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="flex items-center justify-center text-green-500" id="update_success"></p>
                        <button
                        id="adminEditProfile"
                        class="block w-full p-3 my-4 text-sm font-semibold text-blue-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs">Update Details</button>
                        </form>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <!-- Experience and education -->
                    <div class="p-3 bg-white rounded-sm shadow-sm">

                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center mb-3 space-x-2 font-semibold leading-8 text-gray-900">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Experience</span>
                                </div>
                                <ul class="space-y-2 list-inside">
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-xs text-gray-500">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-xs text-gray-500">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-xs text-gray-500">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-xs text-gray-500">March 2020 - Now</div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center mb-3 space-x-2 font-semibold leading-8 text-gray-900">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Education</span>
                                </div>
                                <ul class="space-y-2 list-inside">
                                    <li>
                                        <div class="text-teal-600">Masters Degree in Oxford</div>
                                        <div class="text-xs text-gray-500">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                        <div class="text-xs text-gray-500">March 2020 - Now</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
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