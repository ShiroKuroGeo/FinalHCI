<?php
    include('../Assets/Customer/header.php');
?>
<style>
    .img-cart {
        display: block;
        max-width: 90px;
        height: 80px;
        margin-left: auto;
        margin-right: auto;
    }
    table tr td{
        border:1px solid #FFFFFF;    
    }

    table tr th {
        background:#eee;    
    }

</style>
<section class="py-5 vh-76" id="customerMyCart">
<div class="container bootstrap snippets bootdey text-primary">
    <div class="content">
                <div class="title mb-3 text-center fw-bold">
                    Shopping Cart
                </div>
        <div class="row">
            <div class="col-9">
                <div class="panel panel-info panel-shadow border px-4" style="height: 439px;">
                    <div class="panel-heading my-2">
                        <h3>
                            <img class="img-circle img-thumbnail" src="/finalhci/Backend/profilePicture/<?php echo $_SESSION['profileImage']; ?>" width="100" height="100">
                            <?php echo $_SESSION['fullname']; ?>
                        </h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive" style="height: 275px;">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="cart in mycart">
                                        <td><img :src="'/finalhci/Backend/upload/' + cart.productImage" class="object-fit-cover rounded" width="55" height="55"></td>
                                        <td><strong>{{cart.productName}}</strong><p>Size : {{ cart.size }}</p></td>
                                        <td>
                                        <form class="input-group input-group-sm">
                                            <button type="button" @click="sutractUpdateProductCart(cart.productId,cart.quantity)" class="btn btn-default"><i class="fa fa-minus"></i></button>
                                            <input type="text" @keyup="updateProductCart(cart.productId,cart.quantity)" class="form-control" :id="cart.quantity" name="quantity" width="12" :value="cart.quantity">
                                            <button type="button" @click="addUpdateProductCart(cart.productId,cart.quantity)" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                        </form>
                                        </td>
                                        <td>P{{cart.price}}</td>
                                        <td>P{{cart.price * cart.quantity}}</td>
                                        <td class="d-flex justify-content-between">
                                            <button @click="getProductIds(cart.productId)" class="btn btn-info btn-sm col-5" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#buyProduct">Buy</button>
                                            <button @click="deleteProductCart(cart.tblcart)" class="btn btn-danger btn-sm col-5">Delete</button>
                                        </td>
                                            <div class="modal" id="buyProduct">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Invoice</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="container" v-for="pro in selectProduct">
                                                                <form @submit="buyProduct(pro.productId)">
                                                                    <img :src="'/finalhci/Backend/upload/' + pro.productImage" class="object-fit-cover rounded" width="155" height="155"><br><br>
                                                                    <label class="fw-bold me-2"> Product Name : </label>{{ pro.productName }} <br>
                                                                    <label class="fw-bold me-2"> Product Price : </label>{{ pro.price }} <br>
                                                                    <label class="fw-bold me-2"> Product Quantity : </label>{{ pro.quantity }} <br>
                                                                    <div class="input-group">
                                                                        <label class="me-3 fw-bold">Select Address : </label>
                                                                        <select name="address" id="address" class="form-control form-control-sm rounded">
                                                                            <option v-for="add in address" :value="add.addressId">{{ add.barangay }}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="d-flex justify-content-center align-items-center my-3">
                                                                        <button type="submit" class="btn btn-info mx-3">Buys Product</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 align-self-end my-2">
                <div class="p-3 border panel-shadow">
                    <span class="d-flex justify-content-between my-3">
                        <div>Total Cart Product</div>
                        <div>P{{ totalValueQuantity }}</div>
                    </span>
                    <span class="d-flex justify-content-between my-3">
                        <div>Total Shipping</div>
                        <div>P{{ shipping }}</div>
                    </span>
                    <span class="d-flex justify-content-between my-3">
                        <div>Total</div>
                        <div>P{{ total }}</div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<?php include('../Assets/Customer/footer.php'); ?>