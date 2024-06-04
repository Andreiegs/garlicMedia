<?php 
    require '../class/AccountView.php';
    require '../class/AccountControl.php';

    $acc = new AccountControl();
    $accview = new AccountView();

    if (isset($_POST["insertParams"])) {
        $params = $_POST["insertParams"];
        echo $acc->insertAcc($params);
    }

    // if (isset($_POST["accountByNameParams"])) {
    //     $params = $_POST["accountByNameParams"];
    //     echo json_encode($view->getAccByID($params));
    // }

?>