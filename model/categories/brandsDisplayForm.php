<?php
include 'categoriesDB.php';
$sql = "SELECT `brand`, `brandID` FROM `brands`";
$statement = $categoriesconn->prepare($sql);
$statement->execute();
$brands = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Categories: Brands</title>
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
                    <td>BrandID</td>
                    <td>Brand</td>
                    <td></td>
                </tr>
                <?php foreach ($brands as $brand) : ?>
                    <tr>
                        <td> <?php echo $brand['brandID']?></td>
                        <td> <?php echo $brand['brand']?></td>
                        <td> <form action="deletecategory.php" method="post" >
                            <input name="deleteBrand" type="hidden" value="<?php echo $brand['brandID']?>">
                            <input name="action" type ="hidden" value="deleteBrand">
                            <input name="path" type ="hidden" value="brandsDisplayForm.php">
                            <input type="submit" name="Delete" value="Delete">
                        </form></td>
                    </tr>
                <?php endforeach; ?>
                    
                    <tr> <form action="addcategory.php" method="post" >
                        <td> <input name="brandID" type="input" placeholder="BrandID" > </td>
                        <td> <input name="brand" type="input" placeholder="Brand Name" > </td>
                        <td> <input type="submit" name="Add" value="    Add   ">
                            <input type="hidden" name="action" value="addBrand"> </td>
                    </form>
                    </tr>
                </table>
                    
            </div>
        </main>
    </body>
</html>