<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**************************************************************************
 * Description: This class pulls a list of customers and 
 * stores them in an array 
 * It uses the DatabaseClass.php class
 * @author jmarsh
 **************************************************************************/
class VisitorDBClass {
    
    
    
    public static function getVisitors() {
        $db = Database::getDB();
        $query = 'SELECT * FROM customers
                  ORDER BY customerID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $customers = array();
        foreach ($statement as $row) {
            $customer = new VisitorClass(
                    $row['customerID'],
                    $row['firstName'],
                    $row['lastName'],
                    $row['emailAddress']
                    );
            $customers[] = $customer;
        }
        return $customers;
    }
    
}
