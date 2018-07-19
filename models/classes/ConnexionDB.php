<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of ConnexionDB
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/ConnexionDB.php');
class ConnexionDB implements \ConnexionDB {
    private $host ="localhost";
    private $dbname ="digitalpaymenthub";
    private $username="root";
    private $dbpass="";
    private $connection;


//    public function __construct($host, $dbname, $username, $dbpass) {
//        $this->host = $host;
//        $this->dbname = $dbname;
//        $this->username = $username;
//        $this->dbpass = $dbpass;
//    }
    
    public function getHost() {
        return $this->host;
    }

    public function getDbname() {
        return $this->dbname;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getDbpass() {
        return $this->dbpass;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setDbname($dbname) {
        $this->dbname = $dbname;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setDbpass($dbpass) {
        $this->dbpass = $dbpass;
    }

    
    
    
    
    public function seconnecter(): \PDO {
        if($this->connection===null){
            $pdo = new \PDO("mysql:host={$this->getHost()};dbname={$this->getDbname()}", $this->getUsername(), $this->getDbpass());
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
            $this->connection = $pdo;
            
        }
        return $this->connection;
    }

}

//$db= new ConnexionDB();
//if($db->seconnecter()){
//    echo "ok";
//}else{
//    echo "Opppss";
//}


