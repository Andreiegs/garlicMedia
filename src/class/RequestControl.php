<?php 

class RequestControl extends Request {

    // public function updateAcc($params) {
    //     $this->updateRequest($params);
    // }

    public function insertAcc($params) {
        $this->insertRequest($params);
    }

    public function deleteAcc($params) {
        $this->deleteRequest($params);
    }
}

?>