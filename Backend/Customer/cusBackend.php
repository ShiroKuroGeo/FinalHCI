<?php
include('../database.php');
include('queries.php');

class cusBackend extends queries{

    public function doBuyProduct($userId,$address,$productId){
        return $this->buyProduct($userId,$address,$productId);
    }
    public function doAddressId($userId, $postalCode, $cit, $province, $barangay){
        return $this->addressId($userId, $postalCode, $cit, $province, $barangay);
    }
    public function doFeedback($userId, $comment, $rating){
        return $this->feedback($userId, $comment, $rating);
    }
    public function doDelivery($userId, $myorderId, $dateDelivery){
        return $this->delivery($userId, $myorderId, $dateDelivery);
    }
    public function doAddToCart($userId,$productId){
        return $this->addToCart($userId,$productId);
    }
    public function doGetMyCart($userId){
        return $this->getMyCart($userId);
    }
    public function doGetQandP($userId){
        return $this->getMultiplyQandP($userId);
    }
    public function doGetProduct(){
        return $this->getProduct();
    }    
    public function doGetProductFromCartId($productId){
        return $this->getProductFromCartId($productId);
    }
    public function doCountAllMyOrder($productId){
        return $this->countAllMyOrder($productId);
    }
    public function showAddress($userId){
        return $this->address($userId);
    }
    public function doDeleteCart($cartId){
        return $this->deleteCart($cartId);
    }
    
    //Ongoing
    public function DoGetBestProduct(){
        return $this->bestProduct();
    }
    public function doUpdateProduct($quantity, $productId){
        return $this->updateProductId($quantity, $productId);
    }
    public function doGetProductId($productId){
        return $this->getProductId($productId);
    }
    public function doDeleteProduct($productId){
        return $this->deleteProduct($productId);
    }
    public function doGetMyOrders($userId){
        return $this->myOrder($userId);
    }
    public function doChangeProfile($profileImage, $id){
        return $this->changeProfile($profileImage, $id);
    }
    public function doGetAllInformation($userId){
        return $this->getAllInformation($userId);
    }

    private function changeProfile($profileImage, $id){
        try{
            $con = new database();
            if ($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dochangeProfileQuery());
                $query->execute(array($profileImage, $id));
                $result = $query->fetch();
                if (!$result) {
                    $con->closeConnection();
                    return "registerSuccessfully";
                }else{
                    $con->closeConnection();
                    return "failedToRegister";
                }
            }else{
                $db->closeConnection();
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    
    private function myOrder($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetMyOrderQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    
    private function getAllInformation($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetAllInformationQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function addToCart($userId, $productId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doaddToCartQuery());
                $query->execute(array($userId, $productId, 1, date("Y/m/d"), date("Y/m/d")));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "successfullyAddingCart";
                }else{
                    $con->closeConnection();
                    return "failedAddingCart";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    
    private function address($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doaddressQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function buyProduct($userId,$address,$productId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $date7 = new DateTime();
                $date7->add(new DateInterval('P7D'));
                $deliverDate = $date7->format('Y-m-d');
                $query = $con->getCon()->prepare("INSERT INTO `myorder`(`userId`, `addressId`, `productId`,`quantity`, `status`, `dateOrdered`, `dateDeliver`) VALUES (?,?,?,?,?,?,?)");
                $query->execute(array($userId, $address, $productId,1, 3, date('Y-m-d'), $deliverDate));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "successfullyInserted";
                }else{
                    $con->closeConnection();
                    return "failedInserted";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function feedback($userId, $comment, $rating){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dofeedbackQuery());
                $query->execute(array($userId, $comment, $rating, 0, date('Y-m-d'), date('Y-m-d')));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "successfullyInserted";
                }else{
                    $con->closeConnection();
                    return "failedInserted";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function delivery($userId, $myorderId, $dateDelivery){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dofeedbackQuery());
                $query->execute(array($myorderId, $userId, 0, $dateDelivery));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "successfullyInserted";
                }else{
                    $con->closeConnection();
                    return "failedInserted";
                }
            }else{
                return "Not Connected to Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getMyCart($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetMyCartQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected To Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getProductId($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dogetProductIdQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected To Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function countAllMyOrder($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doCountAllMyOrderQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected To Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getProductFromCartId($productId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doGetProductFromCartIdQuery());
                $query->execute(array($productId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            }else{
                return "Not Connected To Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function updateProductId($quantity, $productId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare("UPDATE `tblmycart` SET `quantity` = ? WHERE `productId` = ?");
                $query->execute(array($quantity, $productId));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "UpdatedProductCart";
                }else{
                    $con->closeConnection();
                    return "failedUpdatedProductCart";
                }
            }else{
                return "Not Connected To Database";
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
                $query = $con->getCon()->prepare("DELETE FROM `tblmycart` WHERE `productId` = ?");
                $query->execute(array($productId));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "DeletedProductCart";
                }else{
                    $con->closeConnection();
                    return "failedUpdatedProductCart";
                }
            }else{
                return "Not Connected To Database";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function addressId($userId, $postalCode, $city, $province, $barangay){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare("INSERT INTO `tbladdress`(`userId`,`postalCode`, `city`, `province`, `barangay`) VALUES (?,?,?,?,?)");
                $query->execute(array($userId,$postalCode, $city, $province, $barangay));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "successfullyInserted";
                }else{
                    $con->closeConnection();
                    return "NotInsertedAddress";
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function addproductFromCart($userId, $addressId, $productId, $quantity){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $date7 = new DateTime();
                $date7->add(new DateInterval('P7D'));
                $deliverDate = $date7->format('Y-m-d');
                $query = $con->getCon()->prepare($quer->doAddProductFromCartQuery());
                $query->execute(array($userId,$addressId, $productId, $quantity,1 , date('Y-m-d'), $deliverDate));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "successfullyInserted";
                }else{
                    $con->closeConnection();
                    return "NotInsertedAddress";
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getMultiplyQandP($userId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doGetMultiplyQandP());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                echo json_encode($result);
            }else{
                return "Not Connected to the database";
            }
        } catch (PDOException $th) {
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

    private function deleteCart($cartId){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doDeleteMyCartQuery());
                $query->execute(array($cartId));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "Deleted";
                }else{
                    $con->closeConnection();
                    return "FailedDelete";
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function checkSession($username, $password){
        if($username != "" && $password != ""){
            return true;
        }else{
            return false;
        }
    }
}

?>