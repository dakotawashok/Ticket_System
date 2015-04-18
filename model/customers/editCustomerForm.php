<?php
include_once 'customerDB.php';
include 'CustomerFunctions.php';
$key = filter_input(INPUT_GET, 'primkey');

$sql = "SELECT * FROM information WHERE primkey = :key";
$statement = $customersconn->prepare($sql);
$statement->bindValue(':key', $key);
$statement->execute();
$customer = $statement->fetch();
$statement->closeCursor();

if ($customer == false ) { 
    echo 'Customer entered was not valid: try again';
}

?>

<!DOCTYPE html>
<html>
    <head>
            <title>Programming Project 01</title>
            <link rel="stylesheet" type="text/css" href="../../main.css">
    </head>
	
    <div>
    <fieldset id="leftColumn">
        <legend>Contents</legend>
        <a href="customersDisplayForm.php">Customers</a><br><br>
			<a href="../../index.php">Add Customer</a><br>
            <a href="../categories/brandsDisplayForm.php">Brands</a><br>
            <a href="../categories/modelDisplayForm.php">Models</a><br>
            <a href="../categories/OSDisplayForm.php">Operating Systems</a><br>
            <a href="../categories/typesDisplayForm.php">Hardware Types</a><br>
            <a href="../categories/ticketTypeDisplayForm.php">Ticket Types</a><br>
            <a href="../categories/ticketStatusDisplayForm.php">Ticket Status'</a><br>
    </fieldset>
    </div>
    
    <body>
        <main>
            <form action="addCustomer.php" method="post">
                <fieldset>
                    <legend>Customer Info</legend>
                    <input type="text" name="nameFirst" value="<?php echo $customer['nameFirst'];?>">
                    <input type="text" name="nameLast" value="<?php echo $customer['nameLast']?>">
                    <input type="text" name="phoneNumber" value="<?php echo $customer['phoneNumber']?>"> 

                    <br>

                    <input type="text" name="streetAddress" value="<?php echo $customer['streetAddress'];?>">
                    <input type="text" name="city" value="<?php echo $customer['city'];?>">
                    <input type="text" name="state" value="<?php echo $customer['state'];?>">

                    <br>
                    <br>
                </fieldset>
                <input type="hidden" name="action" value="editCustomer">
                <input type="submit" name="go" value="Edit Customer">                
            </form>            
        </main>
    </body>
</html>