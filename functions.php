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
    
    if(mysqli_connect_error()) {
        echo "There was an error connecting to the database";
    }

    if(array_key_exists('function', $_GET)) {
        if($_GET['function'] == "logout") {
            session_unset();
        }   
    }

    function displayPost() {
        
        global $link;               // needs to be set global so that we can access it inside the function
        
        $count = 0;
        $query = "SELECT * FROM `posts` ORDER BY `datetime` DESC";
        $result = mysqli_query($link, $query);
        
        echo "<div class='card-con col-xs-11 col-md-6 p-0 m-0 mb-5'>";
        
        while($row = mysqli_fetch_assoc($result)) {
            
            $count++;
            if( $count%2 == 1 ) {
                echo "
                    <div class='col-xs-11 col-md-11 mb-5 p-0 card-hover rounded-0 border-0'>
                        <div class='text-center border-0' id='imgContainer' style='overflow: hidden; background-color: black;'>
                            <div class='likes-content'>
                                <i class='likeIconFaded icon ion-android-favorite pl-3 pt-4 pb-2'></i>
                                &nbsp;&nbsp;
                                <span class='noOfLikes'>".$row['likes']."</span>
                            </div>
                            <img class='card-img-top rounded-0 border-0' src='data:image/jpeg;base64,".base64_encode( $row['image'] )."' alt='Card image cap'>
                        </div>
                        <div class='card-block' style='position: relative;'>
                            <p class='lead dateSmallPosts' style='color: grey; font-size: 12px;'>by Saksham on <span style='color: #262626;'><strong>".date('d M Y', strtotime($row['datetime']))."</strong></span</p>
                                <a class='postTitleLink' href='?page=blogpost&postid=".$row['id']."' style='color: #333333; transition: all 0.4s ease;'><h4 class='card-title' style='font-weight: 700;'>".$row['title']."</h4></a>
                            <p class='card-text p-0 pt-2 pb-1' >".$row['postShort']."...</p>
                            <div class='container bottomLoveCont p-0 m-0' style='position: relative;'>
                                <hr>
                                <div class='row pl-3 pr-3'>
                                    <div class='col-8 card-text' style='color: #666666; font-size: 14px;'>Show some love"; 

                                        if(array_key_exists('id', $_SESSION)) {

                                            $isLikedQuery = "SELECT * FROM `liking` WHERE `user` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND `postid` = '".mysqli_real_escape_string($link, $row['id'])."' LIMIT 1";

                                            $isLikedQueryResult = mysqli_query($link, $isLikedQuery);

                                            if(mysqli_num_rows($isLikedQueryResult) > 0) {
                                                echo "<a class='toggleLike' data-postId ='".$row['id']."'><i class='icon love ion-android-favorite pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #E54449;'></i></a>";
                                            } else {
                                                echo "<a class='toggleLike' data-postId ='".$row['id']."'><i class='icon love ion-android-favorite-outline pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #666666;'></i></a>";
                                            }

                                        } else {

                                            echo "<a class='toggleLike' data-toggle='modal' data-target='#myModal'><i class='icon love ion-android-favorite-outline pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #666666;'></i></a>";

                                        }

                                    echo "</div><div class='col-3 offset-1 pb-1 pt-1 text-center' style='position: relative; background-color: #E5E5E5; border-radius: 30px; right: 10px;'>
                                        <i class='icon ion-android-favorite p-0' style='position: relative; font-size: 22px; color: #666666;'></i> 
                                        <span class='p-0' style='position: relative; color: #666666; font-size: 15px; top: -3px;'>".$row['likes']."</span>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                ";     
            }
            
        }
        
        echo "</div>";
        
        $count = 0;
        $query = "SELECT * FROM `posts` ORDER BY `datetime` DESC";
        $result = mysqli_query($link, $query);
        
        echo "<div class='card-con col-xs-11 col-md-6 p-0 m-0 mb-5'>";
        
        while($row = mysqli_fetch_assoc($result)) {
            
            $count++;
            if( $count%2 == 0 ) {
                echo "
                    <div class='col-xs-11 col-md-11 mb-5 p-0 card-hover rounded-0 border-0'>
                        <div class='text-center border-0' id='imgContainer' style='overflow: hidden; background-color: black;'>
                            <div class='likes-content'>
                                <i class='likeIconFaded icon ion-android-favorite pl-3 pt-4 pb-2'></i>
                                &nbsp;&nbsp;
                                <span class='noOfLikes'>".$row['likes']."</span>
                            </div>
                            <img class='card-img-top rounded-0 border-0' src='data:image/jpeg;base64,".base64_encode( $row['image'] )."' alt='Card image cap'>
                        </div>
                        <div class='card-block' style='position: relative;'>
                            <p class='lead dateSmallPosts' style='color: grey; font-size: 12px;'>by Saksham on <span style='color: #262626;'><strong>".date('d M Y', strtotime($row['datetime']))."</strong></span</p>
                                <a class='postTitleLink' href='?page=blogpost&postid=".$row['id']."' style='color: #333333; transition: all 0.4s ease;'><h4 class='card-title' style='font-weight: 700;'>".$row['title']."</h4></a>
                            <p class='card-text p-0 pt-2 pb-1' >".$row['postShort']."...</p>
                            <div class='container p-0 m-0' style='position: relative;'>
                                <hr>
                                <div class='row pl-3 pr-3'>
                                    <div class='col-8 card-text' style='color: #666666; font-size: 14px;'>Show some love"; 

                                        if(array_key_exists('id', $_SESSION)) {

                                            $isLikedQuery = "SELECT * FROM `liking` WHERE `user` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND `postid` = '".mysqli_real_escape_string($link, $row['id'])."' LIMIT 1";

                                            $isLikedQueryResult = mysqli_query($link, $isLikedQuery);

                                            if(mysqli_num_rows($isLikedQueryResult) > 0) {
                                                echo "<a class='toggleLike' data-postId ='".$row['id']."'><i class='icon love ion-android-favorite pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #E54449;'></i></a>";
                                            } else {
                                                echo "<a class='toggleLike' data-postId ='".$row['id']."'><i class='icon love ion-android-favorite-outline pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #666666;'></i></a>";
                                            }

                                        } else {

                                            echo "<a class='toggleLike' data-toggle='modal' data-target='#myModal'><i class='icon love ion-android-favorite-outline pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #666666;'></i></a>";

                                        }

                                    echo "</div>
                                    <div class='col-3 offset-1 pb-1 pt-1 text-center' style='position: relative; background-color: #E5E5E5; border-radius: 30px; right: 10px;'>
                                        <i class='icon ion-android-favorite p-0' style='position: relative; font-size: 22px; color: #666666;'></i> 
                                        <span class='p-0' style='position: relative; color: #666666; font-size: 15px; top: -3px;'>".$row['likes']."</span>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                ";     
            }
            
        }
        
        echo "</div>";
        
    }

    function displayLatestPost() {
        global $link;
        
        $query = "SELECT * FROM `posts` ORDER BY `datetime` DESC LIMIT 4";
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_assoc($result)) {
         
            echo "
            <div class='container ml-2 mr-2 p-0' id='postsSmall' >
                <div class='row container m-0 pt-3 pb-3 mt-1' style='background-color: #fff !important;'>
                    <div class='text-center col-4' style='height: 76px;'>
                        <div style='position: relative; width: 76px; height: 76px !important; overflow: hidden; border-radius: 50%;'>
                            <img class='imgPostSmall' src='data:image/jpeg;base64,".base64_encode( $row['image'] )."' alt='Card image cap' style='object-fit: cover; width: auto; height: 76px; transform: scale(1.2, 1.2);'>
                        </div>
                    </div>
                    <div class='col-8 m-0 pl-3'>
                        <a class='smallPostTitleLink' style='color: #262626; transition: all 0.4s ease;' href='?page=blogpost&postid=".$row['id']."'>
                            <p class='lead titleSmall' style='font-size: 17px; font-weight: 600;'>".$row['title']."</p>
                        </a>
                    </div>
                </div>
            </div>
            ";
            
        }
    }

    function displayLatestPostFooter() {
        global $link;
        
        $query = "SELECT * FROM `posts` ORDER BY `datetime` DESC LIMIT 3";
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_assoc($result)) {
         
            echo "
            <div class='container ml-2 mr-2 p-0 mb-4' id='postsSmall' >
                <div class='row container p-0 m-0 mb-4'>
                    <div class='text-center col-3 p-0' style='height: 76px;'>
                        <div style='position: relative; width: 76px; height: 76px !important; overflow: hidden; border-radius: 50%;'>
                            <img class='imgPostSmall' src='data:image/jpeg;base64,".base64_encode( $row['image'] )."' alt='Card image cap' style='object-fit: cover; width: auto; height: 76px; transform: scale(1.2, 1.2);'>
                        </div>
                    </div>
                    <div class='col-9 m-0 pl-3 pt-2 pr-0'>
                        <a class='smallPostTitleLink' style='color: #fff; transition: all 0.4s ease;' href='?page=blogpost&postid=".$row['id']."'>
                            <p class='lead titleSmall' style='font-size: 17px; font-weight: 600; line-height: 24px;'>".$row['title']."</p>
                        </a>
                    </div>
                </div>
                <hr style='border-color: #3c3c3c;'>
            </div>
            ";
            
        }
    }

    function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'min'),
            array(1 , 'sec')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return $print;
    }
    
?>
