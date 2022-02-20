<?php
class UserContro extends User{
    
    public function ChangeCustomerPassword($password,$email){
       return $results= $this->UpdateCustomerPassword($password,$email);   
    }
    public function CreateCustomer($username,$password,$cname,$phoneno,$email,$address,$area){
        return $results= $this->setCustomer($username,$password,$cname,$phoneno,$email,$address,$area);   
    }

    public function CreateEmployee($username,$password,$ename,$phoneno,$email,$address,$status){
        return $results=$this->setEmployee($username,$password,$ename,$phoneno,$email,$address,$status);   
    }

    public function CreateReceiver($name,$address,$phone,$email,$area){
        return $results=$this->setReceiver($name,$address,$phone,$email,$area);   
    }
//     public function deleteUserProfile($id){
//         return $results= $this->DeleteUsers($id);   
//     }

//     public function editUsers($id){
//       return $results= $this->EditUser($id);
//     }

    public function editCustomer($name,$phone,$email,$password,$address,$area,$username){
        return $results= $this->UpdateCustomer($name,$phone,$email,$password,$address,$area,$username);
    }
}
// }