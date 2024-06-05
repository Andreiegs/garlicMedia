<?php 

    include 'dbh.php';
    
    class Request extends dbh {

        protected function getAllRequests() {
            $sql = "SELECT *
            FROM request JOIN item on request.item_id = item.id";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute();

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function getAllRequestsAdmin() {
            $sql = "SELECT request.id as request_id, item.img_path, item.name, item.price, request.quantity, request.status
            FROM request JOIN item on request.item_id = item.id";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute();

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function getCart($id) {
            $sql = "SELECT request.id, item.img_path, item.name, item.price
            FROM request 
            JOIN item
            ON request.item_id = item.id
            WHERE account_id = $id && status = 'In cart'";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute();

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function getOrders($id) {
            $sql = "SELECT request.id, item.img_path, item.name, item.price, request.quantity, request.status
            FROM request 
            JOIN item
            ON request.item_id = item.id
            WHERE account_id = $id";
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

        protected function updateStatus($params) {
            $sql = "UPDATE request SET status = ?
                WHERE id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);

            return $stat;
        }

        protected function insertRequest($params) {
            $requests = $this->getAllRequests();
            
            $sql = "INSERT INTO request (account_id, item_id, quantity, amount, status)
                    VALUES (?, ?, ?, ?, 'In cart')";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);
        }

        protected function deleteRequest($id) {
            $sql = "DELETE FROM request WHERE id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($id);
        }

    }
?>