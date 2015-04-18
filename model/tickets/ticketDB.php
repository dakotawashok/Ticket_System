<?php
/* 
 connect to the ticket database
 */
$username = 'root';
$password = '';
try{
    $ticketconn = new PDO('mysql:host=localhost; dbname=tickets',
        $username, $password);
} catch (Exception $ex) {
    $errMsg = $ex->getMessage();
    include 'dberror.php';
    exit();
}
