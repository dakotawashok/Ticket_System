<?php
include 'categoriesDB.php';
$sql = "SELECT `status`, `statusID` FROM `statustypes`";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$statuses = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Categories: Types</title>
        <link rel="stylesheet" type="text/css" href="../../main.css">
    </head>

    <div>
        <fieldset id="leftColumn">
            <legend>Contents</legend>
            <a href="../customers/customersDisplayForm.php">Customers</a><br><br>
            <a href="../../index.php">Add Customer</a><br>
            <a href="brandsDisplayForm.php">Brands</a><br>
            <a href="modelDisplayForm.php">Models</a><br>
            <a href="OSDisplayForm.php">Operating Systems</a><br>
            <a href="typesDisplayForm.php">Hardware Types</a><br>
            <a href="ticketTypeDisplayForm.php">Ticket Types</a><br>
            <a href="ticketStatusDisplayForm.php">Ticket Status'</a><br>
        </fieldset>
    </div>
    <body>
        <main>
            <div>
                <table>
                <tr>
                    <td>StatusID</td>
                    <td>Status</td>
                    <td></td>
                </tr>
                <?php foreach ($statuses as $status) : ?>
                    <tr>
                        <td> <?php echo $status['statusID']; ?></td>
                        <td> <?php echo $status['status']?></td>
                        <td> <form action="deletecategory.php" method="post" >
                            <input name="deleteStatusType" type="hidden" value="<?php echo $status['statusID']?>">
                            <input name="action" type ="hidden" value="deleteTicketStatus">
                            <input name="path" type ="hidden" value="ticketStatusDisplayForm.php">
                            <input type="submit" name="Delete" value="Delete">
                        </form></td>
                    </tr>
                <?php endforeach; ?>
                    
                    <tr> <form action="addcategory.php" method="post" >
                        <td> <input name="statusID" type="input" placeholder="StatusID" > </td>
                        <td> <input name="status" type="input" placeholder="Status Name" > </td>
                        <td> <input type="submit" name="Add" value="    Add   "> 
                            <input type="hidden" name="action" value="addTicketStatus"></td>
                    </form>
                    </tr>
                </table>
                    
            </div>
        </main>
    </body>
</html>
