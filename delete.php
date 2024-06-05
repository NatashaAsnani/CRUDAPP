<?php
require "classes/Database.php";
require "classes/User.php";
$conn = Database::db_connect();

$id = $_GET['id'];
    if(User::delete($conn, $id)){
        header("location: index.php");
    }
?>