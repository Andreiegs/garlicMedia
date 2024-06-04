<?php 

    class DBH {

        private $host = "localhost";
        private $user = "AAP";
        private $pwd = "123456";
        private $dbName = "garlic_media";

        protected function conn() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        }
    }

?>