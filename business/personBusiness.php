<?php
require_once '../data/personData.php';

class PersonBusiness{

    private $personData;

    public function __construct(){ 
        $this->personData = new PersonData();
    }

    public function insertPerson($person){
        return $this->personData->insertPerson($person);
    }

    public function verifyIdentificationPerson($identification){
        return $this->personData->verifyIdentificationPerson($identification);
    }

    public function  updatePerson($person){
        return $this->personData->updatePerson($person);
    }

    public function getPersonList(){
        return $this->personData->getPersonList();
    }

    public function deletePerson($identification){
        return $this->personData->deletePerson($identification);
    }

    public function getPerson($identification){
        return $this->personData->getPerson($identification);
    }
}
?>