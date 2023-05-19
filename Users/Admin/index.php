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
    }else if($role == 2){
        header('location: ../Admin/dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Upholstery</title>
    <link rel="stylesheet" href="/finalHCI/Assets/Bootstraps/style.css">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100vh;
            }
        }
    </style>
</head>
<body>
    <section class="vh-100" id="app">
        <div class="container-fluid vh-100">
            <div class="row d-flex justify-content-center align-items-center vh-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="/finalHCI/Assets/UpholsteryPic/illustrationUpholstery.png"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form @submit="loginUser">
                        <div class="d-flex flex-row align-items-center justify-content-between justify-content-lg-between">
                            <p class="lead fw-normal mb-0 me-3">Sign in as</p>
                            <button type="button" class="btn btn-sm btn-floating mx-1">
                                Admin
                            </button>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="Username" class="form-control form-control-lg" placeholder="Enter a Username" />
                            <label class="form-label" for="form3Example3">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="Password" class="form-control form-control-lg"  placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>
                        <!-- Don't have an account link -->
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" id="btnLogin" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Don't have an account? 
                                <a href="register.php"class="link-danger">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
                <footer class="d-flex text-center text-ms-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                    <!-- Copyright -->
                    <div class="text-white mb-3 mb-md-0">
                        Copyright © 2020. All rights reserved.
                    </div>
                    <!-- Copyright -->
        
                    <!-- Right -->
                    <div>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i> <!-- Change this Icon -->
                    </a>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-twitter"></i> <!-- Change this Icon -->
                    </a>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-google"></i> <!-- Change this Icon -->
                    </a>
                    <a href="#!" class="text-white">
                        <i class="fab fa-linkedin-in"></i> <!-- Change this Icon -->
                    </a>
                    </div>
                    <!-- Right -->
                </footer>
            </div>
        </div>
    </section>
    <script src="/finalHCI/Middleware/jquery.js"></script>
    <script src="/finalHCI/Middleware/vueJs/axios.js"></script>
    <script src="/finalHCI/Middleware/vueJs/vue.3.js"></script>
    <script src="/finalHCI/Middleware/vueJs/upholstery.js"></script>
</body>
</html>