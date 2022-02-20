<?php
class User extends Dbh{

protected function setCustomer($username,$password,$cname,$phoneno,$email,$address,$area){
  $sql="INSERT INTO customers(username,password,cName,phoneNo,email,address,areaId)VALUES (?,?,?,?,?,?,?)";
  $stmt=$this->connect()->prepare($sql);
  return $result=$stmt->execute([$username,$password,$cname,$phoneno,$email,$address,$area]);
}

protected function setEmployee($username,$password,$ename,$phoneno,$email,$address,$opcenter){
  $sql="INSERT INTO employee(username,password,eName,phoneNo,email,address,opCenterId)VALUES (?,?,?,?,?,?,?)";
  $stmt=$this->connect()->prepare($sql);
  return $result=$stmt->execute([$username,$password,$ename,$phoneno,$email,$address,$opcenter]);

}

protected function setReceiver($name,$address,$phone,$email,$area){
 $sql="INSERT INTO receiver(name,address,phoneNo,email,area)VALUES (?,?,?,?,?)";
 $stmt=$this->connect()->prepare($sql);
 $results=$stmt->execute([$name,$address,$phone,$email,$area]);
 return $results;
}

protected function getReceiverLastId(){
  $sql="SELECT MAX(id) FROM receiver";
  $stmt=$this->connect()->prepare($sql);
  $stmt->execute();
  $results=$stmt->fetch();
  return  $results;
 }



protected function LoginEmployee($username){
  $sql="SELECT * FROM employee WHERE username=?";
  $stmt=$this->connect()->prepare($sql);
  $stmt->execute([$username]);
  return  $stmt;
}

protected function LoginCustomer($username){
  $sql="SELECT * FROM customers WHERE username=?";
  $stmt=$this->connect()->prepare($sql);
  $stmt->execute([$username]);
  return  $stmt;
}

protected function UpdateCustomerPassword($password,$email){
  $sql="UPDATE customers SET password=? WHERE email=?";
  $stmt=$this->connect()->prepare($sql);
  return $results=$stmt->execute([$password,$email]);
}
protected function VerifyCustomerEmail($email){
  $sql="SELECT * FROM customers WHERE email=?";
  $stmt=$this->connect()->prepare($sql);
  $stmt->execute([$email]);
  $result=$stmt->fetch();
  return $result; 
}
protected function VerifyCustomerUsername($username){
  $sql="SELECT * FROM customers WHERE username=?";
  $stmt=$this->connect()->prepare($sql);
  $stmt->execute([$username]);
  $result=$stmt->fetch();
  return $result; 
}
protected function VerifyEmployeeUsername($username){
  $sql="SELECT * FROM employee WHERE username=?";
  $stmt=$this->connect()->query($sql);
  return $stmt; 
}

<<<<<<< HEAD
// protected function DisplayUsers(){
//   $sql="SELECT * FROM users";
//   $stmt=$this->connect()->query($sql);      
//   return $stmt;    
// }
// protected function DeleteUsers($id){
//   $sql="DELETE FROM users WHERE id=?";
//   $stmt=$this->connect()->prepare($sql);    
//   return $results=$stmt->execute([$id]);      
// }
// protected function EditUser($id){
//   $sql="SELECT * FROM users WHERE id=?";
//   $stmt=$this->connect()->prepare($sql);    
//   $stmt->execute([$id]);    
//   $results=$stmt->fetch();
//   return $results;
// }
=======
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
protected function UpdateCustomer($name,$phone,$email,$password,$address,$area,$username){
  $sql="UPDATE customers SET cName=?,phoneNo=?,email=?,password=?,address=?,areaId=? WHERE username=?";
  $stmt=$this->connect()->prepare($sql);    
  $results=$stmt->execute([$name,$phone,$email,$password,$address,$area,$username]);    
  return $results;
}

protected function getOPcenterArea($username){
  $sql="SELECT centers.id FROM centers
  LEFT JOIN customers ON customers.areaId=centers.areaId 
  LEFT JOIN areas ON areas.id=centers.areaId
  WHERE customers.username=?";
  $stmt=$this->connect()->prepare($sql);    
  $stmt->execute([$username]);
  return $stmt->fetch();   
}
protected function getDstOPcenterArea($area){
  $sql="SELECT centers.id FROM centers 
  LEFT JOIN receiver ON receiver.area=centers.areaId
  WHERE receiver.area=?";
  $stmt=$this->connect()->prepare($sql);    
  $stmt->execute([$area]);
  return $stmt->fetch();

}

}
<<<<<<< HEAD
// protected function SearchUsers($username){
//   $sql="SELECT * FROM users WHERE UserName LIKE '%$username%' or Email LIKE '%$username%' or MobileNo LIKE '%$username%' or FirstName LIKE '%$username%' or LastName LIKE '%$username%'";
//   $stmt=$this->connect()->prepare($sql);    
//   $stmt->execute();    
//   $results=$stmt->fetchAll();
//   return $results;
// }
// }
=======
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
