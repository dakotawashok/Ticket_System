<?php 
include_once 'categoriesDB.php';
include 'CategoryFunctions.php';
$path = filter_input(INPUT_POST, 'path');
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL || $action == false) {
    $message = '';
} else {
    $id = filter_input(INPUT_POST, $action);
    $exists = existingCategory($id, $action);
    if ($exists != NULL && $exists != -1) {
        $deleted = deleteCategory($exists);
        if ($deleted == -1 || $deleted == NULL) {
            $message =  'Category deleted unsuccessfully<br>';
        } elseif ($deleted == 1) {
            $message =  'Category deleted successfully<br>';
        } else { 
            $message =  'Error occured in deletecategory.php';
        }
    } 
}

header(('Location: ' . $path));

?>
