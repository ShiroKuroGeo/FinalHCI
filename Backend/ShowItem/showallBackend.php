<?php
include('../database.php');
class showallBackend{

    public function doGetProduct(){
        return $this->getProduct();
    }
    public function doGetAllProduct(){
        return $this->getAllProduct();
    }
    public function doGetAllActiveProduct(){
        return $this->getAllActiveProduct();
    }
    public function doGetAllDeactiveProduct(){
        return $this->getAllDeactiveProduct();
    }
    

    private function getAllActiveProduct(){
        try {
            $con = new database();
            if($con->getStatus()){
                $query = $con->getCon()->prepare($this->getActiveProductQuery());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }

    private function getAllProduct(){
        try {
            $con = new database();
            if($con->getStatus()){
                $query = $con->getCon()->prepare($this->getAllProductQuery());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }

    private function getAllDeactiveProduct(){
        try {
            $con = new database();
            if($con->getStatus()){
                $query = $con->getCon()->prepare($this->getDeactiveProductQuery());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }

    private function getProduct(){
        try {
            $con = new database();
            if($con->getStatus()){
                $query = $con->getCon()->prepare($this->getProductQuery());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getProductQuery(){
        return "SELECT * FROM `tblproduct`";
    }
    private function getActiveProductQuery(){
        return "SELECT * FROM `tblproduct` WHERE status = 1";
    }
    private function getDeactiveProductQuery(){
        return "SELECT * FROM `tblproduct` WHERE status = 0";
    }
    private function getAllProductQuery(){
        return "SELECT * FROM `tblproduct`";
    }

}
?>