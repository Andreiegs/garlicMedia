<?php 

    class ItemView extends Item {

        public function getAllAccs() {
            return $this->getAllItems();
        }

        public function getAccByCode($countryCode) {
            return $this->getItemByID($countryCode);
        }
    }

?>