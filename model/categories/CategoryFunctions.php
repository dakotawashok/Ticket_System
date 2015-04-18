<?php
include 'categoriesDB.php';


function existingCategory($var, $table) {
    global $categoriesconn;
    $parsedTable = parseTable($table);
    
    if ($var == NULL) {
        return NULL;
    } elseif (is_numeric($var)){
        // code to see if entered category id already exists within 
        // the specified table
        $chquery = 'SELECT * FROM categories.' . $parsedTable[0] . ' WHERE ' . $parsedTable[1] . "=:var";
        $statement = $categoriesconn->prepare($chquery);
        $statement->bindValue(':var', $var);
        $statement->execute();
        $result=$statement->fetch();
        $statement->closeCursor();
        if($result == NULL || count($result) == 0) {
            return -1;
        } else {
            // returns the tablename, primkey Column name, and specific primkey
            return array($parsedTable[0],$parsedTable[1], $result[0]);
        }
    } else {
        $chquery = 'SELECT * FROM categories.' . $parsedTable[0] . ' WHERE ' . $parsedTable[2] . "=:var";
        $statement = $categoriesconn->prepare($chquery);
        $statement->bindValue(':var', $var);
        $statement->execute();
        $result=$statement->fetch();
        $statement->closeCursor();
        if($result == NULL || count($result) == 0) {
            return -1;
        } else {
            // returns the tablename, primkey Column name, and specific primkey
            return array($parsedTable[0],$parsedTable[1], $result[0]);
        }
    }
    
}

function existingModel($var, $table) {
    global $categoriesconn;
    $parsedTable = 0;
}

function parseTable($table) {
    if ($table == 'deleteOS' || $table == 'addOS' || $table == 'os' || $table == 'operatingsystem' || $table == 'operatingsystems') {
        $returnTable = array('operatingsystems', 'osID', 'operatingsystem');
    } elseif ($table == 'deleteModel' || $table == 'addModel' || $table == 'model' || $table == 'models') {
        $returnTable = array('models', 'model', 'model');
    } elseif ($table == 'deleteType' || $table == 'addType' || $table == 'type' || $table == 'types') {
        $returnTable = array('types', 'typeID', 'type');
    } elseif ($table == 'deleteTicketType' || $table == 'addTicketType' || $table == 'ticketType' || $table == 'ticketTypes') {
        $returnTable = array('tickettypes', 'typeID', 'type');
    } elseif ($table == 'deleteTicketStatus' || $table == 'addTicketStatus' || $table == 'ticketStatus' || $table == 'ticketStatuses') {
        $returnTable = array('statustypes', 'statusID', 'status');
    } elseif ($table == 'deleteBrand' || $table == 'addBrand' || $table == 'brand' || $table == 'brands') {
        $returnTable = array('brands', 'brandID', 'brand');
    } else {
        $returnTable = array(null, null, null);
    }
    return $returnTable;    
}

function deleteCategory($category) {
    global $categoriesconn;

    if ($category == -1 || $category == NULL) {
        return -1;
    } else {
        $primkey = $category[2];
        $sql = 'DELETE FROM categories.' . $category[0] . ' WHERE ' . $category[1] . '=:pk';
        $statement = $categoriesconn->prepare($sql);
        $statement->bindValue('pk', $primkey);
        $statement->execute();
        return 1;
    }
}

// addcategory takes 2 arrays. $var is what is being put into the array and $table is the table
// names. $table is not needed for models
function addCategory($var, $table) {
    global $categoriesconn;
    // if the count of the var array is 3 or more (which means it's a model category) {        
    if (count($var) >= 3) {
        $sql = 'INSERT INTO categories.models' . 
                ' (model, typeID, brandID) ' . "VALUES (:mdl, :tID, :bID)";
        $statement = $categoriesconn->prepare($sql);
        $statement->bindValue(':mdl', $var[0]);
        $statement->bindValue(':tID', $var[1]);
        $statement->bindValue(':bID', $var[2]);
    } else {
        $sql = 'INSERT INTO categories.' . $table[0] . ' (' . $table[1] . ', ' . 
                $table[2] . ') ' . "VALUES (:id, :name)";
        $statement = $categoriesconn->prepare($sql);
        $statement->bindValue(':id', $var[0]);
        $statement->bindValue(':name', $var[1]);
    }
    
    $statement->execute();
    $statement->closeCursor();
    
}