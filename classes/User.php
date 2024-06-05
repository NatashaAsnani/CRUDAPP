<?php

class User
{
    public static function insert($conn, $name, $email, $password){
        $sql = "INSERT INTO users (name , email, password) VALUES (? , ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        if(mysqli_stmt_execute($stmt)){
            return true;
        }
        else{
            return false;
        }
    }


    // showall
    public static function showAll($conn){
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // showOne
    public static function showOne($conn, $id){
        $sql = "SELECT * FROM users where id  = $id ";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }


    // update
    public static function update($conn, $id, $name, $email, $password){
        $sql = "UPDATE users SET name = ?, email =?, password = ? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $id);
        if(mysqli_stmt_execute($stmt)){
            return true;
        }
        else{
            return false;
        }
    }


    // delete
    public static function delete($conn, $id){
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)){
            return true;
        }
        else{
            return false;
        }
    }


    // auth
    public static function auth($conn, $email, $password){
        $sql = "SELECT * FROM users WHERE email=? AND password=? ";
        $stmt= mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_assoc($result);
        }
    }
} 