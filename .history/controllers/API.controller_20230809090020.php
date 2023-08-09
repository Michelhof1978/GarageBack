<?php

class APIController{
    public function getGarage(){
        $garage = new GarageManager();
        $garages = $garage->getGarage();
        echo json_encode($garages);
    }
}