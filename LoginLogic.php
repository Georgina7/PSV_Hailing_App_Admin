<?php
session_start();
include('dbconn.php');

if(isset($_POST['admin_login_btn'])){
    $adminEmail = $_POST['email'];
    $adminPassword = $_POST['password'];

try {
    $user = $auth->getUserByEmail("$adminEmail");
    try 
    {
        $signInResult = $auth->signInWithEmailAndPassword($adminEmail, $adminPassword);
        $idTokenString = $signInResult->idToken();

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');
            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;
            
            $_SESSION['status'] = "Login is Successful";
            header("location: ./Dashboard.php"); 
            exit();
        } catch (InvalidToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        } catch (\InvalidArgumentException $e) {
            echo 'The token could not be parsed: '.$e->getMessage();
        }
    } catch (Exception $th) 
    {
        echo $e->getMessage();
        $_SESSION['status'] = "Wrong Password";
        header("location: ./Login.php");   
        exit(); 
    }
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    echo $e->getMessage();
    $_SESSION['status'] = "Invalid Email";
    header("location: ./Login.php");
    exit();
}
}
?>