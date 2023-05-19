<?php 
    session_start();  
    if(!isset($_SESSION['userId'])){
        header('location: /finalHCI/index.php');
    }
    $user_id = $_SESSION['userId'];
    $role = $_SESSION['role'];

    if($role == 1){
        header('location: ../Customer/index.php');
    }else if($role == 3){
        header('location: ../Employee/index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upholstery Dashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/finalhci/Assets/Bootstraps/style.css" rel="stylesheet">
    <link href="/finalhci/Assets/OtherFunctions/functions.css" rel="stylesheet">
    <link rel="stylesheet" href="/finalhci/Assets/Middleware/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="/finalhci/Assets/OtherFunctions/loading.js"></script>
    <style>
    .panel-shadow {
        box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
    }
    #composeBtn:hover{
        box-shadow: rgba(0, 0, 0, 0.3) 5px 5px 5px;
    }
    .toast-info {
        background-color: #3276b1;
    }
    .toast-success {
        background-color: yellowgreen;
    }
    .toast-error{
        background-color: red;
    }
    <?php
        if ($_SERVER['PHP_SELF'] == '/finalHCI/Users/Admin/dashboard.php') {
            echo '.dashboardLink { background-color: #FFB703; width: 100%; background-color: #FFB703; border-radius: 10px; padding-left: 10px; padding-right: 10px; }';
        }elseif($_SERVER['PHP_SELF'] == '/finalHCI/Users/Admin/customer.php'){
            echo '.usersLink { background-color: #FFB703; width: 100%; background-color: #FFB703; border-radius: 10px; padding-left: 10px; padding-right: 10px; }';
        }elseif($_SERVER['PHP_SELF'] == '/finalHCI/Users/Admin/orders.php'){
            echo '.orderSalesLink { background-color: #FFB703; width: 100%; background-color: #FFB703; border-radius: 10px; padding-left: 10px; padding-right: 10px; }';
        }elseif($_SERVER['PHP_SELF'] == '/finalHCI/Users/Admin/postProduct.php'){
            echo '.productLink { background-color: #FFB703; width: 100%; background-color: #FFB703; border-radius: 10px; padding-left: 10px; padding-right: 10px; }';
        }elseif($_SERVER['PHP_SELF'] == '/finalHCI/Users/Admin/Recommendation.php'){
            echo '.recommendationLink { background-color: #FFB703; width: 100%; background-color: #FFB703; border-radius: 10px; padding-left: 10px; padding-right: 10px; }';
        }
    ?>
</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 bg-uph d-flex">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-link">
                    <a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-link text-decoration-none">
                        <span class="fs-5"><img src="upholsteryPic/upholsteryLogo.png" width="70" alt=""><span class="ms-1 mt-4 h3 d-none d-sm-inline fw-bold text-title">Upholstery</span></span>
                    </a><hr>
                    <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                        <li class="my-2 dashboardLink">
                            <a href="dashboard.php" class="nav-link px-sm-0 sidebar">
                                <i class="fa-solid fa-chart-line" style="color: #005eff;"></i>
                                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="my-2 usersLink">
                            <a href="customer.php" class="nav-link px-sm-0 sidebar">
                                <i class="fa-solid fa-users" style="color: #005eff;"></i>
                                <span class="ms-1 d-none d-sm-inline">Users</span>
                            </a>
                        </li>
                        <li class="my-2 orderSalesLink">
                            <a href="orders.php" class="nav-link px-sm-0 sidebar">
                                <i class="fa-solid fa-box-open" style="color: #005eff;"></i>
                                <span class="ms-1 d-none d-sm-inline">Orders & Sales</span>
                            </a>
                        </li>
                        <li class="my-2 productLink">
                            <a href="postProduct.php" class="nav-link px-sm-0 sidebar">
                                <i class="fa-solid fa-envelopes-bulk" style="color: #005eff;"></i>
                                <span class="ms-1 d-none d-sm-inline">Product</span>
                            </a>
                        </li>
                        <li class="my-2 recommendationLink">
                            <a href="Recommendation.php" class="nav-link px-sm-0 sidebar">
                                <i class="fa-solid fa-comments" style="color: #005eff;"></i>
                                <span class="ms-1 d-none d-sm-inline">Recommendation</span>
                            </a>
                        </li>
                    </ul>
                    <div class="py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                        <a href="#" class="d-flex align-items-center text-link text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/finalhci/Assets/upholsteryPic/georgeAlfeser.png" width="28" height="28" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['fullname']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <!-- <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> -->
                            <li><a class="dropdown-item" id="btnLogout" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>