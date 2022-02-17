<?php
function connection(){
    $user = "root";
    $db = "gestionnotes";
    $server = "localhost";
    $paswrd = "";
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $paswrd);
    
    return $conn;
}

?>