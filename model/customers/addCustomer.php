<?php
    // Add the customer to the database/check to see if they're already in the database
    require 'customerDB.php';
    require_once 'CustomerFunctions.php';

    $action = filter_input(INPUT_POST, 'action');
    // if the form has run, and been filled out, it will go through and enter the customer,
    // else it won't run and will just go back to the index.
    if ($action == NULL)  {
        echo 'ACTION WASS NULL <br>';
    } else {
        // These three variables are required input from the user
        $nameFirst = filter_input(INPUT_POST, 'nameFirst');
        $nameLast = filter_input(INPUT_POST, 'nameLast');
        $phoneNumber = filter_input(INPUT_POST, 'phoneNumber');

        $streetAddress = filter_input(INPUT_POST, 'streetAddress');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        
        $customerArray = [NULL, $nameFirst, $nameLast, $phoneNumber, $streetAddress, $city, $state];

        if ($nameFirst == NULL || $nameFirst == FALSE || 
            $nameLast == NULL || $nameLast == FALSE ||
            $phoneNumber == NULL || $phoneNumber == FALSE) {
                echo 'Invalid parameters: Please enter the required fields(ADDCUSTOMER.PHP)<br>';
            } else {
		$customer = existingCustomer($customerArray);
				
                if( $customer == -1){
                    insertCustomer($nameFirst, $nameLast, $phoneNumber, $streetAddress, $city, $state);
                    $customer = existingCustomer($customerArray);
                    header('Location: customerInfo' . '.php' . '?primkey=' . $customer['primkey']);
                } elseif ($customer != -1 && $action = 'editCustomer'){
                    $customerArray[0] = $customer['primkey'];
                    editCustomer($customerArray);
                    header('Location: customerInfo' . '.php' . '?primkey=' . $customer['primkey']);          	          
                }
        }
    }
