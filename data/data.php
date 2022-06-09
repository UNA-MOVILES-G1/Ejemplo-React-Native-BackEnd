<?php

class Data{

    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;

    /*Constructor*/

    public function __construct() //lo nuevo de php 

    {

        $hostName = gethostname();

        switch ($hostName) {

            case "Chinox701": //laptop's PC //Nombre de mi ordenador
                $this->isActive = false;
                $this->server = "localhost";
                $this->user = "root";
                $this->password = "";
                $this->db = "dbcrudperson";
                break;
            default: //Hosting   
                $this->isActive = false;
                $this->server = "";
                $this->user = "";
                $this->password = "";
                $this->db = "";
            break;
        }
    }
}

?>