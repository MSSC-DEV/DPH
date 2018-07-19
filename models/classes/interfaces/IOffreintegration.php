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
interface IOffreintegration {
    public function addOffres(int $mobilemoneyid, float $monthlyprice, float $yearlyprice):array;
    public function allOffres():array;
    public function getOffreByMobileMoneyId(int $id):array;
    public function getOffreByName(string $name):array;
    public function isExist(int $mobilemoneyid):bool;
    public function editOffre(int $id,int $mobilemoneyid, float $monthlyprice, float $yearlyprice):array;
    
}
