<?php
class PickupRequestContro extends PickupRequest{
    
    public function CreatePickupRequest($requestDateTime,$pickAvailability,$customerId,$centerId,$dstCenterId,$receiverId,$status,$randomCode){
       return $results= $this->setPickupRequest($requestDateTime,$pickAvailability,$customerId,$centerId,$dstCenterId,$receiverId,$status,$randomCode);   
    }

    public function LastPickupRequestId(){
        return $results= $this->getRequestLastId();   
     }

     public function SearchPickupRequest($id,$username){
        return $results= $this->getRequestedBy($id,$username);   
     }

     public function acceptReq($empOPcenter,$status){
        return $results= $this->getReqByOPcent($empOPcenter,$status);   
     }

     public function UpdateRequestStatus($status,$id){
        return $results= $this->setRequestStatus($status,$id);   
     }
     
     public function setAcceptedreq($reqId,$pickEmpId){
        return $results= $this->setAcceptReq($reqId,$pickEmpId);   
     }
     
     public function ctrlGetEmail($reqId){
        return $results= $this->getEmail($reqId);   
     }
     
     public function ctrlgetTracking($reqId){
        return $results= $this->getTracking($reqId);   
     }

     public function DisplayTrackingStatus($trackingCode){
      return $results= $this->getTrackingStatus($trackingCode);   
   }
   public function ctrlPickupTIme($schPckTime,$id){
      return $results= $this->setPickupTime($schPckTime,$id);   
   }
   
   public function DisplayRequestDetails($reqId){
      return $results= $this-> getRequestDetails($reqId);   
   }

   public function DisplayDSTcenter($dstOPcenter,$status){
      return $results= $this-> getReqByDSTopcenter($dstOPcenter,$status);   
   }
  
}