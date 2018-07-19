<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of MpesaTransaction
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/IMpesaTransaction.php');
class MpesaTransaction implements \IMpesaTransaction{
    protected $url;
    protected $speedPayUrl;
    protected $username;
    protected $password;
    protected $callbackUrl;
    
    public function __construct() {
        $this->url          = "http://41.78.195.169:8097/insight/SOAPIn?wsdl";
        $this->username     = "exactit";
        $this->password     = "exactit";
        $this->callbackUrl  = "http://160.119.248.39/gateway-rdc/public/test/result_dump.php";
    }

    
    /**
     * 
     * @param array $data
     */
    public function MakeB2C(array $data) {
        $login = $this->MakeLogin();
        $token = (isset($login->dataItem->name) && $login->dataItem->name == 'SessionID') ? $login->dataItem->value : null;

        if ($token) {
            
            $headers = [
                'Token'     => $token,
                'EventID'   => 12001
            ];

            $params['dataItem'] = 
            [
                ['name' => 'ServiceProviderName', 'type' => 'String', 'value' => 'EXACTIT'],
                ['name' => 'CustomerMSISDN', 'type' => 'String', 'value' => $donne['customermsisdn']],
                ['name' => 'Currency', 'type' => 'String', 'value' => $donne['monnaie']],
                ['name' => 'Amount', 'type' => 'String', 'value' => $donne['montant']],
                ['name' => 'TransactionDateTime', 'type' => 'Date', 'value' => date('YmdHis')],
                ['name' => 'Shortcode', 'type' => 'String', 'value' => '15058'],
                ['name' => 'Language', 'type' => 'String', 'value' => $donne['langue']],
                ['name' => 'ThirdPartyReference', 'type' => 'String', 'value' => 'EXACTITB2C'.substr(time(), 4)],
                ['name' => 'CallBackChannel', 'type' => 'String', 'value' => '2'],
                ['name' => 'CallBackDestination', 'type' => 'String', 'value' => 'http://160.119.248.39/gateway-rdc/public/test/credit_dump.php'],
                ['name' => 'CommandId', 'type' => 'String', 'value' => 'InitTrans_one4allb2c']
                /*['name' => 'InitiatorIdentifier', 'type' => 'String', 'value' => 'exactit'],
                ['name' => 'SecurityCredential', 'type' => 'String', 'value' => 'exactit']
                ['name' => 'CustomerAccountNumber', 'type' => 'String', 'value' => $donne['customermsisdn']],*/
            ];

            $data = [
                'headers' => $headers,
                'params' => $params
            ];
            
            return $this->processRequest('getGenericResult', $data);
            
        }



        return "Un problème a survenu";
    }
    
    /**
     * 
     * @param array $data
     */
    public function MakeC2B(array $data) {
        $login = $this->MakeLogin();
        $token = (isset($login->dataItem->name) && $login->dataItem->name == 'SessionID') ? $login->dataItem->value : null;

        if ($token) {
            $headers = [
                'Token'     => $token,
                'EventID'   => 80049
            ];

            $params['dataItem'] = 
            [
                ['name' => 'CustomerMSISDN', 'type' => 'String', 'value' => $donne['customermsisdn']],
                ['name' => 'ServiceProviderCode', 'type' => 'String', 'value' => '8337'],
                ['name' => 'Currency', 'type' => 'String', 'value' => $donne['monnaie']],
                ['name' => 'Amount', 'type' => 'String', 'value' => $donne['montant']],
                ['name' => 'Date', 'type' => 'String', 'value' => date('Y-m-d H:i:s')],
                ['name' => 'ThirdPartyReference', 'type' => 'String', 'value' => substr(time(), 4)],
                ['name' => 'CommandId', 'type' => 'String', 'value' => 'InitTrans_oneForallC2B'],
                /*['name' => 'CommandId', 'type' => 'String', 'value' => 'InitTrans_oneForallC2B'],*/
                ['name' => 'Language', 'type' => 'String', 'value' => $donne['langue']],
                ['name' => 'Surname', 'type' => 'String', 'value' => $donne['surname']],
                ['name' => 'Initials', 'type' => 'String', 'value' => $donne['initials']],
                ['name' => 'CallBackChannel', 'type' => 'String', 'value' => $donne['callbackchannel']],
                ['name' => 'CallBackDestination', 'type' => 'String', 'value' => $donne['callbackdestination']]
            ];

            $data = [
                'headers' => $headers,
                'params' => $params
            ];

            return $this->processRequest('getGenericResult',  $data);
        }

        return "une erreur est survenue";
    }
    
    /**
     * 
     */
    public function MakeLogin() {
        $headers = ['EventID' => 2500];

        $params['dataItem'] = [
            ['name' => 'Username', 'type' => 'String', 'value' => $this->username],
            ['name' => 'Password', 'type' => 'String', 'value' => $this->password]
        ];

        $data = [
            'headers' => $headers,
            'params' => $params
        ];
        $mpesa = new \dph\Mpesa();
        $response = $mpesa->makeRequest('getGenericResult', $data, $this->url);

        return  ($response->eventInfo->code == 3) ? $response->response : $response->eventInfo;
    }
    
    /**
     * 
     * @param string $function
     * @param array $data
     * @return type
     */
    public function processRequest(string $function,array $data){
        try {
            
            $mpesa = new \dph\Mpesa();
            $response = $mpesa->makeRequest($function, $data, $this->url);
     
            return $response;
            
        } catch (Exception $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /**
     * 
     * @param type $data
     * @return type
     */
    public function getInJsonFormat($data){
        return json_encode($data);
    }

}
