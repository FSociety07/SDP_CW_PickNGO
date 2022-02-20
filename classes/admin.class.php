<?php
class Admin extends Dbh{

    protected function LoginAdmin($username){
        $sql="SELECT * FROM admin WHERE username=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return  $stmt;
      }

      protected function getEmployees(){
        $sql="SELECT * FROM employee";
        $stmt=$this->connect()->query($sql);      
        return $stmt;  
      }

      protected function setEmployeeStatus($status,$id){
        $sql="UPDATE employee SET status=? WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        return $results=$stmt->execute([$status,$id]);
      }
}