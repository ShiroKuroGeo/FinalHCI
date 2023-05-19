<?php
    include('../Assets/Customer/header.php');
?>
<section class="vh-100" id="myOrders">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="my-5">
            <div class="col-2 panel-shadow">
                <div class="card h-100">
                    <div class="card-body p-3 ">
                        <div class="fw-bold py-3">
                            Total Orders: {{ countMyOrder }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table table-responsive border panel-shadow rounded" style="overflow-y: auto; height: 300px;">
            <table class="table table-responsive table-borderless">
                <thead class="text-link" style="position: sticky; top: 0;">
                    <tr class="bg-uph">
                        <th scope="col" class="text-center">Order Id</th>
                        <th scope="col">Purchased</th>
                        <th scope="col">Date Ordered</th>
                        <th scope="col">Date Deliver</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col"><span>Revenue</span></th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr v-for="myor in myOrders" :class="myor.status == 3 ? 'text-pending2' : myor.status == 1 ? 'text-active2' : 'text-inactive2' ">
                        <th scope="col" class="text-center" width="5%">{{ myor.myOrderId }}</th>
                        <th scope="col" class="text-center" width="5%">{{ myor.productName }}</th>
                        <th scope="col" class="text-center" width="5%">{{ myor.dateOrdered }}</th>
                        <th scope="col" class="text-center" width="5%">{{ myor.dateDeliver }}</th>
                        <th scope="col" class="text-center" width="5%">{{ myor.quantity }}</th>
                        <th scope="col" class="text-center" width="5%">{{ myor.price}}</th>
                        <th scope="col" class="text-center" width="5%">{{ myor.price * myor.quantity }}</th>
                        <th scope="col" class="text-center" width="5%" >
                            <div :class="myor.status == 3 ? 'text-pending rounded text-center col-9' : myor.status == 1 ? 'text-active rounded text-center col-9' : 'text-inactive rounded text-center col-9'">{{ myor.status == 3 ? 'Pending' : myor.status == 1 ? 'Approve' : 'Decline' }}</div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php
    include('../Assets/Customer/footer.php');
?>