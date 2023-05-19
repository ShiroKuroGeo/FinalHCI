<?php include('../Assets/Admin/header.php'); ?>
<div class="col-10 vh-100 h-sm-100 container overflow-auto" id="recommendation">
    <main class="row vh-100">
        <div class="container d-flex justify-content-center">
            <div class="col-md-9 my-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-sec fw-bold">Read Mail</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body px-5" v-for="rec in recommendationId">
                        <div class="mailbox-read-info text-sec">
                            <h5>Message Subject Is Placed Here</h5>
                            <h6>From: {{ rec.recomEmail }}
                            <span class="mailbox-read-time float-right text-sec ">on {{ rec.recomDate }}</span></h6>
                        </div>
                        <div class="mailbox-read-message px-3 text-sec">
                            <p>Hello Villarubia Upholstery Shop,</p>

                            <p>{{ rec.recomMessage }}</p>

                            <p>Thanks,<br>{{ rec.recomName }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include('../Assets/Admin/footer.php'); ?>