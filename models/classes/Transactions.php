<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Transactions
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/ITransactions.php');
require_once('ConnexionDB.php');
class Transactions extends ConnexionDB implements \ITransactions{
    
    /**
     * 
     * @param int $integrationid
     * @param int $mobilemoneyapiid
     * @param string $invoicenumber
     * @param string $customername
     * @param string $customermsisdn
     * @param float $amount
     * @param string $datetimetrans
     * @param string $currency
     * @param string $transactionref
     * @return array
     */
    public function addTransaction(int $integrationid, int $mobilemoneyapiid, string $invoicenumber, string $customername, string $customermsisdn, float $amount, string $currency, string $transactionref): array {
        $conn = $this->seconnecter();
        $set = $conn->prepare("insert into transactions(integrationid,mobilemoneyid,invoicenumber,customermsisdn,amount,currency,transactionref,customername)values(?,?,?,?,?,?,?,?)");
        if($set->execute(array($integrationid,$mobilemoneyapiid,$invoicenumber,$customermsisdn,$amount,$currency,$transactionref,$customername))){
            return ["Code"=>"200","Message"=>["FR"=>"Transaction enregsitrée avec succès","EN"=>"Transaction succesfully saved"]];
        }else{
            return ["Code"=>"201","Message"=>["FR"=>"Echec enrefgistrement","EN"=>"oops! something went wrong"]];
        }
    }

    /**
     * 
     * @return array
     */
    public function allTransactions(): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->query("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid");
        $get->execute(array($customermsisdn));
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
    public function getTransactionByCurrency(string $name): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.currency =?");
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
     * @param string $name
     * @param int $intid
     * @return array
     */
    public function getTransactionByCurrencyandIntegrationId(string $name, int $intid): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.currency =? and transactions.transactionsid=?");
        $get->execute(array($name,$intid));
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
     * @param string $customermsisdn
     * @return array
     */
    public function getTransactionByCustomerMSISDN(string $customermsisdn): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.customermsisdn =?");
        $get->execute(array($customermsisdn));
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
     * @param string $customermsisdn
     * @param int $id
     * @return array
     */
    public function getTransactionByCustomerMSISDNandIntegrationId(string $customermsisdn, int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.customermsisdn =? and transactions.integrationid =?");
        $get->execute(array($customermsisdn,$intid));
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
     * @param string $date
     * @return array
     */
    public function getTransactionByDate(string $date): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where date(transactions.datetimetrans) =?");
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
     * @param string $date
     * @param int $intid
     * @return array
     */
    public function getTransactionByDateandIntegrationId(string $date, int $intid): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where date(transactions.datetimetrans) =? and transactions.integrationid =?");
        $get->execute(array($date,$intid));
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
    public function getTransactionByIntegrationId(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.integrationid =?");
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
    public function getTransactionByMobileMoneyId(int $id): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.mobilemoneyid =?");
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
     * @param int $mmid
     * @param int $intid
     * @return array
     */
    public function getTransactionByMobileMoneyIdandIntegrationId(int $mmid, int $intid): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.mobilemoneyid =? and transactions.integrationid =?");
        $get->execute(array($mmid,$intid));
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
     * @param string $ref
     * @return array
     */
    public function getTransactionByRef(string $ref): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.transactionref =?");
        $get->execute(array($ref));
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
     * @param string $ref
     * @param int $intid
     * @return array
     */
    public function getTransactionByRefandIntegrationId(string $ref, int $intid): array {
        $conn = $this->seconnecter();
        $response = array();
        $get = $conn->prepare("select * from transactions join integrations on integrations.idintegration = transactions.integrationid join mobilemoneyapi on mobilemoneyapi.idmobilemoney = transactions.mobilemoneyid where transactions.transactionref =? and transactions.integrationid =?");
        $get->execute(array($ref,$intid));
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
