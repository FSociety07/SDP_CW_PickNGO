<?php
class AdminContro extends Admin{
    
    public function UpdateEmployeeStatus($status,$id){
        $stmt=$this->setEmployeeStatus($status,$id);
        return $stmt;
    }
}