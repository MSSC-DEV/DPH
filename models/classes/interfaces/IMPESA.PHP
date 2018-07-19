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
interface IMpesa {
    public function makeRequest(string $function, array $data, string $url);
}
