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
interface ITypebusiness {
    public function addbusinesstype(string $type):array;
    public function isExist(string $type):bool;
    public function allTypes():array;
    public function editType(int $typeid, string $type):array;
    public function getTypeById(int $id):array;
}
