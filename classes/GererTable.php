<?php 
abstract class  GererTable
{
    private $name;
    private $size;

    public abstract function afficher();

    public abstract function ajouter();

    public abstract function modifier();

    public abstract function supprimer();

}
?>