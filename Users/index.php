<?php 
    session_start();  
    if(isset($_SESSION['userId'])){
        if($_SESSION['role'] == 2 ){
            header('location: Admin/index.php');
        }else if($_SESSION['role'] == 1){
            header('location: Customer/index.php');
        }else if($_SESSION['role'] == 3){
            header('location: Employee/index.php');
        }
    }
?>