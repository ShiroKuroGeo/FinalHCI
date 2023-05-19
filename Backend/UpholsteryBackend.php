<?php
require('database.php');
require('queries.php');
class UpholsteryBackend extends queries{
    // public function
    public function doLogin($username,$password){
        return $this->loginFunction($username,$password);
    }

    public function doRegister($fullname,$email,$username,$phoneNumber,$password, $profileImage){
        return $this->registerFunction($fullname,$email,$username,$phoneNumber,$password, $profileImage);
    }

    public function doRecommendation($recomName, $recomEmail, $recomPhone, $recomMessage){
        return $this->recommendation($recomName, $recomEmail, $recomPhone, $recomMessage);
    }

    //Start Private functions
    private function loginFunction($username,$password){
        try {
            $con = new database();
            if ($con->getStatus()){
                $quer = new queries();
                $passEncryp = md5($password);
                $query = $con->getCon()->prepare($quer->dologinQuery());
                $query->execute(array($username,$passEncryp));
                $role = null;
                $status = null;
                while($row = $query->fetch()){
                    $role = $row['role'];
                    $status = $row['status'];
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['profileImage'] = $row['profileImage'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['fullname'] = $row['fullname'];
                }
                if($role == "1"){
                    if($status == "1"){
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $passEncryp;
                        $con->closeConnection();
                        return "activeUser";
                    }else if($status == "0"){
                        return "deActive";
                    }else{
                        return "SomethingIsWrong";
                    }
                }else if($role == "2"){
                    $con->closeConnection();
                    return "admin";
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function registerFunction($fullname,$email,$username,$phoneNumber,$password, $profileImage){
        try{
            $con = new database();
            if ($con->getStatus()){
                $now = new DateTime();
                $formattedDate = $now->format('Y-m-d H:i:s');
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->doregisterQuery());
                $query->execute(array($fullname,$email,$username,$phoneNumber,md5($password), 1, 1, $profileImage, $formattedDate, 0));
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

    private function userId(){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->douserIdQuery());
                $query->executed(array($_SESSION['username']));
                $result = $query->fetch();
                $data = null;
                while($row = $result){
                    $data = $row['userId'];
                }
                $con->closeConnection();
                return $data;
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    
    private function recommendation($recomName, $recomEmail, $recomPhone, $recomMessage){
        try {
            $con = new database();
            if($con->getStatus()){
                $quer = new queries();
                $query = $con->getCon()->prepare($quer->dorecommendationQuery());
                $query->execute(array($recomName,$recomEmail, $recomPhone, $recomMessage, 1, date('Y-m-d')));
                $result = $query->fetch();
                if(!$result){
                    $con->closeConnection();
                    return "RecommendationSuccessfullyAdded";
                }else{
                    $con->closeConnection();
                    return "RecommendationNotAdded";
                }
            }else{
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //Customer


    //Checking
    private function checkLogin($username,$password){
        if($username != "" && $password != ""){
            return true;
        }else{
            return false;
        }
    }

    private function checkRegistration($fullname,$email,$username,$phoneNumber,$password){
        if($fullname != "" && $email != "" && $username != "" && $phoneNumber != "" && $password){
            return true;
        }else{
            return false;
        }
    }  
}
?>