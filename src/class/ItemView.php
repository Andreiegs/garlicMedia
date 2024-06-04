<?php 

    include_once 'Item.php';

    class ItemView extends Item {

        public function getAllItem() {
            return $this->getAllItems();
        }

        public function getAccByCode($countryCode) {
            return $this->getItemByID($countryCode);
        }
    }

?>