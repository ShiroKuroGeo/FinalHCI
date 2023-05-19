<?php
    include('../Assets/Customer/header.php');
?>
<section class="py-5 vh-60" id="customerLandingPage">
    <div class="container px-4 px-lg-5 mt-5" >
        <div class="row" v-for="pr in selectProduct">
            <div class="col-3 border p-3 text-center">
                <img :src="'/finalHCI/Backend/upload/' + pr.productImage" class="border" width="160" alt="">
            </div>
            <div class="col-9 border">
                <div class="col-10">
                <textarea name="comment" class="form-control" id="comment" cols="30" rows="10">

</textarea>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include('../Assets/Customer/footer.php');
?>