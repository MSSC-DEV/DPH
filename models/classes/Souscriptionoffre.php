<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Souscriptionoffre
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/ISouscriptionoffre.php');
require_once('ConnexionDB.php');
class Souscriptionoffre extends ConnexionDB implements \ISoucriptionoffre{
    
    /**
     * 
     * @param int $offreid
     * @param int $integrationid
     * @param string $datesouscription
     * @param string $note
     * @param int $duree
     * @param string $datesous
     * @param int $expired
     * @return array
     */
    public function addSouscription(int $offreid, int $integrationid, string $datesouscription, string $note, int $duree, string $datesous, int $expired): array {
        $conn = $this->seconnecter();
        if($this->isExist($offreid, $integrationid, $expired)){
            return ["Code"=>"180","Message"=>["FR"=>"Cette souscription existe déjà","EN"=>"This subscription exist"]];
        }else{
            $set = $conn->prepare("insert souscription(offreid,integrationid,datesouscription,note,expired)values(?,?,?,?,?)");
            if($set->execute(array($offreid,$integrationid,$datesous,$note,$expired))){
                return ["Code"=>"200","Message"=>["FR"=>"Souscription effectué avec succès","EN"=>"Subscription successfully registered"]];
            }else{
                return ["Code"=>"201","Message"=>["FR"=>"Souscription échouée","EN"=>"Subscription failed"]];
            }
        }
    }

    /**
     * 
     * @return array
     */
    public function allSouscription(): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->query("select * from souscription as sous join offres as off on sous.offreid = off.idoffre  join integrations as int on sous.integrationid = int.idintegration join merchants as mer on mer.idmerchant = int.merchantid");
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
     * @param int $sousid
     * @param int $offreid
     * @param int $integrationid
     * @param string $datesouscription
     * @param string $note
     * @param int $duree
     * @param string $datesous
     * @param int $expired
     * @return array
     */
    public function editSouscription(int $sousid, int $offreid, int $integrationid, string $datesouscription, string $note, int $duree, string $datesous, int $expired): array {
        $conn = $this->seconnecter();
        $set = $conn->prepare("insert souscription set offreid=?,integrationid=?,datesouscription=?,note=?,expired=? where idsouscription=?");
        if($set->execute(array($offreid,$integrationid,$datesous,$note,$expired,$sousid))){
            return ["Code"=>"200","Message"=>["FR"=>"Souscription effectué avec succès","EN"=>"Subscription successfully registered"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Souscription échouée","EN"=>"Subscription failed"]];
        }
    }

    /**
     * 
     * @param string $date
     * @return array
     */
    public function getSouscriptionByDateSous(string $date): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from souscription as sous join offres as off on sous.offreid = off.idoffre  join integrations as int on sous.integrationid = int.idintegration join merchants as mer on mer.idmerchant = int.merchantid where date(sous.datesouscription)=?");
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

    /**
     * 
     * @param int $id
     * @return array
     */
    public function getSouscriptionById(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from souscription as sous join offres as off on sous.offreid = off.idoffre  join integrations as int on sous.integrationid = int.idintegration join merchants as mer on mer.idmerchant = int.merchantid where sous.idsouscription=?");
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
     * @param int $id
     * @return array
     */
    public function getSouscriptionByIntergationId(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from souscription as sous join offres as off on sous.offreid = off.idoffre  join integrations as int on sous.integrationid = int.idintegration join merchants as mer on mer.idmerchant = int.merchantid where sous.integrationid=?");
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
     * @return array
     */
    public function getSouscriptionExpired(): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->query("select * from souscription as sous join offres as off on sous.offreid = off.idoffre  join integrations as int on sous.integrationid = int.idintegration join merchants as mer on mer.idmerchant = int.merchantid where sous.expired=0");
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
     * @param int $offreid
     * @param int $integrationid
     * @param int $datesouscription
     * @return bool
     */
    public function isExist(int $offreid, int $integrationid, int $datesouscription): bool {
        $conn = $this->seconnecter();
        $isin = $conn->prepare("select * from souscription where offreid=? and integrationid=? and date(datesouscription)=?");
        $isin->execute(array($offreid,$integrationid,$datesouscription));
        if($isin->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

}
