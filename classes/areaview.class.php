<?php
class Areaview extends Area{

 public function ViewAreas(){
        $results=$this->DisplayAreas();
        return $results;
    }
<<<<<<< HEAD
=======

public function ViewListOPCenters(){
    $results=$this->getOPcenters();
    return $results;
}
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
}