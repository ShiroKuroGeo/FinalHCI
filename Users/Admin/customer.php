<?php include('../Assets/Admin/header.php'); ?>
<div class="col-10 vh-100 h-sm-100 container overflow-auto" id="customerSide">
    <main class="row overflow-auto vh-100">
    <section class="content-header">
        <div class="content-header my-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 fw-bold text-sec">Users/Member</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb my-auto">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-sec">Home</a></li>
                            <li class="breadcrumb-item active text-sec" aria-current="page">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title text-sec fw-bold">Users Table</h3>
                    <div class="col-4">
                        <div class="col-3 input-group input-group-sm">
                            <input type="text" name="searchData" id="searchFromTable" class="form-control" placeholder="Search Name">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap" id="myTable">
                        <thead class="bg-light border" style="position: sticky; top: 0;">
                            <tr>
                                <th width="5%">Picture</th>
                                <th width="5%">Customer Name</th>
                                <th width="5%">Email</th>
                                <th width="5%">Phone Number</th>
                                <th width="5%">Status</th>
                                <th width="5%">Date Created</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="cus in customer">
                                <td><img width="40" height="40" :src="'/finalHCI/Backend/profilePicture/' + cus.profileImage" alt="..."  /></td>
                                <td>{{ cus.fullname }}</td>
                                <td>{{ cus.email }}</td>
                                <td>{{ cus.phoneNumber }}</td>
                                <td>
                                    <div :class="cus.status == 1 ? 'text-active rounded text-center' : 'text-inactive rounded text-center'">{{ cus.status == 1 ? "Active" : "Inactive" }}</div>
                                </td>
                                <td>{{ cus.dateCreated }}</td>
                                <td>
                                    <button @click="updateUser(cus.userId, cus.status)" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#updateProductModal"><i class="fa-solid fa-pen-to-square" style="color: #219EBC"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>
<?php include('../Assets/Admin/footer.php'); ?>