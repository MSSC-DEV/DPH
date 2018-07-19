<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Merchants
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/IMarchants.php');
require_once('ConnexionDB.php');
class Merchants extends ConnexionDB implements \IMarchants{
    
    public function addMarchant(string $firstname, string $lastname, string $email, string $phone, string $adress, string $password): array {
        $conn = $this->seconnecter();
        if($this->isExist($phone)){
            return ["Code"=>"180","Message"=>["FR"=>"Ce marchant existe déjà","EN"=>"This merchant exists already"]];
        }else{
            $add = $conn->prepare("insert into merchants(firstname,lastname,merchantemail,merchantphone,merchantadress,merchantpassword)values(?,?,?,?,?,?)");
            if($add->execute(array($firstname,$lastname,$email,$phone,$adress,$password))){
                return ["Code"=>"200","Message"=>["FR"=>"Marchant ajouté avec succès","EN"=>"Merchant successfuly added"]];
            }else{
                return ["Code"=>"201","Message"=>["FR"=>"Une erreur est survenue","EN"=>"Something went wrong adding merchant"]];
            }
        }
    }
    
    /**
     * 
     * @return array
     */
    public function allMarchants(): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->query("select * from merchants");
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
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param string $adress
     * @param string $password
     * @return array
     */
    public function editMerchant(int $id, string $firstname, string $lastname, string $email, string $phone, string $adress, string $password): array {
        $conn = $this->seconnecter();
        $edit = $conn->prepare("update merchants set firstname=?, lastname=?,merchantemail=?,merchantphone=?,merchantadress=?,merchantpassword=? where idmerchant=?");
        if($edit->execute(array($firstname,$lastname,$email,$phone,$adress,$password,$id))){
            return ["Code"=>"200","Message"=>["FR"=>"Marchant modifié avec succès","EN"=>"Merchant updated successfuly"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Echec Modification","EN"=>"Merchant update failed"]];
        }
    }

    /**
     * 
     * @param string $email
     * @return array
     */
    public function getMerchantByEmail(string $email): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from merchants where merchantemail=?");
        $get->execute(array($email));
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
     * @return array
     */
    public function getMerchantById(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from merchants where idmerchant=?");
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
     * @param string $owner
     * @return array
     */
    public function getMerchantByOwnerName(string $owner): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from merchants where firstname=? or lastname=?");
        $get->execute(array($owner,$owner));
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
     * @param string $phone
     * @return array
     */
    public function getMerchantByPhone(string $phone): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from merchants where merchantphone=?");
        $get->execute(array($phone));
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
     * @param string $phone
     * @return bool
     */
    public function isExist(string $phone): bool {
        $conn = $this->seconnecter();
        $check = $conn->prepare("select * from merchants where merchantphone=?");
        $check->execute(array($phone));
        if($check->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 
     * @param string $date
     * @return array
     */
    public function getMerchantByRegistrationDate(string $date):array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from merchants where date(registrationdate)=?");
        $get->execute(array($date));
        if($get->rowCount()<=0){
            return $response;
        }else{
            while($rep = $get->fetch(5)){
                $response[] = $rep;
            }
            return $response;
        }
    }

}

//use dph;
//$m = new Merchants();
//$ad = $m->addMarchant("Leis", "Mukinayi", "leis@seth.net", "242053070230", "40, rue Moukondo Mazala", md5("0000"));
//echo $ad["Code"]."<br>";
//echo $ad["Message"]["EN"];
//echo json_encode($m->getMerchantByRegistrationDate("2018-07-08"));
