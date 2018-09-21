<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**************************************************************************
 * Description: This class pulls a list of employees and 
 * stores them in an array 
 * It uses the DatabaseClass.php class
 * @author jmarsh
 **************************************************************************/
class CommentDBClass {
    

    
    public static function getComments() {
        $db = Database::getDB();
        $query = 'SELECT * from comments
                    as comments JOIN customers 
                    ON comments.customerID = customers.customerID';
        $statement = $db->prepare($query);
        $statement->execute();
                
        $comments = array();
        foreach ($statement as $row) {
            $comment = new CommentClass(
                    $row['firstName'],
                    $row['customerComment'],
                    $row['emailAddress'],
                    $row['commentID']
                    );
            $comments[] = $comment;
        }
        return $comments;
    }
    
    public static function deleteComment($comment_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM comments
                  WHERE commentID = :comment_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':comment_id', $comment_id);
        $statement->execute();
        $statement->closeCursor();
    }
    
}
