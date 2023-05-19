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

<div id="customerLandingPage">
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
                    <a href="cart.php" class="text-decoration-none me-4 text-link"><i class="fa fa-shopping-cart" height="120"></i><sup>{{ totalMyCarts }}</sup></a>
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
        <!-- Section-->
        <section class="py-2 vh-100" id="products">
            <div class="container px-4 py-2 px-lg-5 pt-5">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Villarubia's Upholstery Service and Repair</h1>
                            <h4 class="h2 fst-italic">Repair and Buy</h4>
                            <p>
                                We pride ourselves on providing excellent customer service, top-quality workmanship, and competitive prices. <br>
                                We are committed to delivering exceptional results that will exceed your expectations and ensure your complete satisfaction.
                            </p>
                            <button class="btn btn-uph mt-3 mb-4 col-4 btn-sm" disabled>Request Repair</button>
                        </div>
                    </div>
                </div>
                <div class="text-center my-5" id="AllProducts">
                    <h1>Features New Products</h1>
                    </div>
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                        <div class="col border mb-5 panel-shadow rounded pt-2 me-4" v-for="pro in products">
                            <span class="fw-bold fst-italic">{{ pro.productName }}</span><br>
                            <a :href="'viewProduct.php?productId=' + pro.productId" class="d-flex justify-content-center">
                                <img class="object-fit-cover rounded my-2" width="190" height="190" :src="'/finalHCI/Backend/upload/' + pro.productImage" alt="..." />
                            </a>
                            <span class="fst-normal">Price: <small class="fst-normal">{{ pro.price }}</small></span><br>
                            <span class="fst-normal">Quantity: <small>{{ pro.quantity }}</small></span>
                            <div class="btn-toolbar justify-content-between btn-sm">
                                <button type="button" class="btn btn-primary btn-sm h6" @click="getProductIds(pro.productId)" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#buyProduct">Buy Product</button>
                                <button type="button" class="btn btn-primary btn-sm h6" @click="addToCart(pro.productId)">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php include('../Assets/Customer/footerContact.php'); ?>
        </section>
        <!-- Modal -->
        <div class="modal" id="buyProduct">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">View Option</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container" v-for="pro in selectProduct">
                            <form @submit="buyProduct(pro.productId)">
                                Product Name : {{ pro.productName }} <br>
                                Product Price : {{ pro.price }} <br>
                                <input type="number" name="quantity" id="quantity" placeholder="Quantity">
                                Select Address<select name="address" v-model="role" id="address">
                                    <option v-for="add in address" :value="add.addressId">{{ add.barangay }}</option>
                                </select>
                                <div class="d-flex justify-content-center align-items-center my-3">
                                    <button type="submit" class="btn btn-primary mx-3">Buy Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../Assets/Customer/footer.php'); ?>