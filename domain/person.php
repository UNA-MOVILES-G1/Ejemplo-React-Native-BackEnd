<?php

class Person{

    private $identification;
    private $name;
    private $lastName;
    private $age;
    private $email;
    private $address;
    private $sex;
    private $phone;


    public function __construct($identification, $name, $lastName, $age, $email, $address, $sex, $phone){
        $this->identification = $identification;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->email = $email;
        $this->address = $address;
        $this->sex = $sex;
        $this->phone = $phone;
    }

    public function setIdentification($identification){ $this->identification = $identification; }

    public function getIdentification(){ return $this->identification; }

    public function setName($name){ $this->name = $name; }

    public function getName(){ return $this->name; }

    public function setLastName($lastName){ $this->lastName = $lastName; }

    public function getLastName(){ return $this->lastName; }

    public function setPhone($phone){ $this->phone = $phone; }

    public function getPhone(){ return $this->phone; }

    public function setEmail($email){ $this->email = $email; }

    public function getEmail(){ return $this->email; }

    public function setAddress($address){ $this->address = $address; }

    public function getAddress(){ return $this->address; }

    public function setSex($sex){ $this->sex = $sex; }
    
    public function getSex(){ return $this->sex; }

    public function setAge($age){ $this->age = $age; }

    public function getAge(){ return $this->age; }

    public function jsonSerialize() {
        return [
            'identification' => $this->identification,
            'name' => $this->name,
            'lastName' => $this->lastName,
            'age' => $this->age,
            'email' => $this->email,
            'address' => $this->address,
            'sex' => $this->sex,
            'phone' => $this->phone
        ];
    }
}
?>