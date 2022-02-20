<?php
class Area extends Dbh{


 protected function DisplayAreas(){
  $sql="SELECT * FROM areas";
  $stmt=$this->connect()->query($sql);      
  return $stmt;    
}
}