<?php
/* 
 connect to the categories database
 */
$username = 'root';
$password = '';
try{
    $categoriesconn = new PDO('mysql:host=localhost; dbname=categories',
        $username, $password);
} catch (Exception $ex) {
    $errMsg = $ex->getMessage();
    include '../dberror.php';
    exit();
}