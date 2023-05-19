<?php 
    session_start();  
    if(!isset($_SESSION['userId'])){
        header('location: /finalHCI/index.php');
    }
    $role = $_SESSION['role'];
    if($role == 2){
        header('location: ../Admin/index.php');
    }else if($role == 3){
        header('location: ../Employee/index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upholstery Shop</title>
    <!-- Bootstraps 5 -->
    <link rel="stylesheet" href="/finalhci/Assets/Bootstraps/style.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Toastry Alert -->
    <link rel="stylesheet" href="/finalhci/Assets/Middleware/plugins/toastr/toastr.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
</head>

<style>
    .panel-shadow {
        box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
    }
    .toast-info {
        background-color: #3276b1;
    }
    .toast-success {
        background-color: green;
    }
    .toast-error{
        background-color: red;
    }
</style>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-uph">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php"><img src="/finalhci/Assets/UpholsteryPic/upholsteryLogo.png" width="100" alt="UpholsteryLogo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active text-link" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active text-link" href="index.php#AllProducts">Products</a></li>
            </ul>
            <div class="cart my-3">
                <a href="cart.php" class="text-decoration-none me-4 text-link"><i class="fa fa-shopping-cart" height="120"></i></a>
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-link text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/finalhci/Backend/profilePicture/<?php echo $_SESSION['profileImage']; ?>" alt="hugenerd" width="38" height="38" class="rounded-circle"><br>
                    <div class="">
                        <span class="d-none d-sm-inline mx-1 text-link"><?php echo $_SESSION['fullname']; ?></span><br>
                        <span class="d-none d-sm-inline mx-1 text-link text-center"><?php echo $_SESSION['role'] == 1 ? "Customer" : "Admin"; ?></span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="myOrder.php">My Order</a></li>
                    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" id="btnLogout" href="#!">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="d-flex flex-column">