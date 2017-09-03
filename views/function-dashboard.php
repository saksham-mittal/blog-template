<?php
    // This code belongs to Saksham Mittal 

    session_start();

    $user = 'root';
    $password = 'root';  
    $db = 'blog';               // name of database
    $host = 'localhost';
    $port = 8889;
    
    $link = mysqli_init();
    $success = mysqli_real_connect(
        $link, 
        $host, 
        $user, 
        $password, 
        $db,
        $port
    );
    
    if(!$link) {
        echo "There was an error connecting to the database";
    }

    if(array_key_exists('function', $_GET)) {
        if($_GET['function'] == "logout") {
            session_unset();
            header("Location: ../admin.php");
        }   
    }

    function displayLatestPost() {
        global $link;
        
        $query = "SELECT * FROM `posts` ORDER BY `datetime` DESC";
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_assoc($result)) {
         
            echo "
            <div class='container ml-2 mr-2 p-0' id='postsSmall' >
                <div class='row container m-0 pt-3 pb-3 mt-1' style='background-color: #fff !important;'>
                    <div class='text-center col-4' style='height: 76px;'>
                        <div style='position: relative; width: 76px; height: 76px !important; overflow: hidden; border-radius: 50%;'>
                            <img class='imgPostSmall' src='data:image/jpeg;base64,".base64_encode($row['image'])."' alt='Card image cap' style='object-fit: cover; width: auto; height: 76px; transform: scale(1.2, 1.2);'>
                        </div>
                    </div>
                    <div class='col-8 m-0 pl-3'>
                        <a class='smallPostTitleLink' style='color: #262626; transition: all 0.4s ease;'>
                            <p class='lead titleSmall' style='font-size: 17px; font-weight: 600;'>".$row['title']."</p>
                        </a>
                    </div>
                    <div class='container-fluid pt-3 mr-0 ml-2'>
                        <a href='../front.php?page=blogpost&postid=".$row['id']."'><button class='btn btn-outline-primary ml-0'>View Post</button></a>
                        <a href='action-dashboard.php?action=delete&id=".$row['id']."'><button class='btn btn-outline-danger ml-5'>Delete Post</button></a>
                    </div>
                </div>
            </div>
            ";
            
        }
    }
    
?>