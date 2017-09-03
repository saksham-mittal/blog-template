<?php
    // This code belongs to Saksham Mittal 

    include("function-dashboard.php");
    
    if(!$link) {
        echo "There was an error connecting to the database";
    }

    if(isset($_POST["action"])) {
        
        if($_POST["action"] == "insert") {
                
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $query = "INSERT INTO `posts` (image, title, datetime, post, postShort) VALUES ('$file', '".$_POST['blogTitle']."', '".$_POST['dateTime']."', '".$_POST['blogContent']."', '".substr($_POST['blogContent'], 0, 168)."')";
          
            if(mysqli_query($link, $query)) {
                echo 1;
            } else {
                echo 0;
            }
         }
    
    }

    if(isset($_GET['action'])) {
        if($_GET['action'] == 'delete') {
            $query = "DELETE FROM `posts` WHERE `id` = '".$_GET['id']."' LIMIT 1";
            if(mysqli_query($link, $query)) {
                header("Location: dashboard.php");
            }
        }
    }
    
?>