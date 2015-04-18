<?php
require 'customerDB.php';
require_once 'CustomerFunctions.php';

$action = filter_input(INPUT_POST, 'action');
$key = filter_input(INPUT_POST, 'deleteCustomer');

if (is_numeric($action) ) {
    $customer = existingCustomer($key);
    $message = deleteCustomer($customer);;
    if ($message == -1) {
        $message = 'Customer was not deleted successfully: Customer doesn\'t exist in database';
    } else {
        $message = 'Customer deleted successfully!';
    }	
} else {
    $message = '';
}
header('Location: customersDisplayForm.php');