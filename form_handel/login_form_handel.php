<?php
require "../pdo.php";
require "../query/login_query.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $singin_id  = $_POST["singin_id"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    echo $user_email,$user_password;
    try {
        if(empty($user_email)||empty($user_password)){
            header("location:http://localhost/facebook/?error=input_empty");
        }
       elseif(user_exists($pdo,$user_email, $user_password)){
        $_SESSION["gmail_token"] = base64_encode($user_email);
        header("Location: http://localhost/facebook/profile_viewing/login_profile_view.php?useremail={$_SESSION['gmail_token']}");
        exit();
        }   
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
else {
    header("location:http://localhost/facebook/");
}