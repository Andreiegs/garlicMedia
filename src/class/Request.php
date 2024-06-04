<?php 

    include 'dbh.php';
    
    class Request extends dbh {

        protected function getAllRequests() {
            $sql = "SELECT *
            FROM request";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute();

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function getRequestByID($id) {
            $sql = "SELECT *
            FROM request WHERE id LIKE ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$id]);

            $counts = $stmt->fetchAll();

            return $counts;
        }

        // protected function updateCount($params) {
        //     $sql = "UPDATE request SET Name = ?, Continent = ?,
        //      SurfaceArea = ?, Population = ?, GovernmentForm = ?
        //         WHERE Code = ?";
        //     $stmt = $this->conn()->prepare($sql);
        //     $stat = $stmt->execute($params);
        // }

        protected function insertRequest($params) {
            $requests = $this->getAllRequests();
            
            $sql = "INSERT INTO request (account_id, item_id, quantity, amount)
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);
        }

        protected function deleteRequest($id) {
            $sql = "DELETE FROM request WHERE id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute([$id]);
        }

    }
?>