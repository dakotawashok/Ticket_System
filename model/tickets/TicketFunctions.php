<?php

// this function gets in a ticketID, if the ticketID already exists, it returns the ticket, else it returns -1
function existingTicket($var) {
    global $ticketconn;
    
    $sql = 'SELECT * FROM tickets.tickets WHERE ticketID=:tID';
    $statement = $ticketconn->prepare($sql);
    $statement->bindValue(':tID', $var);
    $statement->execute();
    $result=$statement->fetch();
    $statement->closeCursor();
    if($result == NULL || count($result) == 0) {
        return -1;
    } else {
        return $result;
    }
}

function deleteTicket($tID) {
    global $ticketconn;
    
    if ($tID != -1) {
        $sql = 'DELETE FROM tickets.tickets WHERE ticketID=:tID';
        $statement = $ticketconn->prepare($sql);
        $statement->bindValue(':tID', $tID);
        $statement->execute();
        $statement->closeCursor();
    }
}
