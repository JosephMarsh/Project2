<?php
/************************************************************************
 * Project Week 2 By Joseph Marsh
 * This aplication is meant manipulate a database of comments, 
 * users and site admins.
 * update 9/5/2018 moved database and functions to their own pages
 ***********************************************************************/


//this contains information on how to access the DB
require ('model/Database.php');
require ('model/Function_Library.php');
require_once ('model/Fields.php');
require_once ('model/Validate.php');



$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('firstname');
$fields->addField('lastname');
$fields->addField('email', 'Must be a valid email address.');
    
    // Add fields with optional initial message
    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = 'reset';
    } else {
        $action = strtolower($action);
    }

    switch ($action) {
        case 'reset':
            // Reset values for variables
            $firstname = '';
            $lastname = '';
            $email = '';

            // Load view
            include 'contact2.php';
            break;
        case 'add_comment':
            // Copy form values to local variables
            $firstname = trim(filter_input(INPUT_POST, 'firstname'));
            $lastname = trim(filter_input(INPUT_POST, 'lastname'));
            $email = trim(filter_input(INPUT_POST, 'email'));
            $newsLetter = filter_input(INPUT_POST, 'newsLetter');
            $comments = filter_input(INPUT_POST, 'comment');

            // Validate form data
            $validate->text('firstname', $firstname);
            $validate->text('lastname', $lastname);
            $validate->email('email', $email);

            // Load appropriate view based on hasErrors
            if ($fields->hasErrors()) {
                include 'contact2.php';
            } else {
                //Get user ID from Email address
                $userID = userExists($email);
                if ($email == NULL ) {
                    $error = "Email address is a required field. Please enter a valid email address";
                    include('errors/error.php');
                      //Checks to see if user account has not yet been created
                }else if($userID === NULL ){ 
                    //add user account
                    add_customer($firstname, $lastname, $email, $newsLetter);
                    //did the user leave a coment?
                    if(!(empty($comments))){
                        //grab user ID incase it was just created
                        $userID = userExists($email);
                        add_comment($comments, $userID);
                        header("Location: thankYou/thankYou.html");
                        exit;  
                    }
                    
                    header("Location: thankYou/thankYou.html");
                    exit;  
                     //user account exists
                }else{
                    //add the comment if the account exists already
                    add_comment($comments, $userID);
                    header("Location: thankYou/thankYou.html");
                }
            }
            break;
    }

//     if ($action == 'add_comment') {
//        $firstname = trim(filter_input(INPUT_POST, 'firstname'));
//        $lastname = trim(filter_input(INPUT_POST, 'lastname'));
//        $email = trim(filter_input(INPUT_POST, 'email'));
//        $newsLetter = filter_input(INPUT_POST, 'newsLetter');
//        $comments = filter_input(INPUT_POST, 'comment');
//        
//        
//        $validate->text('firstname', $firstname);
//        $validate->text('lastname', $lastname);
//        $validate->email('email', $email);
//        
//        if ($fields->hasErrors()) {
//            include 'contact.php';
//        } else {
//            //Get user ID from Email address
//            $userID = userExists($email);
//            if ($email == NULL ) {
//                $error = "Email address is a required field. Please enter a valid email address";
//                include('errors/error.php');
//            //Checks to see if user account has not yet been created
//            } else if($userID === NULL ){ 
//                //add user account
//                add_customer($firstname, $lastname, $email, $newsLetter);
//                //did the user leave a coment?
//                if(!(empty($comments))){
//                    //grab user ID incase it was just created
//                    $userID = userExists($email);
//                    add_comment($comments, $userID);
//                }
//            //user account exists
//            }else{
//
//            //add the comment if the account exists already
//                add_comment($comments, $userID);
//            }
//             header("Location: thankYou/thankYou.html");
//             exit;
//        }
//     }

?>

