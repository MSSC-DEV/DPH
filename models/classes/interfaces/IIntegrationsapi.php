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
interface IIntegrationsapi {
    public function addIntegration(int $merchantid, string $businessname, string $domainename, int $businesstypeid, string $successpage, string $failurepage):array;
    public function allIntegrations():array;
    public function assignMerchantKey(int $id, string $key):array;
    public function isExist(string $domainename):bool;
    public function getIntegrationById(int $id):array;
    public function getIntegrationByMerchantId(int $merchantid):array;
    public function editIntegration(int $integrationid,int $merchantid, string $businessname, string $domainename, int $businesstypeid, string $successpage, string $failurepage,string $merchantkey):array;
    public function getIntegrationByBusinessName(string $name):array;
    public function getIntegrationByMerchantKey(string $merchantkey):array;
    public function getIntegrationByBusinessTypeId(int $id):array;
}
