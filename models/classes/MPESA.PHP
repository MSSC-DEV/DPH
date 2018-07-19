<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dph;

/**
 * Description of Mpesa
 *
 * @author EXACT-IT-DEV
 */
require_once('interfaces/IMpesa.php');
class Mpesa implements \IMpesa{
    
    /**
     * 
     * @param string $function
     * @param array $data
     * @param string $url
     * @return type
     */
    public function makeRequest(string $function, array $data, string $url) {
        $client = new SoapClient($url);
        try {
            $headers = array();
            foreach($data['headers'] as $key => $value){
                $headers[] = new SoapHeader('http://www.4cgroup.co.za/soapauth', $key, $value);
            }

            $client->__setSoapHeaders($headers);

            $result = $client->__soapCall($function, ['Request' => $data['params']]);

            return $result ?: null;
        } catch (\Exception $e) {
            
            return $e->getMessage();
        }
    }

}
