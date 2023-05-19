<?php
session_start();

if (isset($_POST['Choice'])) {
    switch ($_POST['Choice']) {
        case 'Logout':
            session_unset();
            session_destroy();
            echo "Logout";
            break;
        default:
            echo "default";
            break;
    }
}

?>