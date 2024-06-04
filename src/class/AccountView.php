<?php 
    include_once 'Account.php';

    class AccountView extends Account {

        public function getAllAccs() {
            return $this->getAllAccounts();
        }

        public function getAccByCode($countryCode) {
            return $this->getAccountByID($countryCode);
        }
    }

?>