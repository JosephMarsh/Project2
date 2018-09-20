
<html>
    <head>
        <meta charset="utf-8" />
        <title>Error</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--
        Second path for CSS reference fixes issues with "including" this page
        in other PHP pages and those pages not pathing to the correct relative
        CSS file location.
        -->
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>    


    <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tools.html">Tools</a></li>
                <li><a href="gallery.html">Project Gallery</a></li>
                <li><a href="about.html">FAQs</a></li>
                <li><a href="contact.php">Contact Me</a></li>
            </ul>
    </nav>  

    <main>
        <h1>Database Error</h1>
        <p class="first_paragraph">There was an error connecting to the database.</p>
        <p class="last_paragraph">
            The database reported the following Error: <?php echo $error_message; ?>
        </p>
    </main><!-- end main -->
</html>