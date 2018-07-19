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
interface IMarchants {
    public function addMarchant(string $firstname,string $lastname, string $email, string $phone, string $adress,string $password): array;
    public function allMarchants():array;
    public function isExist(string $phone):bool;
    public function getMerchantByRegistrationDate(string $date):array;
    public function getMerchantById(int $id):array;
    public function getMerchantByPhone(string $phone):array;
    public function getMerchantByEmail(string $email):array;
    public function getMerchantByOwnerName(string $owner):array;
    public function editMerchant(int $id,string $firstname,string $lastname, string $email, string $phone, string $adress, string $password):array;
    
}
