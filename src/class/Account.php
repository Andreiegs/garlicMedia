<?php 
    session_start();

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

        protected function logAccount($params) {            
            $sql = "SELECT *
            FROM account WHERE email = ? && password = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute($params);

            $counts = $stmt->fetchAll();

            if($counts != false) {
                $_SESSION['student_id'] = $counts[0]['id'];    
                return true;
            }

            return false;
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
            
            $sql = "INSERT INTO account (first_name, last_name, email, password, address, contact_no)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);
        }

        protected function deleteAccount($id) {
            $sql = "DELETE FROM account WHERE id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute([$id]);
        }

    }
?>