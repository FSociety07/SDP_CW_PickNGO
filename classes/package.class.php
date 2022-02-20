<?php
class Package extends Dbh{


protected function setPackage($weight,$size,$pickupTime,$rate,$requestID){
    $sql="INSERT INTO package(weight,size,pickupTime,rate,pickupRequestId)VALUES (?,?,?,?,?)";
    $stmt=$this->connect()->prepare($sql);
    return $result=$stmt->execute([$weight,$size,$pickupTime,$rate,$requestID]);
    }
}