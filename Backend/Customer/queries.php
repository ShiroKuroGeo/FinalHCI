<?php
class queries{
    public function dofeedbackQuery(){
        return $this->feedbackQuery();
    }
    public function dodeliveryQuery(){
        return $this->deliveryQuery();
    }
    public function dobestProductQuery(){
        return $this->bestProductQuery();
    }
    public function doaddressQuery(){
        return $this->addressQuery();
    }
    public function dogetMyOrderQuery(){
        return $this->getMyOrderQuery();
    }
    public function dochangeProfileQuery(){
        return $this->changeProfileQuery();
    }
    public function dogetAllInformationQuery(){
        return $this->getAllInformationQuery();
    }
    public function doaddToCartQuery(){
        return $this->addToCartQuery();
    }
    public function dogetMyCartQuery(){
        return $this->getMyCartQuery();
    }
    public function dogetProductIdQuery(){
        return $this->getProductIdQuery();
    }
    public function doGetMultiplyQandP(){
        return $this->getMultiplyQandP();
    }
    public function dogetProductQuery(){
        return $this->getProductQuery();
    }
    public function doGetProductFromCartIdQuery(){
        return $this->getProductFromCartIdQuery();
    }
    public function doCountAllMyOrderQuery(){
        return $this->countAllMyOrderQuery();
    }
    public function doDeleteMyCartQuery(){
        return $this->deleteMyCartQuery();
    }

    //SELECT QUERIES
    private function bestProductQuery(){
        return "SELECT MAX(`totalUserCount`) FROM `tblproduct`";
    }
    private function addressQuery(){
        return "SELECT * FROM `tbladdress` where `userId` = ?";
    }
    private function getMyOrderQuery(){
        return "SELECT my.myOrderId, my.status, my.dateOrdered, my.dateDeliver, ad.postalCode, ad.city, ad.province, ad.barangay, pr.productImage, pr.productName, my.quantity, pr.category, pr.size, pr.price FROM `myorder` my INNER JOIN `tbladdress` ad INNER JOIN `tblproduct` pr ON my.addressId = ad.addressId AND my.productId = pr.productId WHERE my.userId = ?";
    }
    private function getAllInformationQuery(){
        return "SELECT * FROM `tbluser` WHERE `userId` = ?";
    }
    private function getMyCartQuery(){
        return "SELECT pr.productImage, pr.productId, pr.productName, pr.price, pr.size, ca.quantity, ca.status, ca.tblcart FROM `tblmycart` ca INNER JOIN `tblproduct` pr ON ca.productId = pr.productId WHERE ca.userId = ?";
    }
    private function getProductIdQuery(){
        return "SELECT * FROM `tblmycart` WHERE productId = ?";
    }
    private function getMultiplyQandP(){
        return "SELECT SUM(my.quantity * p.price) AS totalValueQuantity FROM `tblmycart` my INNER JOIN `tblproduct` p ON my.productId = p.productId WHERE my.userId = ?";
    }
    private function getProductQuery(){
        return "SELECT * FROM `tblproduct` WHERE `status` = 1 AND `quantity` > 1";
    }
    private function countAllMyOrderQuery(){
        return "SELECT COUNT(*) as countedOrder FROM `myorder` WHERE `userId` = ?";
    }

    //Insert Into
    private function feedbackQuery(){
        return "INSERT INTO `tblfeedback`(`userId`, `comment`, `rating`, `status`, `feedbackCreated`, `feedbackUpdated`) VALUES (?,?,?,?,?,?)";
    }
    private function deliveryQuery(){
        return "INSERT INTO `tbldelivery`(`myorderId`, `userId` , `status`, `dateDeliver`) VALUES (?,?,?,?)";
    }
    private function addToCartQuery(){
        return "INSERT IGNORE INTO `tblmycart`(`userId`, `productId`, `quantity` ,`status`,`dateCreated`, `dateUpdated`) VALUES (?,?,1,?,?,?)";
    }
    private function getProductFromCartIdQuery(){
        return "INSERT INTO `myorder`(`userId`, `addressId`, `productId`, `quantity`, `status`, `dateOrdered`, `dateDeliver`) VALUES (?,?,?,?,?,?,?)";
    }

    //Update
    private function changeProfileQuery(){
        return "UPDATE `tbluser` SET `profileImage` = ? WHERE `userId` = ?";
    }

    //Delete
    private function deleteMyCartQuery(){
        return "DELETE FROM `tblmycart` WHERE `tblcart` = ?";
    }
}
?>