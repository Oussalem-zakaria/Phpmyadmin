<?php 
// include "conn.php";
include "GererTable.php";
class Classe extends GererTable{
    private $codeClasse;
    private $filiere;
    private $num;

    public function getcodeClasse()
    {
        return $this->codeClasse;
    }

    public function getFiliere()
    {
        return $this->filiere;
    }

    public function getNum()
    {
        return $this->num;
    }

    public function __construct($filiere,$num,$codeClasse)
    {
        $this->codeClasse = $codeClasse;
        $this->filiere = $filiere;
        $this->num = $num;
    }
}