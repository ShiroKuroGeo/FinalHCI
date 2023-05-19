<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Upholstery</title>
    <link rel="stylesheet" href="Assets/Bootstraps/style.css">
</head>
<body>
    <section class="vh-100 bg-image" id="app">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card col-12 col-md-10 col-sm-12" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-2">Create an account</h2>
                                <form @submit="registerUser">
                                    <div class="form-outline">
                                        <input type="text" name="Fullname" class="form-control form-control-sm" placeholder="Full Name">
                                        <label class="form-label" for="form3Example1cg">Fullname</label>
                                    </div>
                                    <div class="form-outline">
                                        <input type="email" name="Email" class="form-control form-control-sm" placeholder="Email">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                    </div>
                                    <div class="form-outline">
                                        <input type="number" name="PhoneNumber" class="form-control form-control-sm" placeholder="Phone Number">
                                        <label class="form-label" for="form3Example4cg">Phone Number</label>
                                    </div>
                                    <div class="form-outline">
                                        <input type="text" name="Username" class="form-control form-control-sm" placeholder="Username">
                                        <label class="form-label" for="form3Example4cg">Username</label>
                                    </div>
                                    <div class="form-outline">
                                        <input type="password" name="Password" class="form-control form-control-sm" placeholder="Password">
                                        <label class="form-label" for="form3Example4cdg">Password</label>
                                    </div>
                                    <div class="form-outline">
                                        <input type="password" name="confirmPassword" class="form-control form-control-sm" placeholder="Confirm Password">
                                        <label class="form-label" for="form3Example4cdg">Confirm Password</label>
                                    </div>
                                    <div class="form-check d-flex justify-content-center">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="termOfServices"/>
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in 
                                            <a href="#!" class="text-body" id="modalTermOfServices">
                                                <u>Terms of service</u>
                                            </a>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" id="registerAccount" class="btn btn-success col-5 btn-block btn-sm gradient-custom-4 text-body">
                                            Register
                                        </button>
                                    </div>
                                    <p class="text-center text-muted mt-2 mb-0">
                                        Have already an account?
                                        <a href="login.php" class="fw-bold text-body">
                                            Login here
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="Assets/Middleware/vueJs/axios.js"></script>
    <script src="Assets/Middleware/vueJs/vue.3.js"></script>
    <script src="Assets/Middleware/vueJs/upholstery.js"></script>
</body>
</html>