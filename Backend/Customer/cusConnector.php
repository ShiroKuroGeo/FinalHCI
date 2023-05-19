<?php
session_start();
require("cusBackend.php");

$method = $_POST['METHOD'];
if(function_exists($method)){
    call_user_func($method);
}else{
    echo "Function not Exist";
}

function doGetMyOrders(){
    $back = new cusBackend();
    echo $back->doGetMyOrders($_SESSION['userId']);
}

function doBuyProduct(){
    $back = new cusBackend();
    echo $back->doBuyProduct($_SESSION['userId'],$_POST['address'],$_POST['productId']);
}

function doAddressId(){
    $back = new cusBackend();
    echo $back->doAddressId($_SESSION['userId'], $_POST['PostalCode'], $_POST['City'], $_POST['Province'], $_POST['Street']);
}

function showAddress(){
    $back = new cusBackend();
    echo $back->showAddress($_SESSION['userId']);
}

function feedback(){
    $back = new cusBackend();
    echo $back->feedback($_SESSION['userId'], $_POST['comment'], $_POST['rating']);
}

function doDelivery(){
    $back = new cusBackend();
    echo $back->doDelivery($_SESSION['userId'], $_POST['myorderId'], $_POST['dateDelivery']);
}

function doAddToCart(){
    $back = new cusBackend();
    echo $back->doAddToCart($_SESSION['userId'], $_POST['productId']);
}

function DoGetBestProduct(){
    $back = new cusBackend();
    echo $back->DoGetBestProduct();
}

function doGetMyCart(){
    $back = new cusBackend();
    echo $back->doGetMyCart($_SESSION['userId']);
}

function doGetProductId(){
    $back = new cusBackend();
    echo $back->doGetProductId($_POST['productId']);
}


function doUpdateProduct(){
    $back = new cusBackend();
    echo $back->doUpdateProduct($_POST['quantity'], $_POST['productId']);
}

function doDeleteProduct(){
    $back = new cusBackend();
    echo $back->doDeleteProduct($_POST['productId']);
}

function doGetAllInformation(){
    $back = new cusBackend();
    echo $back->doGetAllInformation($_SESSION['userId']);
}

function doGetQandP(){
    $back = new cusBackend();
    echo $back->doGetQandP($_SESSION['userId']);
}

function doCountAllMyOrder(){
    $back = new cusBackend();
    echo $back->doCountAllMyOrder($_SESSION['userId']);
}

function doGetProduct(){
    $back = new cusBackend();
    echo $back->doGetProduct();
}

function doaddproductFromCart(){
    $back = new cusBackend();
    echo $back->doaddproductFromCart($_SESSION['userId'], $_POST['address'], $_POST['product'], $_POST['quantity']);
}

function doGetProductFromCartId(){
    $back = new cusBackend();
    echo $back->doGetProductFromCartId($_POST['productId']);
}

function doDeleteCart(){
    $back = new cusBackend();
    echo $back->doDeleteCart($_POST['cartId']);
}

function doChangeProfile(){
    $back = new cusBackend();

    $location = "../profilePicture/";
    $profile = '';
    if(isset($_FILES['file']['name'])){
        
        $finalfile = $location . $_FILES["file"]['name'];
        if(move_uploaded_file($_FILES['file']['tmp_name'],$finalfile))
        {
            $profile = $_FILES["file"]['name'];
        }

    }

    echo $back->doChangeProfile($profile,$_SESSION['userId']);
}