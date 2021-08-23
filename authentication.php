<?php
session_start();
include('dbconn.php');

if(isset($_SESSION['verified_user_id']))
{
    $uid = $_SESSION['verified_user_id'];
    $idTokenString = $_SESSION['idTokenString'];

    try {
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);
    } catch (InvalidToken $e) {
        echo 'The token is invalid: '.$e->getMessage();
        $_SESSION['status'] = "Token has expired! Login Again";
        header("location: ./Login.php"); 
        exit();
    } catch (\InvalidArgumentException $e) {
        echo 'The token could not be parsed: '.$e->getMessage();
        $_SESSION['status'] = "Token has expired! Login Again";
        header("location: ./Login.php"); 
        exit();
    }
}
?>