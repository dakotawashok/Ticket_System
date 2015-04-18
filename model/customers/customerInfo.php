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
            <fieldset>
                <legend>Customer Info</legend>
                <table>
                    <tr>
                        <td><b>First Name: </b><?php echo $customer['nameFirst']?></td>
                        <td><b>Last Name: </b><?php echo $customer['nameLast']?></td>
                        <td><b>Phone Number: </b><?php echo $customer['phoneNumber']?></td>
                    </tr>
                    <tr>
                        <td><b>Address: </b><?php echo $customer['streetAddress'];?></td>
                        <td><b>City: </b><?php echo $customer['city'];?></td>
                        <td><b>State: </b><?php echo $customer['state'];?></td>
                    </tr>
                    <tr>
                        <td><form action="editCustomerForm.php" method="get">
                                <input type="submit" name="editCustomer" value="Edit Customer">
                                <input type="hidden" name="primkey" value="<?php echo $customer['primkey'];?>">
                            </form></td>
                            <td><form action="../tickets/ticketCreateForm.php" method="get">
                                <input type="submit" name="createTicket" value="Create New Ticket">
                                <input type="hidden" name="primkey" value="<?php echo $customer['primkey'];?>">
                            </form></td>    
                    </tr>
                    
                </table>
            </fieldset>                        
        </main>
    </body>
</html>