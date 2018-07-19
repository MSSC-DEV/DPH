<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Typebusiness
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/ITypebusiness.php');
require_once('ConnexionDB.php');
class Typebusiness extends ConnexionDB implements \ITypebusiness{
    
    /**
     * 
     * @param string $type
     * @return array
     */
    public function addbusinesstype(string $type): array {
        $conn = $this->seconnecter();
        if($this->isExist($type)){
            return ["Code"=>"180","Message"=>["FR"=>"Ce type de business existe déjà","EN"=>"This type of business exist already in the system"]];
        }else{
            $add = $conn->prepare("insert into businesstype(type)values(?)");
            if($add->execute(array($type))){
               return ["Code"=>"200","Message"=>["FR"=>"Type de business ajouté avec succès","EN"=>"Business type added successfuly"]]; 
            }else{
                return ["Code"=>"201","Message"=>["FR"=>"Echec ajout","EN"=>"An error occured"]];
            }
        }
    }
    
    /**
     * 
     * @return array
     */
    public function allTypes(): array {
        $conn = $this->seconnecter();
        $response = array();
        $all = $conn->query("select * from businesstype");
        if($all->rowCount()<=0){
            return $response;
        }else{
            while($rep = $all->fetch(5)){
                $response[] = $rep;
            }
            return $response;
        }
    }
    
    /**
     * 
     * @param int $typeid
     * @param string $type
     * @return array
     */
    public function editType(int $typeid, string $type): array {
        $conn = $this->seconnecter();
        $edit = $conn->prepare("update businesstype set type=? where idbusinesstype=? ");
        if($edit->execute(array($type,$typeid))){
            return ["Code"=>"200","Message"=>["FR"=>"Type business modifié avec succès","EN"=>"Business type successfuly updated"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Echec modification","EN"=>"Update failed"]];
        }
    }

    /**
     * 
     * @param int $id
     * @return array
     */
    public function getTypeById(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $all = $conn->prepare("select * from businesstype where idbusinesstype=?");
        $all->execute(array($id));
        if($all->rowCount()<=0){
            return $response;
        }else{
            while($rep = $all->fetch(5)){
                $response[] = $rep;
            }
            return $response;
        }
        
    }
    
    /**
     * 
     * @param string $type
     * @return bool
     */
    public function isExist(string $type): bool {
        $conn = $this->seconnecter();
        $check = $conn->prepare("select * from businesstype where type=?");
        $check->execute(array($type));
        if($check->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

}

//use dph;
//$d = new Typebusiness();
//$dd = $d->editType(1,"Medicale");
//echo $dd['Message']['FR'];

