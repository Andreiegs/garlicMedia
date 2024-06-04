<?php 
    include_once 'Account.php';

    class AccountView extends Account {

        public function getAllAccs() {
            return $this->getAllAccounts();
        }

        public function getAccByCode($id) {
            return $this->getAccountByID($id);
        }

        public function logAcc($id) {
            return $this->logAccount($id);
        }
    }

?>