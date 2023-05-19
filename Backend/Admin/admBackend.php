<?php
include('../database.php');
include('queries.php');

class admBackend extends queries{
    public function doInsertProduct($productName, $productDescr, $Quantity, $category, $Price, $Image, $size){
        return $this->insertProduct($productName, $productDescr, $Quantity, $category, $Price, $Image, $size);
    }
    public function doChangeStatus($status,$productId){
        return $this->changeStatus($status,$productId);
    }
    public function doDeleteProduct($productId){
        return $this->deleteProduct($productId);
    }
    public function doGetProductId($productId){
        return $this->getProductId($productId);
    }
    public function doGetProduct(){
        return $this->getProduct();
    }
    public function doGetProductAdmin(){
        return $this->getProductAdmin();
    }
    public function doGetRecommendation(){
        return $this->getRecommendation();
    }
    public function doGetRecommendationId($recomId){
        return $this->getRecommendationId($recomId);
    }
    public function doGetInvoice($recomId){
        return $this->getInvoice($recomId);
    }
    public function doGetCustomer(){
        return $this->getCustomer();
    }
    public function doGetAllOrder(){
        return $this->getAllOrder();
    }
    public function doUpdateInvoiceStatus($stat,$id){
        return $this->updateInvoiceStatus($stat,$id);
    }
    public function doUpdateCustomer($stat,$id){
        return $this->updateCustomer($stat,$id);
    }

    private function insertProduct($productName, $productDescr, $Quantity, $category, $Price, $Image, $size){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doinsertProductQuery());
                $query->execute(array($Image, $productName, $productDescr, $Quantity, $category, $Price,$size, 1, date("Y-m-d"), date("Y-m-d")));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "SuccessfullyInserted";
                }else{
                    $con->closeConnection();
                    return "FailedToInsert";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }


    private function changeStatus($status,$productId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dochangeStatusQuery());
                $query->execute(array($status, $productId));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "SuccessfullyUpdated";
                }else{
                    $con->closeConnection();
                    return "FailedToInsert";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }

    private function getProductId($productId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetProductIdQuery());
                $query->execute(array($productId));
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
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetProductQuery());
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
    
    private function getProductAdmin(){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetProductAdminQuery());
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

    private function getRecommendation(){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetRecommendationQuery());
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

    private function getRecommendationId($recomId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetRecommendationIdQuery());
                $query->execute(array($recomId));
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

    private function getInvoice($invoiceId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetInvoiceQuery());
                $query->execute(array($invoiceId));
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
    
    private function deleteProduct($productId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dodeleteProductQuery());
                $query->execute(array($productId));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "SuccessfullyDeleteProduct";
                }else{
                    $con->closeConnection();
                    return "FailedToInsert";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }
    
    private function updateInvoiceStatus($stat,$id){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doupdateInvoiceQuery());
                $query->execute(array($stat,$id));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "SuccessfullyUpdateInvoiceStatus";
                }else{
                    $con->closeConnection();
                    return "FailedToUpdateInvoiceStatus";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }
    
    private function getCustomer(){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetCustomerQuery());
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
    
    private function updateCustomer($stat,$id){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doupdateCustomerQuery());
                $query->execute(array($stat,$id));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "SuccessfullyUpdated";
                }else{
                    $con->closeConnection();
                    return "FailedToUpdate";
                }
                
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOExeption $th) {
            return $th;
        }
    }
    
    private function getAllOrder(){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetOrderQuery());
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
}
?>