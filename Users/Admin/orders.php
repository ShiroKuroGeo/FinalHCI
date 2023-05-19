<?php include('../Assets/Admin/header.php'); ?>

<div class="col-10 vh-100 h-sm-100 container overflow-auto">
    <main class="row overflow-auto vh-100" id="orderMount">
        <section class="content-header">
            <div class="content-header my-4">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 fw-bold text-sec">Orders</h1>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb my-auto">
                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-sec">Home</a></li>
                                <li class="breadcrumb-item active text-sec" aria-current="page">Orders</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="card panel-shadow">
                        <div class="card col-12">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Sales</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                         <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Orders</h3>
                            <button type="button" class="btn px-3" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body px-3">
                            <div class="col-mg-9" style="height: 250px; overflow: auto;">
                                <div class="table-responsive" style="height: 250px;">
                                    <table class="table border">
                                        <thead>
                                            <tr>
                                                <th>Fullname</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="or in orders">
                                                <td>{{ or.fullname }}</td>
                                                <td>
                                                    <div :class="or.status == 1 ? 'text-active rounded text-center col-5' : or.status == 2 ? 'text-inactive rounded text-center col-5' : 'text-pending rounded text-center col-5' ">
                                                        {{ or.status == 1 ? 'Approved' : or.status == 2 ? 'Declined' : 'Pending' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <a :href="'invoice.php?invoice=' + or.userId">
                                                        <button type="button" class="btn btn-primary btn-sm">Invoice</button>
                                                    </a>
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
        </section>
    </main>
</div>
<?php include('../Assets/Admin/footer.php'); ?>