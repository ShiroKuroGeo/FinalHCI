<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Upholstery</title>
    <link rel="stylesheet" href="Assets/Bootstraps/style.css">
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
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-uph">
        <div class="container px-5">
            <a class="navbar-brand" href="#!"><img src="Assets/UpholsteryPic/upholsteryLogo.png" alt="Upholstery Logo" width="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <section class="vh-100" id="app">
        <div class="container-fluid vh-100">
            <div class="row d-flex justify-content-center align-items-center vh-100">
                <div class="col-md-9 col-lg-6 col-xl-5 mt-auto">
                    <img src="Assets/UpholsteryPic/illustrationUpholstery.png"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-auto">
                    <form @submit="loginUser">
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
                <footer class="d-flex mt-auto text-center text-ms-start justify-content-between py-4 px-4 px-xl-5 bg-primary float-bottom">
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
    <script src="Assets/Middleware/vueJs/axios.js"></script>
    <script src="Assets/Middleware/vueJs/vue.3.js"></script>
    <script src="Assets/Middleware/vueJs/upholstery.js"></script>
    <!-- <script src="Middleware/jquery.js"></script>
    <script src="Middleware/login.js"></script> -->
</body>
</html>