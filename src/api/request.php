<?php 
    require '../class/requestView.php';
    require '../class/requestControl.php';

    $request = new requestControl();
    $requestView = new requestView();

    if (isset($_POST["insert"])) {
        echo json_encode($request->insertReq($_POST['insert']));
    }

    if (isset($_POST["delete"])) {
        echo json_encode($request->deleteReq($_POST['delete']));
    }

?>