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
interface ITransactions {
    public function addTransaction(int $integrationid, int $mobilemoneyapiid, string $invoicenumber, string $customername, string $customermsisdn, float $amount,string $currency, string $transactionref):array;
    public function allTransactions():array;
    public function getTransactionByMobileMoneyId(int $id):array;
    public function getTransactionByMobileMoneyIdandIntegrationId(int $mmid,int $intid):array;
    public function getTransactionByIntegrationId(int $id):array;
    public function getTransactionByCurrency(string $name):array;
    public function getTransactionByCurrencyandIntegrationId(string $name, int $intid):array;
    public function getTransactionByCustomerMSISDN(string $customermsisdn):array;
    public function getTransactionByCustomerMSISDNandIntegrationId(string $customermsisdn,int $id):array;
    public function getTransactionByDate(string $date):array;
    public function getTransactionByDateandIntegrationId(string $date, int $intid):array;
    public function getTransactionByRef(string $ref):array;
    public function getTransactionByRefandIntegrationId(string $ref, int $intid):array;
}
