<?php include('../Assets/Admin/header.php'); ?>
  <!-- <link rel="stylesheet" href="../Assets/dist/css/adminlte.min.css"> -->
<!-- from the next Column Section -->
<div class="col-10 vh-100 h-sm-100 container overflow-auto">
    <main class="row overflow-auto my-sm-0 mb-lg-4 vh-100" id="dashboardMount">
        <div class="content vh-100">
            <div class="content-header my-4">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 fw-bold text-sec">Dashboard</h1>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb my-auto">
                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none  text-sec">Home</a></li>
                                <li class="breadcrumb-item active  text-sec" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section Start Here -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="alert alert-secondary d-flex align-items-center panel-shadow bg-sec text-card">
                                <span class="p-1 me-2 rounded bg-icon p-3 rounded-circle"><a href="customer.php" class="text-light"><i class="fa-solid fa-users fa-2xl" style="color: #023047;"></i></a></span>
                                <div class="info-box-content ms-2">
                                    <span class="info-box-text">Members</span><br>
                                    <span class="info-box-number">{{ customerLength }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="alert alert-secondary d-flex align-items-center panel-shadow bg-sec text-card">
                                <span class="p-1 me-2 rounded bg-icon p-3"><a href="customer.php" class="text-light"><i class="fa-solid fa-box-open fa-2xl" style="color: #023047;"></i></a></span>
                                <div class="info-box-content ms-2">
                                    <span class="info-box-text">Products</span><br>
                                    <span class="info-box-number">{{ productLength }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="alert alert-secondary d-flex align-items-center panel-shadow bg-sec text-card">
                                <span class="p-1 me-2 rounded bg-icon p-3"><a href="orders.php" class="text-light"><i class="fa-solid fa-arrow-trend-up fa-2xl" style="color: #023047;"></i></a></span>
                                <div class="info-box-content ms-2">
                                    <span class="info-box-text">Sales</span><br>
                                    <span class="info-box-number">{{ ordersLength }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- ongoing  -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="alert alert-secondary d-flex align-items-center panel-shadow bg-sec text-card">
                                <span class="p-1 me-2 rounded bg-icon p-3"><a href="customer.php" class="text-light"><i class="fa-solid fa-comments fa-2xl" style="color: #023047;"></i></a></span>
                                <div class="info-box-content ms-2">
                                    <span class="info-box-text">Recommendation</span><br>
                                    <span class="info-box-number">{{ recommendationLenght }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Main row -->
                        <div class="row">
                            <!-- ongoing  -->
                            <div class="col-md-6 col-sm-12">
                                <!-- Bar card -->
                                <div class="card card-primary card-outline col-12">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                Total Sales Forecast
                                            </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="bar-chart" style="height: 280px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <!-- USERS LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="cart-title h4">
                                                Latest Members
                                            </div>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0" style="height: 315px;">
                                        <ul class="list-group">
                                            <li class="list-group-item" v-for="cus in customer">
                                                <img :src="'../../Backend/profilePicture/' + cus.profileImage" width="40" height="40" class="rounded" alt="User Image">
                                                <span style="word-break: break-all;" class="ps-3">{{ cus.fullname }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="cart-title h4">
                                                Latest Products
                                            </div>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0" style="height: 315px;">
                                        <ul class="list-group">
                                            <li class="list-group-item" v-for="pro in products">
                                                <img :src="'../../Backend/upload/' + pro.productImage" width="40" height="40" class="rounded-circle">
                                                {{ pro.productName }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
<?php include('../Assets/Admin/footer.php'); ?>