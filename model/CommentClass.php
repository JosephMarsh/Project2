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


class CommentClass {
    private $firstName;
    private $email;
    private $comment;
    private $commentID;
    
    //create constructor for employee objects
    public function __construct($firstName, $comment, $email, $commentID) {
        $this->firstName = $firstName; 
        $this->comment = $comment;
        $this->email = $email; 
        $this->commentID = $commentID;
        
    } 
    public function getFirstName() { 
        return $this->firstName; 
        
    } 
    public function setFirstName($value) { 
        $this->firstName = $value; 
        
    }
    
    public function getCommentID() { 
        return $this->commentID; 
        
    } 
    public function setCommentID($value) { 
        $this->commentID = $value; 
        
    }
    
    public function getEmail() { 
        return $this->email; 
        
    } 
    public function setEmail($value) { 
        $this->email = $value; 
        
    }
    
    public function getComment() {
        return $this->comment; 
        
    } 
    public function setComment($value) { 
        $this->comment = $value; 
        
    }
}
