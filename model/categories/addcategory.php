<?php

    require 'categoriesDB.php';
    require_once 'CategoryFunctions.php';
    
    $action = filter_input(INPUT_POST, 'action');
    
    if ($action == NULL) {
        echo 'Action was null (addcategory.php)<br>';
    } else {
        $table = parsetable($action);
        if ($action == 'addModel') {
            $model = filter_input(INPUT_POST, 'model');
            $type = filter_input(INPUT_POST, 'type');
            $type = existingCategory($type, 'type');
            $brand = filter_input(INPUT_POST, 'brand');
            $brand = existingCategory($brand, 'brand');
            
            
            if (existingCategory($model, $table) == -1 && is_array($type) && is_array($brand)) {
                $modelCategory = array($model, $type[2], $brand[2]);
                addCategory($modelCategory, $action);
            } else { $message = 'Model already exists'; } 
            header('Location: modelDisplayForm.php');
        } elseif ($action == 'addType') {
            $typeID = filter_input(INPUT_POST, 'typeID');
            $type = filter_input(INPUT_POST, 'type');
            $typeVar = array($typeID, $type);
            if (existingCategory($typeID, $table) == -1) {
                addCategory($typeVar, $table);
            } else { $message = 'Type already exists'; }
            header('Location: typesDisplayForm.php');
        } elseif ($action == 'addOS') {
            $osID = filter_input(INPUT_POST, 'osID');
            $operatingsystem = filter_input(INPUT_POST, 'operatingsystem');
            $osVar = array($osID, $operatingsystem);
            if (existingCategory($osID, $table) == -1) {
                addCategory($osVar, $table);
            } else { $message = 'OS already exists'; }
            header('Location: OSDisplayForm.php');
        } elseif ($action == 'addBrand') {
            $brandID = filter_input(INPUT_POST, 'brandID');
            $brand = filter_input(INPUT_POST, 'brand');
            $brandVar = array($brandID, $brand);
            if (existingCategory($brandID, $table) == -1) {
                addCategory($brandVar, $table);
            } else { $message = 'Brand already exists'; }
            header('Location: brandsDisplayForm.php');            
        } elseif ($action == 'addTicketType') {
            $typeID = filter_input(INPUT_POST, 'typeID');
            $type = filter_input(INPUT_POST, 'type');
            $typeVar = array($typeID, $type);
            if (existingCategory($typeID, $table) == -1) {
                addCategory($typeVar, $table);
            } else { $message = 'Type already exists'; }
            header('Location: ticketTypeDisplayForm.php');
        } elseif ($action == 'addTicketStatus') {
            $statusID = filter_input(INPUT_POST, 'statusID');
            $status = filter_input(INPUT_POST, 'status');
            $statusVar = array($statusID, $status);
            if (existingCategory($statusID, $table) == -1) {
                addCategory($statusVar, $table);
            } else { $message = 'Status already exists'; }
            header('Location: ticketStatusDisplayForm.php');
        }
        
    }