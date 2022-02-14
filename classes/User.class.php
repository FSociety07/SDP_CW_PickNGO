<?php
class User extends Dbh{

protected function setCustomer($username,$password,$cname,$phoneno,$email,$address){
  $sql="INSERT INTO customers(username,password,cName,phoneNo,email,address)VALUES (?,?,?,?,?,?)";
  $stmt=$this->connect()->prepare($sql);
  return $result=$stmt->execute([$username,$password,$cname,$phoneno,$email,$address]);
}

protected function setEmployee($username,$password,$ename,$phoneno,$email,$address,$status){
  $sql="INSERT INTO employee(username,password,eName,phoneNo,email,address,status)VALUES (?,?,?,?,?,?,?)";
  $stmt=$this->connect()->prepare($sql);
  return $result=$stmt->execute([$username,$password,$ename,$phoneno,$email,$address,$status]);

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
}
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
// protected function UpdateUser($username,$email,$firstname,$lastname,$upassword,$mobile,$id){
//   $sql="UPDATE users SET UserName=?,Email=?,FirstName=?,LastName=?,UPassword=?,MobileNo=? WHERE id=?";
//   $stmt=$this->connect()->prepare($sql);    
//   $results=$stmt->execute([$username,$email,$firstname,$lastname,$upassword,$mobile,$id]);    
//   return $results;
// }
// protected function SearchUsers($username){
//   $sql="SELECT * FROM users WHERE UserName LIKE '%$username%' or Email LIKE '%$username%' or MobileNo LIKE '%$username%' or FirstName LIKE '%$username%' or LastName LIKE '%$username%'";
//   $stmt=$this->connect()->prepare($sql);    
//   $stmt->execute();    
//   $results=$stmt->fetchAll();
//   return $results;
// }
// }