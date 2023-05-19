<?php
session_start();
require("UpholsteryBackend.php");

$method = $_POST['METHOD'];
if(function_exists($method)){
    call_user_func($method);
}else{
    echo "Function not Exist";
}

function loginUser(){
    $back = new UpholsteryBackend();
    echo $back->doLogin($_POST['Username'], $_POST['Password']);
}

function registerUser(){
    $back = new UpholsteryBackend();
    echo $back->doRegister($_POST['Fullname'],$_POST['Email'],$_POST['Username'],$_POST['PhoneNumber'],$_POST['Password'],"defaultProfilePicture.jpg");
}


function doRecommendation(){
    $back = new UpholsteryBackend();
    echo $back->doRecommendation($_POST['Name'], $_POST['Email'], $_POST['Phone'], $_POST['Message']);
}