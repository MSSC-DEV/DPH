<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Offreintegration
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/IOffreintegration.php');
require_once('ConnexionDB.php');
class Offreintegration extends ConnexionDB implements \IOffreintegration{
    
    /**
     * 
     * @param int $mobilemoneyid
     * @param float $monthlyprice
     * @param float $yearlyprice
     * @return array
     */
    public function addOffres(int $mobilemoneyid, float $monthlyprice, float $yearlyprice): array {
        $conn = $this->seconnecter();
        if($this->isExist($mobilemoneyid)){
            return ["Code"=>"180","Message"=>["FR"=>"Cette offre existe déjà","EN"=>"This offer exists already"]];
        }else{
            $set = $conn->prepare("insert into offres(mobilemoneyid,monthlyprice,yearlyprice)values(?,?,?)");
            if($set->execute(array($mobilemoneyid,$monthlyprice,$yearlyprice))){
                return ["Code"=>"200","Message"=>["FR"=>"Offre enregistrée avec succès","EN"=>"Offer saved successfuly"]];
            }else{
                return ["Code"=>"201","Message"=>["FR"=>"Erreur insertion offre","EN"=>"Oops! something went wrong"]];
            }
        }
    }

    /**
     * 
     * @return array
     */
    public function allOffres(): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->query("select * from offres join mobilemoneyapi on offres.mobilemoneyid = mobilemoneyapi.idmobilemoney");
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
     * @param int $mobilemoneyid
     * @param float $monthlyprice
     * @param float $yearlyprice
     * @return array
     */
    public function editOffre(int $id, int $mobilemoneyid, float $monthlyprice, float $yearlyprice): array {
            $conn = $this->seconnecter();
            $set = $conn->prepare("update offres set mobilemoneyid=?,monthlyprice=?,yearlyprice=? where idoffre=?");
            if($set->execute(array($mobilemoneyid,$monthlyprice,$yearlyprice,$id))){
                return ["Code"=>"200","Message"=>["FR"=>"Offre enregistrée avec succès","EN"=>"Offer saved successfuly"]];
            }else{
                return ["Code"=>"201","Message"=>["FR"=>"Erreur insertion offre","EN"=>"Oops! something went wrong"]];
            }
    }

    /**
     * 
     * @param int $id
     * @return array
     */
    public function getOffreByMobileMoneyId(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from offres join mobilemoneyapi on offres.mobilemoneyid = mobilemoneyapi.idmobilemoney where offres.mobilemoneyid=?");
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
     * @return array
     */
    public function getOffreByName(string $name): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from offres join mobilemoneyapi on offres.mobilemoneyid = mobilemoneyapi.idmobilemoney where mobilemoneyapi.mobilemoneyname=?");
        $get->execute(array($name));
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
     * @param int $mobilemoneyid
     * @return bool
     */
    public function isExist(int $mobilemoneyid): bool {
        $conn = $this->seconnecter();
        $isin = $conn->prepare("select * from offres where mobilemoneyid=?");
        $isin->execute(array($mobilemoneyid));
        if($isin->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

}
