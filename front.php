<?php
    // This code belongs to Saksham Mittal 

    include("functions.php");
    include("views/header.php");
    if(array_key_exists('page', $_GET)) {
        if($_GET['page'] == 'blogpost') {
            include("views/blogpost.php");
        } else {
            include("views/home.php");
        }
    } else {
        include("views/home.php");
    }
    include("views/footer.php");
    
?>