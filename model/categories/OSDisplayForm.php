<?php
include 'categoriesDB.php';
global $message;
$sql = "SELECT `operatingsystem`, `osID` FROM `operatingsystems`";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$operatingsystems = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Categories: OS's</title>
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
                    <td>Operating System ID</td>
                    <td>Operating System</td>
                    <td></td>
                </tr>
                <?php foreach ($operatingsystems as $os) : ?>
                    <tr>
                        <td> <?php echo $os['osID']?></td>
                        <td> <?php echo $os['operatingsystem']?></td>
                        <td> <form action="deletecategory.php" method="post" >
                            <input name="deleteOS" type="hidden" value="<?php echo $os['osID']?>">
                            <input name="action" type ="hidden" value="deleteOS">
                            <input name="path" type ="hidden" value="OSDisplayForm.php">
                            <input type="submit" name="Delete" value="Delete">
                        </form></td>
                    </tr>
                <?php endforeach; ?>
                    
                    <tr> <form action="addcategory.php" method="post" >
                        <td> <input name="osID" type="input" placeholder="osID" > </td>
                        <td> <input name="operatingsystem" type="input" placeholder="Operating System" > </td>
                        <td> <input type="submit" name="Add" value="    Add   ">
                            <input type="hidden" name="action" value="addOS"> </td>
                    </form>
                    </tr>
                </table>
            </div>
        </main>
    </body>
</html>