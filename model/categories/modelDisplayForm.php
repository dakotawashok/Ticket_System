<?php
include 'categoriesDB.php';
$sql = "SELECT m.model, t.type, b.brand FROM models m, brands b, types t WHERE m.typeID=t.typeID AND m.brandID=b.brandID";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$models = $statement->fetchAll();
$statement->closeCursor();

$sql = "SELECT * FROM categories.types";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$types = $statement->fetchAll();
$statement->closeCursor();

$sql = "SELECT * FROM categories.brands";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$brands = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Categories: Models</title>
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
                    <td>Brand</td>
                    <td>Model</td>
                    <td>Type</td>
                    <td></td>
                </tr>
                <?php foreach ($models as $model) : ?>
                    <tr>
                        <td> <?php echo $model['brand']?></td>
                        <td> <?php echo $model['model']?></td>
                        <td> <?php echo $model['type']?></td>
                        <td> <form action="deletecategory.php" method="post" >
                            <input name="deleteModel" type="hidden" value="<?php echo $model['model']?>">
                            <input name="action" type ="hidden" value="deleteModel">
                            <input name="path" type ="hidden" value="modelDisplayForm.php">
                            <input type="submit" name="Delete" value="Delete">
                        </form></td>
                    </tr>
                <?php endforeach; ?>
                    
                    <tr> <form action="addcategory.php" method="post" >
                        <td> <select name="brand">
                                <option value=""></option>
                                <?php foreach ($brands as $brand) : ?>
                                <option value="<?php echo $brand['brand']?>"><?php echo $brand['brand']?></option>
                                <?php endforeach; ?>
                             </select> </td>
                        <td> <input name="model" type="input" placeholder="Model Name" > </td>
                        <td> <select name="type">
                                <option value=""></option>
                                <?php foreach ($types as $type) : ?>
                                <option value="<?php echo $type['type']?>"><?php echo $type['type']?></option>
                                <?php endforeach; ?>
                             </select> </td>                        
                        <td> <input type="submit" name="Add" value="    Add   "> 
                            <input type="hidden" name="action" value="addModel"></td>
                    </form>
                    </tr>
                </table>
                    
            </div>
        </main>
    </body>
</html>