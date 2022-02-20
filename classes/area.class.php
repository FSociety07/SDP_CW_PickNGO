<?php
class Area extends Dbh{


 protected function DisplayAreas(){
  $sql="SELECT * FROM areas";
  $stmt=$this->connect()->query($sql);      
  return $stmt;    
}
<<<<<<< HEAD
=======

protected function getOPcenters(){
  $sql="SELECT id,centerName FROM centers";
  $stmt=$this->connect()->query($sql);      
  return $stmt;   

}
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
}