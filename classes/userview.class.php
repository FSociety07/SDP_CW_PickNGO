<?php
class UserView extends User{
    
    public function CheckEmployeeLogin($username){
        $stmt=$this->LoginEmployee($username);
        return $stmt;
    }
    public function CheckCustomerLogin($username){
        $stmt=$this->LoginCustomer($username);
        return $stmt;
    }
    public function CheckCustomerEmail($email){
        $result=$this->VerifyCustomerEmail($email);
        return $result;
    }
 
    public function CutomerUserName($username){
        $results=$this->VerifyCustomerUsername($username);
        return $results;
    }
    public function EmployeeUserName($username){
        $results=$this->VerifyEmployeeUsername($username);
        return $results;
    }
    public function ReceiverLastId(){
        $results=$this->getReceiverLastId();
        return $results;
    }

    public function CenterArea($username){
        $results=$this->getOPcenterArea($username);
        return $results;

    }

    public function dstCenterArea($area){
        $results=$this->getDstOPcenterArea($area);
        return $results;

    }
<<<<<<< HEAD
    // public function ViewUser($username){
    //     $results=$this->SearchUsers($username);
    //     return $results;
    // }
=======
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc

}