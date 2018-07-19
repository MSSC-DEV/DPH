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
interface ISoucriptionoffre {
    public function addSouscription(int $offreid,int $integrationid,string $datesouscription,string $note, int $duree, string $datesous, int $expired):array;
    public function allSouscription():array;
    public function isExist(int $offreid,int $integrationid,int $datesouscription):bool;
    public function editSouscription(int $sousid, int $offreid,int $integrationid,string $datesouscription,string $note, int $duree, string $datesous, int $expired):array;
    public function getSouscriptionById(int $id):array;
    public function getSouscriptionByDateSous(string $date):array;
    public function getSouscriptionExpired():array;
    public function getSouscriptionByIntergationId(int $id):array;
}
