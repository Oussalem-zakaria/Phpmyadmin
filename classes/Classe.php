<?php 
// include "conn.php";
include "GererTable.php";
class Classe extends GererTable{
    public function __construct()
    {
        $this->nameTable = 'classes';
        $this->columns = array('filiere','num');
        $this->primaryKey = 'codeClasse';
        parent::__construct($this->nameTable,$this->columns,$this->primaryKey);
    }
}