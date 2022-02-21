<?php
class Areaview extends Area{

 public function ViewAreas(){
        $results=$this->DisplayAreas();
        return $results;
    }

public function ViewListOPCenters(){
    $results=$this->getOPcenters();
    return $results;
}
}