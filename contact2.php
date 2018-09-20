<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    
    
    <meta charset="utf-8" />
    <title>Contact Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
    <!-- java validation commented out to prevent conflicts with PHP Validation 
    <script src="scripts/validation.js" type="text/javascript" ></script>
    9/19/18 -->
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
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact Me</a></li>
            </ul>
        </nav>
        <main>
            <h1>Contact Me</h1>
            <p>
                Use the form below to send me a message. You can tell me about tools you'd like me to add, 
                complain or let me know that I'm doing a good job. By defaukl
            </p>
            <form name="contact" id="contact_form" method="post" id="contact_form" >
                
                <input type="hidden" name="action" value="add_comment">
                
                <fieldset>
                    
                    <label for="firstname">First Name</label>

                    <input type="text" name="firstname" id="firstname" placeholder="First" autocomplete="given-name" 
                           value="<?php echo htmlspecialchars($firstname);?>" />
                    <!--                    error message-->
                    <p id="contact_form_error" class="error_text contact_error">
                        <?php    echo $fields->getField('firstname')->getHTML(); ?>
                    </p>

                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Last"
                           value="<?php echo htmlspecialchars($lastname);?>" />
                    <!--                    error message-->
                    <p id="contact_form_error" class="error_text contact_error">
                        <?php    echo $fields->getField('lastname')->getHTML(); ?>
                    </p>
                    
                    <label for="email">Email</label>
                    <input name="email" placeholder="address@place.com" 
                           value="<?php echo htmlspecialchars($email);?>"/>
                    <!--                    error message-->
                    <p id="contact_form_error" class="error_text contact_error">
                        <?php    echo $fields->getField('email')->getHTML(); ?>
                    </p>

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
                <input type="submit" value="Submit Email" id="mailMe" />
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