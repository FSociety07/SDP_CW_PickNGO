<?php
class PackageContro extends Package {
    
    public function CreatePackage($weight,$size,$pickupTime,$rate,$requestID){
       return $results= $this->setPackage($weight,$size,$pickupTime,$rate,$requestID);   
    }
}