<?php 

    include 'dbh.php';
    
    class Account extends dbh {

        protected function getAllAccounts() {
            $sql = "SELECT *
            FROM account";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute();

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function getAccountByID($id) {
            $sql = "SELECT *
            FROM account WHERE id LIKE ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$id]);

            $counts = $stmt->fetchAll();

            return $counts;
        }

        // protected function updateCount($params) {
        //     $sql = "UPDATE account SET Name = ?, Continent = ?,
        //      SurfaceArea = ?, Population = ?, GovernmentForm = ?
        //         WHERE Code = ?";
        //     $stmt = $this->conn()->prepare($sql);
        //     $stat = $stmt->execute($params);
        // }

        protected function insertAccount($params) {
            $accounts = $this->getAllAccounts();
            
            $sql = "INSERT INTO account (first_name, last_name, address, contact_no)
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);
        }

        protected function deleteAccount($id) {
            $sql = "DELETE FROM account WHERE Code = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute([$id]);
        }

    }
?>