<?php
session_start();
include('showallBackend.php');
if (isset($_POST['Choice'])) {
    switch ($_POST['Choice']) {
        case 'doGetProduct':
            $back = new showallBackend();
            echo $back->doGetProduct();
            break;
        case 'doGetAllProduct':
            $back = new showallBackend();
            echo $back->doGetAllProduct();
            break;
        case 'doGetAllActiveProduct':
            $back = new showallBackend();
            echo $back->doGetAllActiveProduct();
            break;
        case 'doGetAllDeactiveProduct':
            $back = new showallBackend();
            echo $back->doGetAllDeactiveProduct();
            break;
        default:
            echo "default";
            break;
    }
}
?>