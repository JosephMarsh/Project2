<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description: creates an object that stores an individual 
 * employee's data as an employee object
 * @author jmarsh
 */


class VisitorClass {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    
    //create constructor for employee objects
    public function __construct($id, $first_name, $last_name, $email) {
        $this->id = $id; 
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email; 
        
    } 
    public function getID() { 
        return $this->id; 
        
    } 
    public function setID($value) { 
        $this->id = $value; 
        
    }
    
    public function getEmail() { 
        return $this->email; 
        
    } 
    public function setEmail($value) { 
        $this->email = $value; 
        
    }
    
    public function getFirstName() {
        return $this->first_name; 
        
    } 
    public function setFirstName($value) { 
        $this->first_name = $value; 
        
    }
    public function getLastName() {
        return $this->last_name; 
        
    } 
    public function setLastName($value) { 
        $this->last_name = $value; 
        
    }
}
