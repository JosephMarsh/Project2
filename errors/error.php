<HTML>
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
            <li><a href="faq.html">FAQs</a></li>
            <li><a href="contact.php">Contact Me</a></li>
        </ul>
    </nav>
    <main>
        <h1>Error</h1>
        <p>The database reported the following Error: <?php echo $error; ?></p>
        <p>Please Try your entry again or contact an admin for assistance.</p>
    </main>
</HTML>