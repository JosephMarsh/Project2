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
class EmployeeDBClass {
    
    
    
    public static function getEmployees() {
        $db = DataBaseClass::getDB();
        $query = 'SELECT * FROM admins
                  ORDER BY adminID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $admins = array();
        foreach ($statement as $row) {
            $admin = new EmployeeClass(
                    $row['adminID'],
                    $row['firstName'],
                    $row['emailAddress']
                    );
            $admins[] = $admin;
        }
        return $admins;
    }
    
}
