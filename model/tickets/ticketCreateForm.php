<?php
include_once 'ticketDB.php';
include_once "../customers/customerDB.php";
include_once "../categories/categoriesDB.php";

include 'TicketFunctions.php';
$customerkey = filter_input(INPUT_GET, 'primkey');

$sql = "SELECT * FROM information WHERE primkey=:key";
$statement = $customersconn->prepare($sql);
$statement->bindValue(':key', $customerkey);
$statement->execute();
$customer = $statement->fetch();
$statement->closeCursor();

$sql = "SELECT * FROM categories.tickettypes";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$tickettypes = $statement->fetchAll();
$statement->closeCursor();

$sql = "SELECT * FROM categories.statustypes";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$statuses = $statement->fetchAll();
$statement->closeCursor();

$sql = "SELECT * FROM categories.models";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$models = $statement->fetchAll();
$statement->closeCursor();

$sql = "SELECT * FROM categories.operatingsystems";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$operatingsystems = $statement->fetchAll();
$statement->closeCursor();

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
        <a href="../customersDisplayForm.php">Customers</a><br><br>
	<a href="../../index.php">Add Customer</a><br>
        <a href="../brandsDisplayForm.php">Brands</a><br>
        <a href="../modelDisplayForm.php">Models</a><br>
        <a href="../OSDisplayForm.php">Operating Systems</a><br>
        <a href="../typesDisplayForm.php">Hardware Types</a><br>
        <a href="../ticketTypeDisplayForm.php">Ticket Types</a><br>
        <a href="../ticketStatusDisplayForm.php">Ticket Status'</a><br>
    </fieldset>
    </div>
    
    <body>
        <main>
            <form action="addTicket.php" method="post">
                <fieldset>
                    <legend>Ticket Details</legend>
                    <table>
                        <tr>
                            <td><b>Ticket Type: </b><select name="ticketType">
                                <option value=""></option>
                                <?php foreach ($tickettypes as $type) : ?>
                                <option value="<?php echo $type['typeID']?>"><?php echo $type['type']?></option>
                                <?php endforeach; ?>
                             </select>
                        </tr>
                        <tr>
                            
                        </tr>
                    </table>
                </fieldset>
                <input type="hidden" name="action" value="createTicket">
                <input type="submit" name="go" value="Create Ticket">
            </form>
        </main>
    </body>
</html>