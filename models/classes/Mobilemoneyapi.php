<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Mobilemoneyapi
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/IMobilemoneyapi.php');
require_once('ConnexionDB.php');
class Mobilemoneyapi extends ConnexionDB implements \IMobilemoneyapi{
    
    /**
     * 
     * @param string $reseau
     * @return array
     */
    public function addMobileMoneyAPI(string $reseau): array {
        $conn = $this->seconnecter();
        if($this->isExist($reseau)){
            return ["Code"=>"180","Message"=>["FR"=>"Ce service existe déjà","EN"=>"This service already exists"]];
        }else{
            $set = $conn->prepare("update mobilemoneyapi set mobilemoneyname=? where idmobilemoney=?");
            if($set->execute(array($name,$id))){
                return ["Code"=>"200","Message"=>["FR"=>"Modification mobile money effectué avec succès","EN"=>"Mobile Money successfuly updated"]];
            }else{
                return ["Code"=>"201","Message"=>["FR"=>"Echec modification","EN"=>"Oops! something went wrong"]];
            }
        }
    }
    
    
    /**
     * 
     * @return array
     */
    public function allMobileMoney(): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->query("select * from mobilemoneyapi");
        if($get->rowCount()<=0){
            return $response;
        }else{
            while($rep = $get->fetch(5)){
                $response[] = $rep;
            }
            return $response;
        }
    }
    
    /**
     * 
     * @param int $id
     * @param string $name
     * @return array
     */
    public function editMobileMoney(int $id, string $name): array {
        $conn = $this->seconnecter();
        $set = $conn->prepare("update mobilemoneyapi set mobilemoneyname=? where idmobilemoney=?");
        if($set->execute(array($name,$id))){
            return ["Code"=>"200","Message"=>["FR"=>"Modification mobile money effectué avec succès","EN"=>"Mobile Money successfuly updated"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Echec modification","EN"=>"Oops! something went wrong"]];
        }
    }

    /**
     * 
     * @param int $id
     * @return array
     */
    public function getMobileMoneyById(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from mobilemoneyapi where idmobilemoney=?");
        $get->execute(array($id));
        if($get->rowCount()<=0){
            return $response;
        }else{
            while($rep = $get->fetch(5)){
                $response[] = $rep;
            }
            return $response;
        }
    }
    
    /**
     * 
     * @param string $name
     * @return bool
     */
    public function isExist(string $name): bool {
        $conn = $this->seconnecter();
        $isin = $conn->prepare("select * from mobilemoneyapi where mobilemoneyname=?");
        $isin->execute(array($name));
        if($isin->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

}
