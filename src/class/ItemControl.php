<?php 

class ItemControl extends Item {

    // public function updateAcc($params) {
    //     $this->updateItem($params);
    // }

    public function insertAcc($params) {
        $this->insertItem($params);
    }

    public function deleteAcc($params) {
        $this->deleteItem($params);
    }
}

?>