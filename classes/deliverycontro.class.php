<?php
class DeliveryContro extends Delivery {
    
    public function CreateDelivery($pickupRequestId,$deliveryDateTime,$deliveryProof,$deliveryEmpId){
       return $results= $this->setDelivery($pickupRequestId,$deliveryDateTime,$deliveryProof,$deliveryEmpId);   
    }
}