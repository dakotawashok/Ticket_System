<?php
// This function gets either a customer array,primkey, or customer object and determines if there is a matching record in the database
function existingCustomer($var) {

    global $customersconn;
    
    if (is_array($var)) {
       if (count($var) > 0) {
            $chquery = 'SELECT * FROM customers.information ' .
                        'WHERE nameFirst=:fn AND nameLast=:ln AND phoneNumber=:pn';
            $statement = $customersconn->prepare($chquery);
            $statement->bindValue(':fn', $var[1]);
            $statement->bindValue(':ln', $var[2]);
            $statement->bindValue(':pn', $var[3]);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            if($result == NULL || count($result) == 0){
                return -1;
            }
            else{
                return $result;
            }
       } else {
           echo 'The array that was input wasn\'t good<br>';
       }
       
    } elseif (is_numeric($var)) {
        $chquery = 'SELECT * FROM customers.information WHERE primkey=:pk';
        $statement = $customersconn->prepare($chquery);
        $statement->bindValue(':pk', (int)$var);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        if($result == NULL || count($result) == 0){
            return -1;
        }
        else{
            return $result;
        }
    } elseif (is_object($var)) {
        $chquery = 'SELECT * FROM customers.information WHERE primkey=:pk';
        $statement = $customersconn->prepare($chquery);
        $statement->bindValue(':pk', $var->getPrimkey());
        $result = $statement->fetch();
        $statement->closeCursor();
        if($result == NULL || count($result) == 0){
            return -1;
        }
        else{
            return $result;
        }
    }

}
// Gets a customer array, checks to see if the customer exists, if it does: delete it and return a 1 for complete
// if it does not exist, return a -1 
function deleteCustomer($customer) {
    global $customersconn;

    if ($customer == -1) {
        return 'Customer does not exist.';
    } else {
        $primkey = $customer['primkey'];
        $sql = 'DELETE FROM customers.information WHERE primkey=:pk';
        $statement = $customersconn->prepare($sql);
        $statement->bindValue(':pk', $primkey);
        $statement->execute();
        $statement->closeCursor();
        return 1;
    }
}

function insertCustomer($fn, $ln, $pn, $streetAdd, $cty, $stt) {
    global $customersconn;

    $query = 'INSERT INTO customers.information (nameFirst, nameLast, phoneNumber, streetAddress, city, state) ' . 
            'VALUES (:fn, :ln, :pn, :streetAdd, :cty, :stt)';
    $statement = $customersconn->prepare($query);
    $statement->bindValue(':fn', $fn);
    $statement->bindValue(':ln', $ln);
    $statement->bindValue(':pn', $pn);
    $statement->bindValue(':streetAdd', $streetAdd);
    $statement->bindValue(':cty', $cty);
    $statement->bindValue(':stt', $stt);

    $statement->execute();
    $statement->closeCursor();
}

function getInfoCustomer($key) {
    global $customersconn;

    $sql = "SELECT * FROM `customers.information` WHERE `key` = `:key`";
    $statement = $customersconn->prepare($sql);
    $statement->bindValue(':key', $key);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();

    return $customer;
}


// editCustomer gets a customer array, makes the variables from that array for ease of use, then updates the customers.information
// table with the information that was passed to the function. it Returns a string of the statement for debugging purposes.
function editCustomer($customer) {
    global $customersconn;
    global $message;

    $nF = $customer[1];
    $nL = $customer[2];
    $pN = $customer[3];
    $sA = $customer[4];
    $city = $customer[5];
    $state = $customer[6];
    $primkey = $customer[0];

    $sql = "UPDATE customers.information SET nameFirst=:nF, nameLast=:nL, phoneNumber=:pN, " . 
           "streetAddress=:sA, city=:city, state=:state WHERE primkey=:primkey";

    $statement = $customersconn->prepare($sql);
    $statement->bindValue(':nF', $nF);
    $statement->bindValue(':nL', $nL);
    $statement->bindValue(':pN', $pN);
    $statement->bindValue(':sA', $sA);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':primkey', $primkey);

    $statement->execute();
    // for debugging puproses
    $message = $statement->fetch();

    $statement->closeCursor();
}