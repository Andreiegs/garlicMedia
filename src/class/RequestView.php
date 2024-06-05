<?php 

include_once 'Request.php';

    class RequestView extends Request {

        public function getAllReqs() {
            return $this->getAllRequests();
        }

        public function getAccByCode($countryCode) {
            return $this->getRequestByID($countryCode);
        }

        public function getCartItems($id) {
            return $this->getCart($id);
        }
    }

?>