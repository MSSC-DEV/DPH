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
interface IMobilemoneyapi {
    public function addMobileMoneyAPI(string $reseau):array;
    public function allMobileMoney():array;
    public function getMobileMoneyById(int $id):array;
    public function editMobileMoney(int $id, string $name):array;
    public function isExist(string $name):bool;
}
