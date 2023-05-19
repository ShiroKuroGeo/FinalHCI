$(document).ready(function(){
    showBestProduct();
    showTopProduct();
    showAllProduct();
    getActiveProductToAdmin();
    getDeactiveProductToAdmin();

});

$('#alert').click(function(){
    alert("SAd");
});

function showBestProduct(){
    $.ajax({
        type: 'post',
        url: '/finalHCI/Backend/ShowItem/connector.php',
        data: {Choice: 'doGetProduct'},
        success:function(data){
            var json = JSON.parse(data);
            var str = "";
            json.forEach(element => {
                str += `
                <!-- <img class="card-img-top" src="/finalHCI/Assets/UpholsteryPic/largeSofa.png" alt="..." />-->
                Picture database comes here
            `;
            });
            $('#bestProducts').append(str);
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }  
    });
}

function showTopProduct(){
    $.ajax({
        type: 'post',
        url: '/finalHCI/Backend/ShowItem/connector.php',
        data: {Choice: 'doGetProduct'},
        success:function(data){
            var json = JSON.parse(data);
            var str = "";
            json.forEach(element => {
                str += `
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 mt-4 text-center">
                                <sup>Date Posted ${element.dateInserted}</sup>
                                <img class="card-img-top" src="/finalHCI/Assets/UpholsteryPic/largeSofa.png" alt="..." />
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="card-body p-3 ">
                            <div class="text-center">
                                <h5 class="fw-bolder">${element.productName}</h5>
                                $${element.price}
                            </div>
                        </div>
                        <div class="card-footer m-2 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#myModal">View options</a></div>
                        </div>
                    </div>
                </div>
            `;
            });
            $('#topProducts').append(str);
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }  
    });
}

//Admin Side
function showAllProduct(){
    $.ajax({
        type: 'post',
        url: '/finalHCI/Backend/ShowItem/connector.php',
        data: {Choice: 'doGetAllProduct'},
        success:function(data){
            var json = JSON.parse(data);
            var productLength = json.length;
            $('#allProductNumber').append(productLength);
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }  
    });
}

function getActiveProductToAdmin(){
    $.ajax({
        type: 'post',
        url: '/finalHCI/Backend/ShowItem/connector.php',
        data: {Choice: 'doGetAllActiveProduct'},
        success:function(data){
            var json = JSON.parse(data);
            var Active = json.length;
            $('#activeProduct').append(Active);
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }  
    });
}

function getDeactiveProductToAdmin(){
    $.ajax({
        type: 'post',
        url: '/finalHCI/Backend/ShowItem/connector.php',
        data: {Choice: 'doGetAllDeactiveProduct'},
        success:function(data){
            var json = JSON.parse(data);
            var Deactive = json.length;
            $('#DeactiveProduct').append(Deactive);
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }  
    });
}