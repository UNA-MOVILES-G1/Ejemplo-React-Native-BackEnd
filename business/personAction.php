<?php

require_once 'personBusiness.php';
require_once '../domain/person.php';
$json = file_get_contents('php://input');
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);
//insertar...
if (isset($obj['create'])){
    $success = false;
    $message = "¡No se pudo realizar el registro, por favor intente de nuevo!";
    if (isset($obj['identification']) && isset($obj['name']) && isset($obj['lastName']) && isset($obj['age']) 
        && isset($obj['phone']) && isset($obj['email']) && isset($obj['address']) && isset($obj['sex'])){
        $identification = $obj['identification'];
        $name = $obj['name'];
        $lastName = $obj['lastName'];
        $sex = $obj['sex'];
        $phone = $obj['phone'];
        $email = $obj['email'];
        $address = $obj['address'];
        $age = $obj['age'];
        if (!empty($identification) && !empty($name) && !empty($lastName) && !empty($sex) && !empty($address) && !empty($age)){
            $personBusiness = new PersonBusiness();
            if (!$personBusiness->verifyIdentificationPerson($identification)){
                $person = new Person($identification, $name, $lastName, $age, $email, $address, $sex, $phone);
                if ($personBusiness->insertPerson($person)){
                    $success = true;
                    $message = "Persona insertada correctamente!";
                }
            }else{
                $message = "¡Esta persona ya se encuentra registrada!";
            }
        }else{
            $message= "¡Algunos espacios son requeridos, por favor, llenelos correctamente!";
        }
    }else{
        $message = "¡Faltan parametros para completar la solicitud!";
    }
    header('Content-Type: application/json');
    $arrayInfo = array();
    array_push($arrayInfo, array("success"=>$success, "message"=>$message));
    echo json_encode($arrayInfo);
}elseif (isset($obj['getPersonList'])){// obtener lista...
    $personList = array();
    $personBusiness = new PersonBusiness();
    $personList = $personBusiness->getPersonList();
    header('Content-Type: application/json');
    echo json_encode($personList);
}elseif (isset($obj['delete'])){
    $success = false;
    $message = "¡No se pudo completar la solicitud, por favor intente de nuevo!";
    if (isset($obj['identification'])){
        $identification = $obj['identification'];
        $personBusiness = new PersonBusiness();
        if ($personBusiness->verifyIdentificationPerson($identification)){
            if ($personBusiness->deletePerson($identification)){
                $message = "¡Eliminado correctamente!";
                $success = true;
            }
        }else{  
            $message = "¡Persona no existe!";
        }
    }else{
        $message = "¡Faltan parametros para completar la solicitud!";
    }
    header('Content-Type: application/json');
    $arrayInfo = array();
    array_push($arrayInfo, array("success"=>$success, "message"=>$message));
    echo json_encode($arrayInfo);
}elseif (isset($obj['getPerson'])){
    if (isset($obj['identification'])){
        $identification = $obj['identification'];
        $person = null;
        $personBusiness = new PersonBusiness();
        $person = $personBusiness->getPerson($identification);
        header('Content-Type: application/json');
        echo json_encode($person->jsonSerialize());
    }
}elseif (isset($obj['update'])){
    $success = false;
    $message = "¡No se pudo realizar el registro, por favor intente de nuevo!";
    if (isset($obj['identification']) && isset($obj['phone']) && isset($obj['email']) && isset($obj['address'])){
        $identification = $obj['identification'];
        $phone = $obj['phone'];
        $email = $obj['email'];
        $address = $obj['address'];
        if (!empty($identification) && !empty($address)){
            $personBusiness = new PersonBusiness();
            if ($personBusiness->verifyIdentificationPerson($identification)){
                $person = new Person($identification, null, null, null, $email, $address, null, $phone);
                if ($personBusiness->updatePerson($person)){
                    $success = true;
                    $message = "Persona Actualizada correctamente!";
                }
            }else{
                $message = "¡Persona no existe!";
            }
        }else{
            $message= "¡Algunos espacios son requeridos, por favor, llenelos correctamente!";
        }
    }else{
        $message = "¡Faltan parametros para completar la solicitud!";
    }
    header('Content-Type: application/json');
    $arrayInfo = array();
    array_push($arrayInfo, array("success"=>$success, "message"=>$message));
    echo json_encode($arrayInfo);
}
?>