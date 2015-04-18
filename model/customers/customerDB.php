<?php
/* 
 connect to the customers database
 */
$username = 'root';
$password = '';
try{
    $customersconn = new PDO('mysql:host=localhost; dbname=customers',
        $username, $password);
} catch (Exception $ex) {
    $errMsg = $ex->getMessage();
    include 'dberror.php';
    exit();
}

