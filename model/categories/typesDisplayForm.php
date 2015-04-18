<?php
include 'categoriesDB.php';
$sql = "SELECT `type`, `typeID` FROM `types`";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$types = $statement->fetchAll();
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
                    <td>TypeID</td>
                    <td>Type</td>
                    <td></td>
                </tr>
                <?php foreach ($types as $type) : ?>
                    <tr>
                        <td> <?php echo $type['typeID']?></td>
                        <td> <?php echo $type['type']?></td>
                        <td> <form action="deletecategory.php" method="post" >
                            <input name="deleteType" type="hidden" value="<?php echo $type['typeID']?>">
                            <input name="action" type ="hidden" value="deleteType">
                            <input name="path" type ="hidden" value="typesDisplayForm.php">
                            <input type="submit" name="Delete" value="Delete">
                        </form></td>
                    </tr>
                <?php endforeach; ?>
                    
                    <tr> <form action="addcategory.php" method="post" >
                        <td> <input name="typeID" type="input" placeholder="TypeID" > </td>
                        <td> <input name="type" type="input" placeholder="Type Name" > </td>
                        <td> <input type="submit" name="Add" value="    Add   "> 
                            <input type="hidden" name="action" value="addType"></td>
                    </form>
                    </tr>
                </table>
                    
            </div>
        </main>
    </body>
</html>