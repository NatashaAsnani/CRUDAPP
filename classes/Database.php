<?php
class Database
{
    public static function db_connect(){
        $conn = mysqli_connect("localhost", "root", "", "dbmss");
        return $conn;
    }
}