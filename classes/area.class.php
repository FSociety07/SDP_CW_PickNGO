<?php
class Area extends Dbh{


 protected function DisplayAreas(){
  $sql="SELECT * FROM areas";
  $stmt=$this->connect()->query($sql);      
  return $stmt;    
}

protected function getOPcenters(){
  $sql="SELECT id,centerName FROM centers";
  $stmt=$this->connect()->query($sql);      
  return $stmt;   

}
}