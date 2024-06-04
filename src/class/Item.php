<?php 

    include 'dbh.php';
    
    class Item extends dbh {

        protected function getAllItems() {
            $sql = "SELECT *
            FROM item";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute();

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function getItemByID($id) {
            $sql = "SELECT *
            FROM item WHERE id LIKE ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$id]);

            $counts = $stmt->fetchAll();

            return $counts;
        }

        // protected function updateCount($params) {
        //     $sql = "UPDATE item SET Name = ?, Continent = ?,
        //      SurfaceArea = ?, Population = ?, GovernmentForm = ?
        //         WHERE Code = ?";
        //     $stmt = $this->conn()->prepare($sql);
        //     $stat = $stmt->execute($params);
        // }

        protected function insertItem($params) {
            $items = $this->getAllItems();
            
            $sql = "INSERT INTO item (name, description, price, img_path)
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);
        }

        protected function deleteItem($id) {
            $sql = "DELETE FROM item WHERE id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute([$id]);
        }

    }
?>