<?php

class Database{
    public static function newConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "manag";
        $conn = new mysqli($servername, $username, $password, $dbname);
        return $conn;
    }
}

?>