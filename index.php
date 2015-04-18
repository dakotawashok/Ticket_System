<?php 
	
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Programming Project 01</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <div>
        <fieldset id="leftColumn">
            <legend>Contents</legend>
            <a href="model/customers/customersDisplayForm.php">Customers</a><br><br>
            <a href="index.php">Add Customer</a><br>
            <a href="model/categories/brandsDisplayForm.php">Brands</a><br>
            <a href="model/categories/modelDisplayForm.php">Models</a><br>
            <a href="model/categories/OSDisplayForm.php">Operating Systems</a><br>  
            <a href="model/categories/typesDisplayForm.php">Hardware Types</a><br>
            <a href="model/categories/ticketticketTypeDisplayForm.php">Ticket Types</a><br>
            <a href="model/categories/ticketStatusDisplayForm.php">Ticket Status'</a><br>
        </fieldset>
    </div>
    <body>
        <main>
            <form action="model/customers/addCustomer.php" method="post">
                <div>
                    <fieldset>
                        <legend>Customer Info</legend>
                        <input type="text" name="nameFirst" placeholder="First Name">
                        <input type="text" name="nameLast" placeholder="Last Name">
                        <input type="text" name="phoneNumber" placeholder="Phone Number"> 

                        <br>

                        <input type="text" name="streetAddress" placeholder="Address">
                        <input type="text" name="city" placeholder="City">
                        <input type="text" name="state" placeholder="State">
                        
                        <br>
                        <br>
                    </fieldset> <br>
                    
                    <input type="hidden" name="action" value="addCustomer">
                    <input type="submit" name="go" value="Add Customer">

                </div>
            </form>
        </main>
    </body>
</html>