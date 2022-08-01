<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    unset($_SESSION["loggedin"]);
    unset($_SESSION["id"]);
    unset($_SESSION["username"]);
    header("location: ../login/index.php");
    exit;
}
else{
    header("location: ../page_not_found/index.php");
    exit;
}