<?php
require_once 'data.php';
require_once '../domain/person.php';

class PersonData extends Data{

    public function insertPerson($person){
        $connection = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $connection->set_charset('utf8');
        $queryInsert = "INSERT INTO tbperson (identificationperson,nameperson,lastnameperson,ageperson,phoneperson,emailperson,addressperson,sexperson) VALUES ('". $person->getIdentification().
            "','". $person->getName()."','". $person->getLastName()."','".$person->getAge().
            "','".$person->getPhone(). "','".$person->getEmail() . "','".$person->getAddress() . "','".$person->getSex(). "');" ;
        $result = mysqli_query($connection, $queryInsert);
        mysqli_close($connection);
        return $result;
    }

    public function deletePerson($identification){
        // inicio de conexion
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryDelete = "DELETE FROM tbperson WHERE identificationperson ='" . $identification . "';";
        $result = mysqli_query($conn, $queryDelete);

        mysqli_close($conn);
        return $result;
    }

    public function updatePerson($person){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbperson SET addressperson = '" . $person->getAddress() . "', phoneperson='" . $person->getPhone() . "', emailperson='". $person->getEmail() .  "' WHERE identificationperson = '" . $person->getIdentification() . "';";
        $result = mysqli_query($conn, $queryUpdate);

        mysqli_close($conn);
        return $result;
    }

    public function verifyIdentificationPerson($identification){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT identificationperson FROM tbperson WHERE identificationperson ='" . $identification . "';";
        $result = mysqli_query($conn, $querySelect);
        $flag = false;
        if (mysqli_num_rows($result) > 0) { // ingresa si nota que ya existe el id en la tabla
            $flag = true;
        }
        return $flag;
    }

    public function getPersonList(){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbperson;";
        $result = mysqli_query($conn, $querySelect);
        $persons = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                //$identification, $name, $lastName, $age, $email, $address, $sex, $phone
                $person = new Person($row['identificationperson'], $row['nameperson'], $row['lastnameperson'], 
                    $row['ageperson'], $row['emailperson'], $row['addressperson'], $row['sexperson'], $row['phoneperson']);//provisional, faltan verificar id del tipo licencia
                $persons['person'][] = $person->jsonSerialize();
                //$persons['person'][] = $row;
            }
        }
        mysqli_close($conn);
        return $persons;
    }

    public function getPerson($identification){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbperson WHERE identificationperson='" . $identification . "';";
        $result = mysqli_query($conn, $querySelect);
        $person = null;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $person = new Person($row['identificationperson'], $row['nameperson'], $row['lastnameperson'], 
                    $row['ageperson'], $row['emailperson'], $row['addressperson'], $row['sexperson'], $row['phoneperson']);
            }
        }
        mysqli_close($conn);
        return $person;
    }

}
?>