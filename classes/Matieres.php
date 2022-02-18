<?php 
// include "conn.php";
require_once "GererTable.php";
class Matieres extends GererTable{
    public function __construct()
    {
        $this->nameTable = 'matieres';
        $this->columns = array('designation');
        $this->primaryKey = 'codeMat';
        parent::__construct($this->nameTable,$this->columns,$this->primaryKey);
    }
}