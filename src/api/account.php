<?php 
    require '../class/AccountView.php';
    require '../class/AccountControl.php';
    
    $acc = new AccountControl();
    $accView = new AccountView();

    if (isset($_POST["insertParams"])) {
        $params = $_POST["insertParams"];
        echo $acc->insertAcc($params);
    }

    if (isset($_POST["log"])) {
        $params = $_POST["log"];
        echo json_encode($accView->logAcc($params));
    }

?>