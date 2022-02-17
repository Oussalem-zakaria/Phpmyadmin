<?php 
include "../config/conn.php";
class  GererTable
{
    public function __construct()
    {
        
    }

    public static function afficher($nameTable)
    {
        $sql = "SELECT * FROM $nameTable";
        $req = connection()->query($sql);
        // $result = $req->fetchAll();
        return $req;
    }

    public  function ajouter($nameTable, array $dataArray)
    {

        $getColumnsKeys = array_keys($dataArray);
        $implodeColumnKeys = implode(",", $getColumnsKeys);

        $getValues = array_values($dataArray);
        $implodeValues = "'" . implode("','", $getValues) . "'";

        $qry = "insert into $nameTable (" . $implodeColumnKeys . ") values (" . $implodeValues . ")";
        $res = connection()->query($qry);
        return $res;

    }

   

    // public  function modifier($nameTable, array $rows,array $val)
    public  function modifier($nameTable, array $rows,array $val)
    {
        
        $query = "UPDATE $nameTable SET";
        $comma = " ";
        for($i=1;$i<count($rows);$i++) {
            if( ! empty($val)) {
                $query .= $comma . $rows[$i] . " = '" . (trim($val[$i])) . "'";
                $comma = ", ";
            }
        }
        $query .=" where ".$rows[0]."='" .$val[0]. "'";
        $res =  connection()->query($query);
        // $res = connection()->query($qry);
        return $res;
    }
    // modifier('classes',array('codeClasse','filiere','num'),array('C01','informatique',2));

    public static  function supprimer($nameTable,$row,$val)
    {
        $sql = "DELETE FROM $nameTable WHERE ".$row."=:id";
        $req=connection()->prepare($sql);
        $res = $req->execute([
            ':id' => $val,
        ]);
        return $res;
    }

    public function addData(array $data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $this->val[$i] = $data[$i];
        }
    }

}
?>