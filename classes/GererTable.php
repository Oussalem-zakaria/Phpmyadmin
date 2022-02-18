<?php 
include "../config/conn.php";
class  GererTable
{
    protected $nameTable;
    protected $columns = array();
    protected $primaryKey;

    public function __construct($nameTable,$columns,$primaryKey)
    {
        $this->nameTable = $nameTable;
        $this->columns = $columns;
        $this->primaryKey = $primaryKey;
    }

    public function afficher()
    {
        $sql = "SELECT * FROM ".$this->nameTable."";
        $req = connection()->query($sql);
        return $req;

    }
    

    public  function ajouter(array $dataArray)
    {

        $Values = "'" . implode("','", $dataArray) . "'";
        $Keys = "" . implode(",", $this->columns) . "";
        $qry = "insert into $this->nameTable (" . $this->primaryKey . "," . $Keys . ") values (" . $Values . ")";
        $res = connection()->query($qry);
        return $res;

    }

    public  function modifier(array $val,$primaryKey)
    {
        
        $query = "UPDATE $this->nameTable SET";
        $comma = " ";
        for($i=0;$i<count($val);$i++) {
            if( ! empty($val)) {
                $query .= $comma . $this->columns[$i] . " = '" . (trim($val[$i])) . "'";
                $comma = ", ";
            }
        }
        $query .=" where ".$this->primaryKey."='".$primaryKey."'";
        $res =  connection()->query($query);
        return $res;
    }

    public  function supprimer($primaryKey)
    {
        $sql = "DELETE FROM $this->nameTable WHERE $this->primaryKey=:id";
        $req=connection()->prepare($sql);
        $res = $req->execute([
            ':id' => $primaryKey,
        ]);
        return $res;
    }

}
?>