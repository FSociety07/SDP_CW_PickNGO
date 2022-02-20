<?php
class AdminView extends Admin{
    
    public function CheckAdminLogin($username){
        $stmt=$this->LoginAdmin($username);
        return $stmt;
    }

    public function DisplayEmployees(){
        $stmt=$this->getEmployees();
        return $stmt;
    }
}