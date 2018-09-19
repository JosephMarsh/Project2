<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'model/DatabaseClass.php';
include 'model/EmployeeClass.php';
include 'model/EmployeeDBClass.php';

//Create an array of employee objects
$employees = EmployeeDBClass::getEmployees();

//print_r($employees);


?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Jquery UI old-->
    <!--<script type="text/javascript" src="scripts/notWrittenByMe/jquery.js"></script>
    <script type="text/javascript" src="scripts/notWrittenByMe/jquery-ui.js"></script>-->
    <!--Jquery UI new-->
    <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>


    <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div class="container">
        <header>
            <img src="img/scifi-girl.png" alt="Sci-Fi girl logo" id="banner" />
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
            <h1>Employees</h1>
            <p>
            </p>
            <table class="tool2">
                <tr class="tool2"><!--Row 1-->
                    <th class="tool2">First Name</th>
                    <th class="tool2">Employee Number</th>
                    <th class="tool2" >Email Address</th>
                    <th class="tool2" >Delete</th>
                </tr>

                <!-- display links for all categories -->
                <?php foreach($employees as $admin) : ?>
                <tr  ><!--rows 2 through x rows where x = total employees +1-->
                    <td class="tool2"><?php echo $admin->getFirstName(); ?></td>
                    <td class="tool2"><?php echo $admin->getID(); ?></td>
                    <td class="tool2"><?php echo $admin->getEmail(); ?></td>
                    <td class="tool2">
                        <form action="listEmployees.php" method="post"><!-- reload same page with "."-->
                            <input type="hidden" name="action"
                                   value="delete_admin"><!--requires escalataion-->
                            <input type="hidden" name="product_id"
                                   value="<?php echo $employees['adminID']; ?>">
                                <!--disabled by default-->
                                <input type="submit" value="Delete" disabled="disabled">
                                    
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>   
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
