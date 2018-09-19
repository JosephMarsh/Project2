<?php
/*********************************************************************
 *Joseph Marsh
 *Project 2
 *Updated 9/5/2018  
 ********************************************************************/

    function add_customer($firstname, $lastname, $email, $newsLetter) {
        global $db;
        //populates the current date
        $date = date("Y-m-d");
        //if the box is unchecked makes newsletter = false
        $query = 'INSERT INTO customers
                     (firstName, lastName, emailAddress, isCurrentMember, dateJoined)
                  VALUES
                     (:firstName, :lastName, :emailAdress, :isCurrentMember, :dateJoined);'
                ;
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstname);
        $statement->bindValue(':lastName', $lastname);
        $statement->bindValue(':emailAdress', $email);
        $statement->bindValue(':isCurrentMember', $newsLetter);
        $statement->bindValue(':dateJoined', $date);
        $statement->execute();
        $statement->closeCursor();
    }
    //added this function 9/5/18
    function add_comment($comment, $userID){
        global $db;
        //populates the current date
        $date = date("Y-m-d");
        $query = 'INSERT INTO comments
                     (customerComment, dateSubmited, customerID)
                  VALUES
                     (:customerComment, :dateSubmited, :customerID);';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerComment', $comment);
        $statement->bindValue(':dateSubmited', $date);
        $statement->bindValue(':customerID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    //added this function 9/5/18
    function userExists($email){
        global $db;
        $query = 'SELECT customerID FROM `customers` '
                . 'WHERE emailAddress = :emailAdress; limit 1 ';
        $statement = $db->prepare($query);
        $statement->bindValue(':emailAdress', $email);
        $statement->execute();
        $userData = $statement->fetch();
        $userID = $userData['customerID'];
        $statement->closeCursor();
        return $userID; 
    }
    
    

?>