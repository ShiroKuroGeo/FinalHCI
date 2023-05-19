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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Villarubia's Upholstery</title>
    <!-- AOS Link -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="Assets/Bootstraps/style.css">
    <link rel="stylesheet" href="Assets/OtherFunctions/functions.css">
    <sscript src="https://kit.fontawesome.com/d41feec2f9.js" crossorigin="anonymous"></sscript>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div id="app">        
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-uph">
        <div class="container px-5">
            <a class="navbar-brand" href="#!"><img src="/finalHCI/Assets/UpholsteryPic/upholsteryLogo.png" alt="Upholstery Logo" width="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#projects">Project</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#aboutUS">About Us</a></li>
                    <li class="nav-item me-4"><a class="nav-link active" href="#contactUs">Contact Us</a></li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">
                            Login
                        </a>
                        <div class="dropstart">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 320px;">
                                <div class="col-12">
                                    <p class="text-center fw-bolder">Sign in</p>
                                    <li><hr class="dropdown-divider"></li>
                                    <div class="px-3 py-3">
                                        <label for="">Username</label>
                                        <div class="input-group input-group-sm mb-2">
                                            <input type="text" class="form-control" placeholder="Username" required="required">
                                        </div>
                                        <label for="">Password</label>
                                        <div class="input-group input-group-sm">
                                            <input type="password" class="form-control" placeholder="Password" required="required">
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input type="submit" class="btn btn-sm col-5 mt-4 btn-primary btn-block" value="Login">
                                        </div>
                                        <div class="text-center mt-2">
                                            <a href="#" class="text-decoration-none mb-2">Forgot Your password?</a><br>
                                            Don't have an account?<a href="#" class="text-decoration-none"> Sign up</a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-uph py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-between">
                <div class="col-lg-6">
                    <div class="my-5">
                        <h1 class="display-6 fw-bolder text-link mb-2">Professional upholstery services for all your furniture needs.</h1>
                        <p class="lead text-link mb-4">We pride ourselves on providing excellent
                            customer service, top-quality workmanship,
                            and competitive prices. We are committed to
                            delivering exceptional results that will exceed
                            your expectations and ensure your complete
                            satisfaction.</p>
                        <div class="d-grid gap-3 d-sm-flex">
                            <a class="btn btn-uph btn-sm px-4 me-sm-3" href="#features">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <img src="/finalHCI/Assets/UpholsteryPic/illustrationUpholstery.png" class="col-12" alt="Upholstery illustration">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5">
            <h1 class="heading mb-5 fw-bold text-sec"><span>Features</span></h1>
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature col-2 bg-gradient text-center rounded-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="55" viewBox="0 0 512 512"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg></div>
                    <h2 class="h4 fw-bolder">Showcase your work on social media</h2>
                    <div class="text">
                        <p>Upholsterers can leverage social media platforms such as Instagram, Facebook, and Pinterest to showcase their work and connect with potential customers. By regularly posting photos of your projects and engaging with your followers, you can build a strong online presence and attract new clients.</p>
                    </div>
                    <button class="more-btn read-more">
                        See more<i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature col-2 bg-gradient text-center rounded-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="55" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg></div>
                    <h2 class="h4 fw-bolder">Participate in trade shows and events</h2>
                    <div class="text">
                        <p>Upholstery trade shows and events provide a great opportunity to showcase your work, network with industry professionals, and promote your business. Consider participating in local trade shows and events, and make sure to have samples of your work and business cards on hand to distribute to potential clients. This can help you feature your business and reach a wider audience of potential customers.</p>
                    </div>
                    <button class="more-btn read-more">
                        See more<i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col-lg-4">
                    <div class="feature col-2 bg-gradient text-center rounded-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="55" viewBox="0 0 640 512"><path d="M64 64a64 64 0 1 1 128 0A64 64 0 1 1 64 64zM25.9 233.4C29.3 191.9 64 160 105.6 160h44.8c27 0 51 13.4 65.5 34.1c-2.7 1.9-5.2 4-7.5 6.3l-64 64c-21.9 21.9-21.9 57.3 0 79.2L192 391.2V464c0 26.5-21.5 48-48 48H112c-26.5 0-48-21.5-48-48V348.3c-26.5-9.5-44.7-35.8-42.2-65.6l4.1-49.3zM448 64a64 64 0 1 1 128 0A64 64 0 1 1 448 64zM431.6 200.4c-2.3-2.3-4.9-4.4-7.5-6.3c14.5-20.7 38.6-34.1 65.5-34.1h44.8c41.6 0 76.3 31.9 79.7 73.4l4.1 49.3c2.5 29.8-15.7 56.1-42.2 65.6V464c0 26.5-21.5 48-48 48H496c-26.5 0-48-21.5-48-48V391.2l47.6-47.6c21.9-21.9 21.9-57.3 0-79.2l-64-64zM272 240v32h96V240c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2l64 64c9.4 9.4 9.4 24.6 0 33.9l-64 64c-6.9 6.9-17.2 8.9-26.2 5.2s-14.8-12.5-14.8-22.2V336H272v32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2z"/></svg></div>
                    <h2 class="h4 fw-bolder">Participate in local trade shows</h2>
                    <div class="text">
                        <p>Upholstery trade shows and fairs provide a great opportunity to showcase your work and network with industry professionals. By attending these events and showcasing your skills, you can build your reputation and establish yourself as an expert in your field.</p>
                    </div>
                    <button class="more-btn read-more">
                        See more<i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Section -->
    <section class="py-5 border-bottom" id="projects">
    <div class="container">
                <div class="row d-flex justify-content-between align-items-between">
                    <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                        <img src="Assets/UpholsteryPic/largeSofa.png" alt="Large Sofa" width="400" class="mt-4" data-aos="fade-left">
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="d-flex justify-content-center align-items-center fst-italic mt-5 fw-normal h5" data-aos="fade-left">
                            A large sofa is a type of sofa that is designed to accommodate<br>
                            three or more people. It is typically longer and wider than a <br>
                            standard sofa, and may have a deeper seat or additional<br>
                            cushions to provide added comfort. Large sofas are ideal<br>
                            for spacious livingrooms or family rooms where there is<br>
                            plenty of room for seating.
                        </span>
                    </div>
                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                        <img src="/finalHCI/Assets/UpholsteryPic/bluesofa.png" alt="Blue Sofa" width="220" data-aos="fade-right">
                    </div>
                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                        <img src="/finalHCI/Assets/UpholsteryPic/threePersonSofa.png" alt="3 per Person sofa" width="380" data-aos="fade-up">
                    </div>
                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                        <img src="/finalHCI/Assets/UpholsteryPic/whiteLightSofa.png" alt="White Sofa" width="250"  data-aos="fade-left">
                    </div>
                </div>
            </div>
    </section>
    <!-- About Us Section -->
    <section class="py-5 border-bottom" id="aboutUS">
        <div class="container px-5 my-5">
            <h1 class="heading mb-5 fw-bold text-sec"><span>About Us</span></h1>
            <div class="row gx-5">
                <div class="d-flex justify-content-center mb-5 text-center">
                    <span class="col-10"  data-aos="fade-down">
                        <span class="d-flex justify-content-center h4">For Artist, by Artist</span>
                        <span class="fw-normal text-center h6">
                            We're a small group, 3rd year college student in Cordova Public College.
                            One of us is a working student, all of us have the same talent in singing as well as coding.
                            We've worked hard to graduate with degree where we do big things. We're here to
                            do the system for our beloved client.
                        </span>
                    </span>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0 text-center">
                    <!-- Picture and Desciption -->
                    <img src="/finalHCI/Assets/UpholsteryPic/georgeAlfeser.png" class="mt-2" alt="George Alfeser Inoc" width="200" height="200" data-aos="fade-right">
                    <div class="text-center" data-aos="fade-right">
                        <span class="fw-bold text-title">Inoc, George Alfeser</span><br>
                        <span class="text-center text-sec fst-italic">
                            Hi, I am Inoc, George Alfeser from
                            Poblacion Cordova Cebu. I am the
                            full stack developer and also the leader of 3 man team.
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0 text-center">
                    <!-- Picture and Desciption -->
                    <img src="/finalHCI/Assets/UpholsteryPic/divineYabo.png" class="mt-2"  alt="Divine Yabo" width="200" height="200" data-aos="fade-up">
                    <div class="text-center" data-aos="fade-up">
                        <span class="fw-bold text-title">Yabo, Divine</span><br>
                        <span class="text-center  text-sec fst-italic">
                            Hi, I am Yabo Divine from lapu-lapu
                            Cebu, I am assigned as
                            frontend developer.
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0 text-center">
                    <!-- Picture and Desciption -->
                    <img src="/finalHCI/Assets/UpholsteryPic/loberanesJonathan.png" class="mt-2"  alt="Jonathan Loberanes" width="200" height="200" data-aos="fade-left">
                    <div class="text-center" data-aos="fade-left">
                        <span class="fw-bold text-title">Loberanes, Jonathan jr,</span><br>
                        <span class="text-center text-sec fst-italic">
                            Hi, I am Loberanes Jonathan<br>
                            jr, from Poblaction Cordova<br>
                            Cebu. I am assigned as<br>
                            backend developer.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials section-->
    <section class="py-5 border-bottom" id="contactUs">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-link rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h2 class="fw-bolder fw-bold text-sec">Get in touch</h2>
                <p class="lead mb-0 text-sec">We'd love to hear from you</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <form @submit="recommendation" id="reset">
                        <input class="form-control" name="Name" type="text" placeholder="Enter your name..." /><br>
                        <input class="form-control" name="Email" type="email" placeholder="name@example.com" /><br>
                        <input class="form-control" name="Phone" type="tel" placeholder="(123) 456-7890" /><br>
                        <textarea class="form-control" name="Message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea><br>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- Footer-->
    <footer class="py-5 bg-uph">
        <div class="container px-5"><p class="m-0 text-center text-link">Copyright &copy; Villarubia's Upholstery 2023</p></div>
    </footer>
    <script src="/finalHCI/Assets/Middleware/jquery.js"></script>
    <script src="/finalHCI/Assets/Bootstraps/script.js"></script>
    <script src="/finalHCI/Assets/OtherFunctions/functions.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="/finalHCI/Assets/Middleware/vueJS/axios.js"></script>
    <script src="/finalHCI/Assets/Middleware/vueJS/vue.3.js"></script>
    <script src="/finalHCI/Assets/Middleware/vueJS/upholstery.js"></script>
    <script>
        AOS.init({
            duration: 2000
        });
    </script>
</body>
</html>
