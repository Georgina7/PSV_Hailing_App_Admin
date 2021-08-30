<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/styles.css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Reset Password</title>
</head>
<body>
    <!-- component -->
<div class="flex flex-col max-w-4xl my-10 overflow-hidden bg-white rounded-lg shadow-lg md:ml-48 md:h-56 md:flex-row">
        <div class="items-center justify-center md:flex md:w-1/2 md:bg-red-800">
            <div class="px-8 py-6 md:py-0">
                <h2 class="text-2xl font-bold text-gray-700 md:text-white">Reset Password</h2>
                <p class="mt-2 text-gray-600 md:text-white">Enter your email to receive a reset password link</p>
            </div>
        </div>
        <div class="flex items-center justify-center pb-6 border-blue-600 md:py-0 md:w-1/2 md:border-b-8">
            <form id="resetPassword">
                <div class="flex flex-col overflow-hidden rounded-lg sm:flex-row">
                    <input class="px-4 py-3 text-gray-800 placeholder-gray-500 bg-gray-200 border-2 border-gray-300 outline-none focus:bg-gray-100" type="text" name="email_reset" placeholder="Enter your email" required>
                    <button class="px-4 py-3 font-semibold text-gray-100 uppercase bg-red-800 hover:opacity-50">Send Link</button>
                </div>
                <p class="flex items-center justify-center text-green-500" id="reset_success"></p>
            </form>
        </div>
    </div>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-auth.js"></script>
    <script type="text/javascript" src="js/firebaseConfig.js"></script>
    <script type="text/javascript" src="js/components.js"></script>
</body>
</html>