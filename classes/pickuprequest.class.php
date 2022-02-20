<?php
class PickupRequest extends Dbh{

protected function setPickupRequest($requestDateTime,$pickAvailability,$customerId,$centerId,$dstCenterId,$receiverId,$status,$randomCode){
  $sql="INSERT INTO pickuprequests(requestedDateTime,pickupAvailability,customerId,srcOPcenter,destinationOPcenter,receiverId,status,tracking)VALUES (?,?,?,?,?,?,?,?)";
  $stmt=$this->connect()->prepare($sql);
  return $result=$stmt->execute([$requestDateTime,$pickAvailability,$customerId,$centerId,$dstCenterId,$receiverId,$status,$randomCode]);
}
protected function getRequestLastId(){
    $sql="SELECT MAX(id) FROM pickuprequests";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute();
    $results=$stmt->fetch();
    return  $results;
   }

   protected function getRequestedBy($id,$username){
    $sql="SELECT pickuprequests.id, pickuprequests.requestedDateTime,pickuprequests.srcOPcenter,customers.username ,receiver.name, pickuprequests.status FROM pickuprequests
    LEFT JOIN customers ON pickuprequests.customerId=customers.id 
    LEFT JOIN receiver ON pickuprequests.receiverId=receiver.id 
    WHERE pickuprequests.id=? and customers.username=?";
    $stmt=$this->connect()->prepare($sql);    
    $stmt->execute([$id,$username]);
    return $stmt->fetch();   
    
  }

  protected function getReqByOPcent($empOPcenter,$status){
    $sql="SELECT pickuprequests.id, pickuprequests.requestedDateTime,pickuprequests.pickupAvailability,customers.username ,customers.address,customers.phoneNo, pickuprequests.status FROM pickuprequests
    LEFT JOIN customers ON pickuprequests.customerId=customers.id 
    WHERE pickuprequests.srcOPcenter=? and not pickuprequests.status=?";
    $stmt=$this->connect()->prepare($sql);    
    $stmt->execute([$empOPcenter,$status]);
    return $stmt->fetchAll();   
    
  }

  protected function setRequestStatus($status,$id){
    $sql="UPDATE pickuprequests SET status=? WHERE id=?";
    $stmt=$this->connect()->prepare($sql);
    return $result=$stmt->execute([$status,$id]);
  }

  protected function setAcceptReq($reqId,$pickEmpId){
    $sql="INSERT INTO acceptedrequest (requestedId,pickupEmpId) VALUES (?,?)";
    $stmt=$this->connect()->prepare($sql);
    return $result=$stmt->execute([$reqId,$pickEmpId]);
  }

  protected function getEmail($reqId){
    $sql="SELECT  customers.email as customerEmail, receiver.email as ReceiverEmail from pickuprequests
    Left join customers On pickuprequests.customerId=customers.id
    left JOIN receiver on pickuprequests.receiverId=receiver.id
    where pickuprequests.id=?";
    $stmt=$this->connect()->prepare($sql);    
    $stmt->execute([$reqId]);
    return $stmt->fetchAll();   
    
  }

  protected function getTracking($reqId){
    $sql="SELECT  tracking from pickuprequests
    where pickuprequests.id=?";
    $stmt=$this->connect()->prepare($sql);    
    $stmt->execute([$reqId]);
    return $stmt->fetch();   
    
  }

  protected function getTrackingStatus($trackingCode){
    $sql="SELECT acceptedrequest.id,pickuprequests.tracking,customers.username as Sender,employee.username as Deliver,employee.phoneNo,receiver.name as Receiver,pickuprequests.status from acceptedrequest 
    left join pickuprequests on acceptedrequest.requestedId=pickuprequests.id 
    left join customers on pickuprequests.customerId=customers.id 
    left JOIN employee on acceptedrequest.pickupEmpId=employee.id 
    left join receiver on pickuprequests.receiverId=receiver.id 
    where pickuprequests.tracking=?";
    $stmt=$this->connect()->prepare($sql);    
    $stmt->execute([$trackingCode]);
    return $stmt->fetch(); 
    
  }

  protected function getRequestDetails($reqID){
    $sql="SELECT pickuprequests.id,customers.cName as customerName, customers.phoneNo,customers.address from pickuprequests 
    left JOIN customers on pickuprequests.customerId=customers.id 
    where pickuprequests.id=?";
    $stmt=$this->connect()->prepare($sql);    
    $stmt->execute([$reqID]);
    return $stmt->fetch(); 
    
  }
  protected function setPickupTime($schPckTime,$id){
    $sql="UPDATE pickuprequests SET schedulePickupTime=? WHERE id=?";
    $stmt=$this->connect()->prepare($sql);
    return $result=$stmt->execute([$schPckTime,$id]);
  }

  protected function getReqByDSTopcenter($dstOPcenter,$status){
    $sql="SELECT pickuprequests.id, pickuprequests.requestedDateTime,pickuprequests.pickupAvailability,receiver.name as receiverName,receiver.address as receiverAddress,receiver.phoneNo as receiverPhone, pickuprequests.status FROM pickuprequests 
    LEFT JOIN receiver ON pickuprequests.receiverId=receiver.id 
    WHERE pickuprequests.destinationOPcenter=? and pickuprequests.status=?";
    $stmt=$this->connect()->prepare($sql);    
    $stmt->execute([$dstOPcenter,$status]);
    return $stmt->fetchAll();   
    
  }
  
}