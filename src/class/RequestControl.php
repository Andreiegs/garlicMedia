<?php 

include_once 'Request.php';


class RequestControl extends Request {

    public function updateStat($params) {
        $this->updateStatus($params);
    }

    public function insertReq($params) {
        $this->insertRequest($params);
    }

    public function deleteReq($params) {
        $this->deleteRequest($params);
    }
}

?>