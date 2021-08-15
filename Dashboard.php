<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="build/styles.css">
    <!-- <link href="css/app.css') }}" rel="stylesheet"> -->
</head>
<body class="bg-gray-800 flex flex-col h-screen">
    
        <div class="h-14 mt-2">       
            <div class="relative h-12 flex">
                <!-- <div class="p-3 text-gray-50 cursor-pointer ml-6 text-xl"><a href="{{url('/login')}}" title="Home">LOGO</a></div> -->
                <div class="flex flex-row">
                    <!-- <input type="text" name="Search" placeholder="Search..." class="absolute inset-x-2/4 border-1 m-1 mt-1.5 ml-4 p-1 focus:outline-none focus:ring focus:border-blue-300 rounded-full py-2 px-5"> -->
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg> -->
                </div>
                <div class="absolute right-3">                    
                    <button class="box-content py-2 px-4 bg-red-600 m-1 mt-2 rounded-lg text-gray-50 hover:opacity-75" onclick="logout()">Logout</button>                
                </div>
            </div>
        </div>
        <div class="box-border flex h-full mb-2">
            <div class="w-1/5 p-3 ">
                <center>
                    <h1 id="admin_name" class="text-3xl font-medium text-gray-50 cursor-default"></h1>
                    <br>
                    <div class="rounded-full h-24 w-24 flex items-center justify-center border-4 justify-self-center overflow-hidden"><img src=""></div>
                </center>  
                <br>        
                <div class="m-2 box-content p-2 pl-4 my-1 flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <a href="Users.php" target="frame" class="text-xl text-gray-50 hover:text-red-600 cursor-pointer">USERS</a>

                </div>        

                <div class="m-2 box-content p-2 pl-4 my-1 flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <a href="Drivers.php" target="frame" class="text-xl text-gray-50 hover:text-red-600 cursor-pointer">DRIVERS</a>
                </div>

                <div class="m-2 box-content p-2 pl-4 my-1 flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <a href="Trips.php" target="frame" class="text-xl text-gray-50 hover:text-red-600 cursor-pointer">TRIPS</a>
                </div>

                <div class="m-2 box-content p-2 pl-4 my-1 flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <a href="Routes.php" target="frame" class="text-xl text-gray-50 hover:text-red-600 cursor-pointer">ROUTES</a>
                </div>

                <div class="m-2 box-content p-2 pl-4 my-1 flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current text-gray-50" fill="none" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                      <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                    <a href="Approvals.php" target="frame" class="text-xl text-gray-50 hover:text-red-600 cursor-pointer">APPROVALS</a>
                </div>

                
            </div>
            <div class="relative w-4/5 mr-3 bg-gray-50 rounded-lg overflow-hidden">
                <iframe id="dash-frame" src="Users.php" name="frame" class="box-border rounded-lg w-full h-full relative">                    
                </iframe>                
            </div>
        </div>

<!-- <script src="{{url('/js/dashboard.js')}}"></script>            -->
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-auth.js"></script>
    <script type="text/javascript" src="js/firebaseConfig.js"></script>

</body>
</html>