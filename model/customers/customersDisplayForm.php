<?php
// include 'customers/deleteCustomer.php';
include_once 'customerDB.php';
$sql = "SELECT `nameFirst`, `nameLast`, `primkey` FROM `information`";
$statement = $customersconn->prepare($sql);
$statement->execute();
$customers = $statement->fetchAll();
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
            <!-- <form action="customersDisplayForm.php" method="post">   -->
            <div>
                <table>
                <tr>
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td><?php echo count($customers)?></td>
                    <td></td>
                </tr>
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td> <a href="customerInfo.php?primkey=<?php echo $customer['primkey']?>"><?php echo $customer['nameLast']?></a></td>
                        <td> <?php echo $customer['nameFirst']?></td>
                        <td> <form action="deleteCustomer.php" method="post" >
                            <input name="deleteCustomer" type="hidden" value="<?php echo $customer['primkey']?>">
                            <input name="action" type="hidden" value="<?php echo $customer['primkey']?>">
                            <input type="submit" name="Delete" value="Delete">
                        </form></td>
                    </tr>
                <?php endforeach; ?>
                </table>
                    
            </div>
            <!-- </form>  -->
        </main>
    </body>
</html>