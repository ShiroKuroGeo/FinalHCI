<?php
session_start();
require("admBackend.php");

$method = $_POST['METHOD'];
if(function_exists($method)){
    call_user_func($method);
}else{
    echo "Function not Exist";
}

function doInsertProduct(){
    $back = new admBackend();

    $location = "../upload/";
    $filename = '';
    if(isset($_FILES['file']['name'])){
        
        $finalfile = $location . $_FILES["file"]['name'];
        if(move_uploaded_file($_FILES['file']['tmp_name'],$finalfile))
        {
            $filename = $_FILES["file"]['name'];
        }

    }

    echo $back->doInsertProduct($_POST['addProductName'],$_POST['productDescr'],$_POST['addProductQuantity'], $_POST['addCategory'], $_POST['addProductPrice'], $filename, $_POST['addSize']);
}

function doChangeStatus(){
    $back = new admBackend();
    echo $back->doChangeStatus($_POST['status'], $_POST['productId']);
}

function doDeleteProduct(){
    $back = new admBackend();
    echo $back->doDeleteProduct($_POST['productId']);
}

function doGetProduct(){
    $back = new admBackend();
    echo $back->doGetProduct();
}

function doGetRecommendation(){
    $back = new admBackend();
    echo $back->doGetRecommendation();
}

function doGetRecommendationId(){
    $back = new admBackend();
    echo $back->doGetRecommendationId($_POST['recomId']);
}

function doGetProductAdmin(){
    $back = new admBackend();
    echo $back->doGetProductAdmin();
}

function getProductId(){
    $back = new admBackend();
    echo $back->doGetProductId($_POST['productId']);
}

function doGetCustomer(){
    $back = new admBackend();
    echo $back->doGetCustomer();
}

function doGetAllOrder(){
    $back = new admBackend();
    echo $back->doGetAllOrder();
}

function doGetInvoice(){
    $back = new admBackend();
    echo $back->doGetInvoice($_POST['invoiceId']);
}

function doUpdateInvoiceStatus(){
    $back = new admBackend();
    echo $back->doUpdateInvoiceStatus($_POST['status'],$_POST['invoiceId']);
}

function doUpdateCustomer(){
    $back = new admBackend();
    echo $back->doUpdateCustomer($_POST['status'],$_POST['userId']);
}

?>