<?php 

include_once 'Request.php';

    class RequestView extends Request {

        public function getAllAccs() {
            return $this->getAllRequests();
        }

        public function getAccByCode($countryCode) {
            return $this->getRequestByID($countryCode);
        }
    }

?>