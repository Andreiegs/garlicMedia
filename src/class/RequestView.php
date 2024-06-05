<?php 

include_once 'Request.php';

    class RequestView extends Request {

        public function getAllReqs() {
            return $this->getAllRequests();
        }

        public function getAllReqsAdmin() {
            return $this->getAllRequestsAdmin();
        }

        public function getAccByCode($countryCode) {
            return $this->getRequestByID($countryCode);
        }

        public function getCartItems($id) {
            return $this->getCart($id);
        }

        public function getOrderss($id) {
            return $this->getOrders($id);
        }
    }

?>