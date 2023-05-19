<?php include('../Assets/Admin/header.php'); ?>

<div class="col-10 vh-100 h-sm-100 container overflow-auto" id="orderMount">
    <section class="content-header">
        <div class="content-header my-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0 fw-bold">Invoice</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb my-auto">
                            <li class="breadcrumb-item"><a href="dashboard.php" class="text-decoration-none text-dark">Home</a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="row overflow-auto vh-100">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="btnApprove">
                    <button type="button" class="btn col-1 btn-sm float-end my-3" @click="changeStatus">Approve All</button>
                </div>
                <div class="invoice" style="height: 450px; overflow: auto;">
                    <div class="row border p-5">
                        <div class="col-12 d-flex justify-content-between">
                            <div class="logo"><img src="../../Assets/UpholsteryPic/upholsteryLogo.png" alt="UpholsteryLogo" width="50"></div>
                            <div class="Ordered">Date to Deliver : {{ dateOrdered }}</div>
                        </div>
                        <div class="col-4 border-end">
                            <br><b>From</b><br><br>
                            <b>Villarubia's Uphosltery</b> <br>
                            Bangbang Cordova<br>
                            Cebu 6017<br>
                            Phone: 0912345456<br>
                            Email: inocgeorge@gmail.com
                        </div>
                        <div class="col-4 border-end">
                            <br><b>To</b><br><br>
                            <b>{{ fullname }}</b> <br>
                            {{ province +" "+ barangay }}<br>
                            {{ city +" "+ postalCode }}<br>
                            Phone: {{ phoneNumber }}<br>
                            Email: {{ email }}
                        </div>
                        <div class="col-4">
                            <br><b>Where</b><br><br>
                            <div class="my-auto">
                                <b>OrderId: </b> {{ myOrderId }} <br>
                                <b>Date Deliver: </b> {{ dateDeliver }} <br>
                                <b>Total Payment: </b>&#8369;{{ totalPriceOrders }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table border my-sm-3">
                                <table class="table border">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center" v-for="or in invoice">
                                            <td><img :src="'/finalhci/Backend/upload/' + or.productImage" width="40" class="rounded" alt=""></td>
                                            <td>{{ or.productName }}</td>
                                            <td>{{ or.quantity }}</td>
                                            <td>{{ or.price }}</td>
                                            <td>{{ or.status == 1 ? 'Approved' : or.status == 2 ? 'Declined' : 'Pending'}}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm text-active mx-1" @click="changeStatusApprove( or.myOrderId)">Approve</button>
                                                <button type="button" class="btn btn-sm text-inactive mx-1" @click="changeStatusDecline( or.myOrderId)">Decline</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include('../Assets/Admin/footer.php'); ?>
