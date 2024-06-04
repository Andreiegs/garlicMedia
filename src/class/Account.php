<?php 

    include 'dbh.php';
    
    class World extends dbh {

        protected function getAllCounts() {
            $sql = "SELECT Code, Name, Continent, SurfaceArea, Population, GovernmentForm
            FROM country ORDER BY Name ASC";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute();

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function searchCount($name) {
            $sql = "SELECT Code, Name, Continent, SurfaceArea, Population, GovernmentForm
            FROM country WHERE Name LIKE ? ORDER BY Name ASC";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute(["%$name%"]);

            $counts = $stmt->fetchAll();

            return $counts;
        }

        protected function getCountryByID($code) {
            $sql = "SELECT Code, Name, Continent, SurfaceArea, Population, GovernmentForm FROM 
            country WHERE Code = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$code]);

            $count = $stmt->fetch();

            return $count;
        }

        protected function updateCount($params) {
            $sql = "UPDATE country SET Name = ?, Continent = ?,
             SurfaceArea = ?, Population = ?, GovernmentForm = ?
                WHERE Code = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);
        }

        protected function insertCount($params) {
            $name = $params[0];
            $nameArray = str_split(strtoupper($name));
            $code = $nameArray[0] . $nameArray[1] . $nameArray[2];

            $countries = $this->getAllCounts();

            $iter3 = 2;
            $iter2 = 1;
            while (codeExists($code, $countries)) {
                $code = $nameArray[0] . $nameArray[$iter2] . $nameArray[$iter3];
                if ($iter3 + 1 >= count($nameArray)) {
                    $iter3 = 2;
                    $iter2++;
                }
                $iter3++;
            }


            array_unshift($params, $code);
            
            $sql = "INSERT INTO country (Code, Name, Continent, SurfaceArea, Population, GovernmentForm)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute($params);
        }

        protected function deleteCount($params) {
            $sql = "DELETE FROM country WHERE Code = ?";
            $stmt = $this->conn()->prepare($sql);
            $stat = $stmt->execute([$params]);
        }

    }

    function codeExists($code, $countries) {
        foreach ($countries as $country) {
            if ($code == $country["Code"]) {
                return true; 
            }
        }
        return false;
    }

?>