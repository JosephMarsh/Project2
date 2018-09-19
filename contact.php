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
require_once ('model/FieldsClass.php');
require_once ('model/ValidationClass.php');

// Add fields with optional initial message
$validate = new ValidationClass();
$fields = $validate->getFields();
$fields->addField('firsname');
$fields->addField('lastname');
$fields->addField('email', 'Must be a valid email address.');



    $action = filter_input(INPUT_POST, 'action');
     if ($action == 'add_comment') {
        $firstname = trim(filter_input(INPUT_POST, 'firstname'));
        $lastname = trim(filter_input(INPUT_POST, 'lastname'));
        $email = trim(filter_input(INPUT_POST, 'email'));
        $newsLetter = filter_input(INPUT_POST, 'newsLetter');
        $comments = filter_input(INPUT_POST, 'comment');
        
        
        $validate->text('firstname', $firstname);
        $validate->text('lastname', $lastname);
        $validate->email('email', $email);
        
        if ($fields->hasErrors()) {
            include 'contact.php';
        } else {
            //Get user ID from Email address
            $userID = userExists($email);
            if ($email == NULL ) {
                $error = "Email address is a required field. Please enter a valid email address";
                include('errors/error.php');
            //Checks to see if user account has not yet been created
            } else if($userID === NULL ){ 
                //add user account
                add_customer($firstname, $lastname, $email, $newsLetter);
                //did the user leave a coment?
                if(!(empty($comments))){
                    //grab user ID incase it was just created
                    $userID = userExists($email);
                    add_comment($comments, $userID);
                }
            //user account exists
            }else{

            //add the comment if the account exists already
                add_comment($comments, $userID);
            }
             header("Location: thankYou/thankYou.html");
             exit;
        }
     }
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    
    
    <meta charset="utf-8" />
    <title>Contact Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css\style.css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="scripts/validation.js" type="text/javascript" ></script>
</head>
<body>
    <div class="container">
        <header>
            <img src="img/integrated-circuit.png" alt="banner" id="banner" />
            <!--image file from publicdomainpictures.net-->
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tools.html">Tools</a></li>
                <li><a href="gallery.html">Project Gallery</a></li>
                <li><a href="faq.html">FAQs</a></li>
                <li><a href="contact.php">Contact Me</a></li>
            </ul>

        </nav>
        <main>
            <h1>Contact Me</h1>
            <p>
                Use the form below to send me an email and sign up for my news letters! Select subject:
                "Just want the newsletter" if you don't wan't a response to your email.
            </p>
            <form name="contact" id="contact_form" method="post" id="contact_form" >
                
                <input type="hidden" name="action" value="add_comment">
                
                <fieldset>
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="First" required="" autocomplete="given-name" />
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Last" required="" autocomplete="family-name" />
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="address@place.com" 
                           required="" value=""
                           autocomplete="email" />
                    
                    <!--This span is used for input validation messages-->
                    <span id="contact_form_error" class="error_text contact_error"></span>

                </fieldset>
                <fieldset>
                    <legend>Optional</legend>
                    <label for="comment">Comments:</label>
                    <textarea name="comment" id="comments" rows="3" cols="25"></textarea>

                    <br />
                    <label for="newsLetter">register for news letter:</label>
                    <input type="checkbox" class="newsLetter" id="newsLetter" name="newsLetter" checked value="1" />
                </fieldset>
                <br />
                <br />




                <input type="reset" value="Reset Form" />
                <input type="submit" value="Submit Email" onclick=" return false;" id="mailMe" />
            </form>
            
            <h3>
                Admins:
            </h3>
            
            <p>
                press <a href="listVisitors.php">here</a> to access comments.
            </p>
        </main>
        <footer>
            <div id="social">
                <table>
                    <caption>Follow Me</caption>
                    <tr>
                        <td><a href="https://www.facebook.com/joseph.marsh.1840" target="_blank"><img alt="Facebook Icon" src="icons/facebook.png" /></a></td>
                        <td><a href="https://monsterousoperandi.deviantart.com/" target="_blank"><img alt="Deviant Art Icon" src="icons/deviantart.png" /></a></td>
                        <td><a href="https://www.linkedin.com/in/joseph-marsh-67996173/" target="_blank"><img alt="Linkedin Icon" src="icons/linkedin.png" /></a></td>
                    </tr>
                </table>
            </div>
        </footer>
    </div><!--end container-->
</body>
</html>