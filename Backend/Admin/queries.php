<?php
class queries{

    public function doinsertProductQuery(){
        return $this->insertProductQuery();
    }
    public function dochangeStatusQuery(){
        return $this->changeStatusQuery();
    }
    public function dodeleteProductQuery(){
        return $this->deleteProductQuery();
    }
    public function dogetProductIdQuery(){
        return $this->getProductIdQuery();
    }
    public function dogetProductQuery(){
        return $this->getProductQuery();
    }
    public function dogetProductAdminQuery(){
        return $this->getProductAdminQuery();
    }
    public function dogetCustomerQuery(){
        return $this->getCustomerQuery();
    }
    public function doupdateCustomerQuery(){
        return $this->updateCustomerQuery();
    }
    public function dogetRecommendationQuery(){
        return $this->getRecommendationQuery();
    }
    public function dogetRecommendationIdQuery(){
        return $this->getRecommendationIdQuery();
    }
    public function dogetOrderQuery(){
        return $this->getOrderQuery();
    }
    public function dogetInvoiceQuery(){
        return $this->getInvoiceQuery();
    }
    public function doupdateInvoiceQuery(){
        return $this->updateInvoiceQuery();
    }

    //Private
    //Insert Table Value
    private function insertProductQuery(){
        return "INSERT INTO `tblproduct`(`productImage`,`productName`, `productDescr` , `quantity`, `category`, `price`, `size` , `status`, `dateInserted`, `dateUpdated`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    }

    //Select Table Value
    private function getRecommendationQuery(){
        return "SELECT * FROM `tblrecommendation`";
    }
    private function getRecommendationIdQuery(){
        return "SELECT * FROM `tblrecommendation` WHERE `recomId` = ?";
    }
    private function getOrderQuery(){
        return "SELECT DISTINCT m.userId, u.fullname, m.status FROM `myorder` m LEFT JOIN `tbluser` u ON m.userId = u.userId";
    }
    private function getInvoiceQuery(){
        return "SELECT us.fullname, us.email, us.phoneNumber, us.username, us.role, ad.postalCode, ad.city, ad.province, ad.barangay, pr.productImage, pr.productName, pr.productDescr, pr.price, pr.category, pr.size, my.quantity, my.status, my.myOrderId ,my.dateOrdered, my.dateDeliver, my.userId, SUM(pr.price * my.quantity) as totalPriceOrders FROM `myorder` my INNER JOIN `tbluser` us INNER JOIN `tbladdress` ad INNER JOIN `tblproduct` pr ON my.userId = us.userId AND my.addressId = ad.addressId AND my.productId = pr.productId WHERE my.userId = ?";
    }
    private function getProductIdQuery(){
        return "SELECT * FROM `tblproduct` WHERE `productId` = ?";
    }
    private function getProductQuery(){
        return "SELECT * FROM `tblproduct` WHERE `status` = 1 ORDER BY `dateInserted` DESC LIMIT 10;";
    }
    private function getProductAdminQuery(){
        return "SELECT * FROM `tblproduct`";
    }
    private function getCustomerQuery(){
        return "SELECT * FROM `tbluser` WHERE `role` = 1 ORDER BY `dateCreated` DESC LIMIT 10;";
    }

    //Count/Length
    private function countDataUser(){
        return "SELECT count(*) FROM `tbluser`";
    }
    private function countDataProduct(){
        return "SELECT count(*) FROM `tblproduct`";
    }
    private function countDataAddress(){
        return "SELECT count(*) FROM `tbladdress`";
    }
    private function countDataRecomendation(){
        return "SELECT count(*) FROM `tblrecommendation`";
    }
    private function countDataMyCart(){
        return "SELECT count(*) FROM `tblmycart`";
    }
    private function countDataMyOrder(){
        return "SELECT count(*) FROM `myorder`";
    }

    //Update Table Value
    private function changeStatusQuery(){
        return "UPDATE `tblproduct` SET `status` = ? WHERE `productId` = ?";
    }
    private function updateCustomerQuery(){
        return "UPDATE `tbluser` SET `status` = ? WHERE userId = ?";
    }
    private function updateInvoiceQuery(){
        return "UPDATE `tblproduct` pr INNER JOIN `myorder` my ON pr.productId = my.productId SET pr.quantity = pr.quantity - my.quantity, my.status = ? WHERE my.myorderId = ?";
    }

    //Delete Table Value
    private function deleteProductQuery(){
        return "DELETE FROM `tblproduct` WHERE `productId` = ?";
    }
}
?>