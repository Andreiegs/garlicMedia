<?php 

include_once 'Request.php';


class RequestControl extends Request {

    // public function updateAcc($params) {
    //     $this->updateRequest($params);
    // }

    public function insertReq($params) {
        $this->insertRequest($params);
    }

    public function deleteReq($params) {
        $this->deleteRequest($params);
    }
}

?>