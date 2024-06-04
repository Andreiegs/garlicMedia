<?php 
    require '../class/itemView.php';
    require '../class/itemControl.php';

    $item = new itemControl();
    $itemView = new itemView();

    if (isset($_POST["get"])) {
        echo json_encode($itemView->getAllItem());
    }

?>