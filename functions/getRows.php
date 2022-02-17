<?php
function getRows($table)
{
    $sql2 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = Database() AND TABLE_NAME = '$table'";
    $req2 = connection()->query($sql2)->fetchAll();
    $rows = array();
    foreach ($req2 as $key => $value) {
        array_push($rows, $value[0]);
    }
    return $rows;
}

?>
