<?php 
    session_start();  
    if(isset($_SESSION['userId'])){
        if($_SESSION['role'] == 2 ){
            header('location: Users/Admin/index.php');
        }else if($_SESSION['role'] == 1){
            header('location: Users/Customer/index.php');
        }else if($_SESSION['role'] == 3){
            header('location: Users/Employee/index.php');
        }
    }
?>