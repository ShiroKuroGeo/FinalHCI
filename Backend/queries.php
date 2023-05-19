<?php
class queries{

    public function dologinQuery(){
        return $this->loginQuery();
    }
    public function doregisterQuery(){
        return $this->registerQuery();
    }
    public function douserIdQuery(){
        return $this->userIdQuery();
    }
    public function dorecommendationQuery(){
        return $this->recommendationQuery();
    }
    public function dogetAllNumberOfCartQuery(){
        return $this->getAllNumberOfCartQuery();
    }

    private function loginQuery(){
        return "SELECT * FROM `tbluser` WHERE `username` = ? AND `password` = ?";
    }
    private function registerQuery(){
        return "INSERT INTO `tbluser`(`fullname`, `email`, `username`, `phoneNumber`, `password`, `role`, `status` , `profileImage` , `dateCreated`, `dateUpdated`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    }
    private function userIdQuery(){
        return "SELECT * FROM `tbluser` WHERE `username` = ? ";
    }
    private function recommendationQuery(){
        return "INSERT INTO `tblrecommendation`(`recomName`, `recomEmail`, `recomPhone`, `recomMessage`, `recomStatus`, `recomDate`) VALUES (?,?,?,?,?,?)";
    }
}
?>