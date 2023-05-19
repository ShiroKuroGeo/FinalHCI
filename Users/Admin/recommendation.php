<?php include('../Assets/Admin/header.php'); ?>
<style>
    .message {
        display: inline-block; 
        width: 526px;
    }

    .message {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .name{
        display: inline-block; 
        width: 109px;
    }
    .name{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="col-10 vh-100 h-sm-100 container overflow-auto" id="recommendation">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header my-4">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 fw-bold text-sec">Recommendation</h1>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb my-auto">
                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-sec">Home</a></li>
                                <li class="breadcrumb-item active text-sec" aria-current="page">Recommendation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="card panel-shadow">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title text-sec fw-bold">Folders</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="recommendation.php" class="nav-link d-flex justify-content-between">
                                        <div class="icons text-sec">
                                            <i class="fas fa-inbox"></i>
                                            Inbox
                                        </div>
                                        <span >{{ recom }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title text-sec fw-bold">Inbox</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body px-3">
                            <div class="table-responsive mailbox-messages" style="height: 300px; overflow: auto;">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr v-for="rec in recommendation" class="rounded">
                                            <td class="mailbox-name">
                                                <a class="text-decoration-none text-sec name" :href="'reviewRecom.php?recomId=' + rec.recomId">{{ rec.recomName }}</a>
                                            </td>
                                            <td class="mailbox-subject">
                                                <a class="text-decoration-none text-sec message" :href="'reviewRecom.php?recomId=' + rec.recomId">
                                                    <b class="name">{{ rec.recomEmail }}</b> - {{ rec.recomMessage }}
                                                </a>
                                            </td>
                                            <td class="h6"><small>{{ rec.recomDate }}</small></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include('../Assets/Admin/footer.php'); ?>