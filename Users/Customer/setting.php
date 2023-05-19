<?php
    include('../Assets/Customer/header.php');
?>
<style>
    .account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}
.panel-shadow {
        box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
    }
.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
</style>
<div id="settingsApp">
    <div class="container panel-shadow my-5 border" v-for="ins in usersInformation">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings rounded">
                            <form class="user-profile" @submit="changeProfile">
                                <div class="user-avatar">
                                    <img :src="'../../Backend/profilePicture/' + ins.profileImage" class="border border-1 border-dark" onclick="document.getElementById('image').click();" style="cursor: pointer;">
                                    <input type="file" class="visually-hidden" name="file" id="image">
                                </div>
                                <h5 class="user-name">{{ ins.fullname }}</h5>
                                <h6 class="user-email">{{ ins.email }}</h6>
                                <div class="mt-2">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fa fa-fw fa-camera me-2"></i>
                                        <span>Change Photo</span>
                                    </button>
                                </div>
                                <div class="dropdown mt-5">
                                    <a class="text-decoration-none dropdown-toggle" type="button" id="AddressDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        View Addresses
                                    </a>
                                    <ul class="dropdown-menu" >
                                        <li v-for="adrs in address" class="text-center fst-italic">
                                            <span>{{ adrs.barangay }}, </span>
                                            <span>{{ adrs.province }}</span><br>
                                            <span>{{ adrs.city }}, </span>
                                            <span>{{ adrs.postalCode }}</span>
                                            <hr class="dropdown-divider">
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" :placeholder="ins.fullname">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Username</label>
                                <input type="text" class="form-control" id="eMail" disabled :placeholder="ins.username">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" :placeholder="ins.phoneNumber">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Email Address</label>
                                <input type="email" class="form-control" id="website" :placeholder="ins.email">
                            </div>
                        </div>
                    </div>
                    
                    <form @submit="addAddress">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Street">Street</label>
                                    <input type="name" class="form-control" v-model="Street" id="Street" placeholder="Enter Street">
                                </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">City</label>
                                        <input type="name" class="form-control" v-model="City" id="City" placeholder="Enter City">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="sTate">State</label>
                                        <input type="text" class="form-control" v-model="Province" id="Province" placeholder="Enter Province">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="zIp">Zip Code</label>
                                        <input type="text" class="form-control" v-model="PostalCode" id="PostalCode" placeholder="Zip Code">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 col-12">
                                    <div class="form-group float-end">
                                        <button type="submit" class="btn btn-sm btn-primary">Set Address</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row gutters my-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-end">
                            <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-sm px-4 me-2 btn-secondary">Cancel</button>
                                <button type="button" id="submit" name="submit" class="btn btn-sm px-4 btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    include('../Assets/Customer/footer.php');
?>