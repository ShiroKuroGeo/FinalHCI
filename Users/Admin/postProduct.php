<?php include('../Assets/Admin/header.php'); ?>

<div class="col-10 vh-100 h-sm-100 container overflow-auto" id="postProduct">
    <section class="content-header">
        <div class="content-header my-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0 fw-bold text-sec">Products</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb my-auto">
                            <li class="breadcrumb-item"><a href="dashboard.php" class="text-decoration-none text-sec">Home</a></li>
                            <li class="breadcrumb-item active text-sec" aria-current="page">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="row overflow-auto vh-100">
        <div class="col-md-3">
            <a href="addProduct.php" id="addProduct"><button class="btn btn-uph-save col-12 btn-block mb-3">Add Products</button></a>

            <div class="card panel-shadow bg-uph">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title text-card">List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-card" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item active px-3 py-2 d-flex justify-content-between">
                            <div class="icons text-card">
                                <i class="fa-solid fa-boxes-stacked" style="color: #219EBC"></i>
                                All Product: 
                            </div>
                            <span class="text-card">{{ productLength }}</span>
                        </li>
                        <li class="nav-item active px-3 py-2 d-flex justify-content-between">
                            <div class="icons text-card">
                                <i class="fa-solid fa-dollar-sign" style="color: #219EBC"></i>
                                Products Active:
                            </div> 
                            <span id="activeProduct" class="p-1 text-card"></span>
                        </li>
                        <li class="nav-item active px-3 py-2 d-flex justify-content-between">
                            <div class="icons text-card">
                                <i class="fa-solid fa-circle-check" style="color: #219EBC"></i>
                                Sold Out: 
                            </div>
                            <span id="DeactiveProduct" class="p-1 text-card"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary card-outline text-sec">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title text-sec fw-bold">Products</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search Products" id="searchInput">
                            <i class="fas fa-search py-2 px-2"></i>
                            <button type="button" class="btn px-3" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-3" style="height: 300px; overflow: auto;">
                    <div class="mailbox-messages">
                        <div class="productsData">
                            <ul class="list-group" id="myList"  v-for="pro in products">
                                <li class="list-group-item mt-1 text-sec">
                                    <div class="row">
                                        <div class="col-2">
                                            <img :src="'/finalHCI/Backend/upload/' + pro.productImage" :alt="productName" width="100" height="100"/>
                                        </div>
                                        <div class="col-3">
                                            <div class="text-sec"><b>Product Name:</b>  {{ pro.productName }}<br></div> 
                                            <div class="text-sec"><b>Quantity:</b>  {{ pro.quantity }}<br></div> 
                                            <div class="text-sec"><b>Category:</b>  {{ pro.category }}<br></div> 
                                            <div class="text-sec"><b>Price:</b> {{ pro.price }}<br></div> 
                                        </div>
                                        <div class="col-3">
                                            <div><b>Status:</b> <small :class="pro.status == 1 ? 'text-active p-1 rounded' : 'text-inactive p-1 rounded'">{{ pro.status == 1 ? 'Active' : 'Sold Out' }}</small><br></div>
                                        </div>
                                        <div class="col-3">
                                            <button @click="doDeleteProduct(pro.productId)" class="float-end btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-regular fa-trash-can" style="color: #219EBC"></i></button>
                                            <button @click="updateProduct(pro.productId)" class="float-end btn"><i class="fa-solid fa-pen-to-square" style="color: #219EBC"></i></button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr class="border border-2 border-dark">
                        </div>
                    </div>
                </div>
                <div class="card-footer px-3">
                </div>
            </div>
        </div>
        <footer class="row bg-light py-4 mt-auto">
            <div class="col"> Footer content here... </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit="addProduct" id="resetAddForm">
                            <input type="file" name="file" class="form-control" required>
                            <input type="text" class="form-control form-control-sm w-100" name="addProductName" id="addProductName" placeholder="Add Product Name" required>
                            <input type="text" class="form-control form-control-sm w-100" name="addCategory" id="addCategory" placeholder="Category" required>
                            <input type="text" class="form-control form-control-sm w-100" name="addSize" id="addSize" placeholder="Size" required>
                            <input type="number" class="form-control form-control-sm w-100" name="addProductQuantity" id="addProductQuantity" placeholder="Add Product Quantity" required>
                            <input type="number" class="form-control form-control-sm w-100" name="addProductPrice" id="addProductPrice" placeholder="Add Product Price" required>
                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update Status -->
        <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit="updateProduct">
                            <select name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-dismiss="modal" aria-label="Close" >Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include('../Assets/Admin/footer.php'); ?>