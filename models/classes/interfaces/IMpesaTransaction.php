<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/**
 *
 * @author EXACT-IT-DEV
 */
interface IMpesaTransaction{
    public function MakeLogin();
    public function MakeC2B(array $data);
    public function MakeB2C(array $data);
    public function processRequest(string $function,array $data);
    public function getInJsonFormat($data);
}
