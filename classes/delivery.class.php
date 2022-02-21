<?php
class Delivery extends Dbh{


protected function setDelivery($pickupRequestId,$deliveryDateTime,$deliveryProof,$deliveryEmpId){
    $sql="INSERT INTO delivery(pickupRequestId,deliveredDateTime,deliveryProof,DeliveryEmpId)VALUES (?,?,?,?)";
    $stmt=$this->connect()->prepare($sql);
    return $result=$stmt->execute([$pickupRequestId,$deliveryDateTime,$deliveryProof,$deliveryEmpId]);
    }
}