<?php
class UserContro extends User{
    
    public function ChangeCustomerPassword($password,$email){
       return $results= $this->UpdateCustomerPassword($password,$email);   
    }
    public function CreateCustomer($username,$password,$cname,$phoneno,$email,$address){
        return $results= $this->setCustomer($username,$password,$cname,$phoneno,$email,$address);   
    }

    public function CreateEmployee($username,$password,$ename,$phoneno,$email,$address,$status){
        return $results=$this->setEmployee($username,$password,$ename,$phoneno,$email,$address,$status);   
    }
}
//     public function deleteUserProfile($id){
//         return $results= $this->DeleteUsers($id);   
//     }

//     public function editUsers($id){
//       return $results= $this->EditUser($id);
//     }

//     public function UpdateUsers($username,$email,$firstname,$lastname,$upassword,$mobile,$id){
//         return $results= $this->UpdateUser($username,$email,$firstname,$lastname,$upassword,$mobile,$id);
//     }
// }