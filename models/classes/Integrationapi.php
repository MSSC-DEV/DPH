<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Integrationapi
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/IIntegrationsapi.php');
require_once('ConnexionDB.php');
class Integrationapi extends ConnexionDB implements \IIntegrationsapi{
    
    /**
     * 
     * @param int $merchantid
     * @param string $businessname
     * @param string $domainename
     * @param int $businesstypeid
     * @param string $successpage
     * @param string $failurepage
     * @return string
     */
    public function addIntegration(int $merchantid, string $businessname, string $domainename, int $businesstypeid, string $successpage, string $failurepage): array {
        $conn = $this->seconnecter();
        if($this->isExist($domainename)){
            return ["Code"=>"180","Message"=>["FR"=>"Cette integration existe déjà","EN"=>"This merchant integration exists already"]];
        }else{
            $set = $conn->prepare("insert into integrations set merchantid=?,businessname=?,domainename=?,businesstypeid=?,successpage=?,failurepage=?");
        if($set->execute(array($merchantid,$businessname,$domainename,$businesstypeid,$successpage,$failurepage))){
           return ["Code"=>"200","Message"=>["FR"=>"Integration marchand effectuée avec succès","EN"=>"Merchant integration added successfuly"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Oups! une erreur est survenue","EN"=>"Oops! something went wrong"]];
        } 
        }
    }

    /**
     * 
     * @return array
     */
    public function allIntegrations(): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->query("select * from integrations join merchants on merchants.idmerchant = integrations.merchantid join businesstype on integrations.businesstypeid = businesstype.idbusinesstype");
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
     * @param string $key
     * @return array
     */
    public function assignMerchantKey(int $id, string $key): array {
        $conn = $this->seconnecter();
        $set = $conn->prepare("update integrations set merchantkey=? where idintegration=?");
        if($set->execute(array($key,$id))){
            return ["Code"=>"200","Message"=>["FR"=>"Clé marchand attribué avec succès","EN"=>"Merchant key successfuly added"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Oups! une erreur est survenue","EN"=>"Oops! something went wrong"]];
        }
    }
    
    /**
     * 
     * @param int $integrationid
     * @param int $merchantid
     * @param string $businessname
     * @param string $domainename
     * @param int $businesstypeid
     * @param string $successpage
     * @param string $failurepage
     * @param string $merchantkey
     * @return array
     */
    public function editIntegration(int $integrationid, int $merchantid, string $businessname, string $domainename, int $businesstypeid, string $successpage, string $failurepage,string $merchantkey): array {
        $conn = $this->seconnecter();
        $set = $conn->prepare("update integrations set merchantid=?,businessname=?,domainename=?,businesstypeid=?,successpage=?,failurepage=?,merchantkey=? where idintegration=?");
        if($set->execute(array($merchantid,$businessname,$domainename,$businesstypeid,$successpage,$failurepage,$merchantkey,$integrationid))){
           return ["Code"=>"200","Message"=>["FR"=>"Integration marchand modifiée avec succès","EN"=>"Merchant integration updated successfuly"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Oups! une erreur est survenue","EN"=>"Oops! something went wrong"]];
        } 
        
    }
    
    /**
     * 
     * @param string $name
     * @return array
     */
    public function getIntegrationByBusinessName(string $name): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from integrations join merchants on merchants.idmerchant = integrations.merchantid join businesstype on integrations.businesstypeid = businesstype.idbusinesstype where integrations.businessname=?");
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
     * @param int $id
     * @return array
     */
    public function getIntegrationByBusinessTypeId(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from integrations join merchants on merchants.idmerchant = integrations.merchantid join businesstype on integrations.businesstypeid = businesstype.idbusinesstype where integrations.businesstypeid=?");
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
    public function getIntegrationById(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from integrations join merchants on merchants.idmerchant = integrations.merchantid join businesstype on integrations.businesstypeid = businesstype.idbusinesstype where integrations.idintegration=?");
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
     * @param int $merchantid
     * @return array
     */
    public function getIntegrationByMerchantId(int $merchantid): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from integrations join merchants on merchants.idmerchant = integrations.merchantid join businesstype on integrations.businesstypeid = businesstype.idbusinesstype where integrations.merchantid=?");
        $get->execute(array($merchantid));
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
     * @param string $merchantkey
     * @return array
     */
    public function getIntegrationByMerchantKey(string $merchantkey): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from integrations join merchants on merchants.idmerchant = integrations.merchantid join businesstype on integrations.businesstypeid = businesstype.idbusinesstype where integrations.merchantkey=?");
        $get->execute(array($merchantkey));
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
     * @param string $domainename
     * @return bool
     */
    public function isExist(string $domainename): bool {
        $conn = $this->seconnecter();
        $check = $conn->prepare("select * from integrations where domainename=?");
        $check->execute(array($domainename));
        if($check->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

}

use dph;
$i = new Integrationapi();
//$ir = $i->editIntegration(1,1, "MSSC", "mssc.cd", 1,"mssc.cd/success.php", "mssc.cd/failure.php","","");
//$ir = $i->assignMerchantKey(1, md5("mssc.cd"));
//echo $ir["Code"]."<br>";
//echo $ir["Message"]["FR"];
//echo json_encode($i->allIntegrations());

