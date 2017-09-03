<div class='nav-blogpost' style='position: relative; width: 100%; height: 70px; background-color: #fff;'></div>

<div class="row m-0 p-0">    
    <div class="col-md-8 row mt-5" id='wholePostCont'>

        <?php

            if(array_key_exists('postid', $_GET)) {

                $query = "SELECT * FROM `posts` WHERE `id` = '".$_GET['postid']."' LIMIT 1";
                $post = mysqli_fetch_assoc(mysqli_query($link, $query));

                echo "
                    <div class='container col-xsm-12 p-0' id='wholePostContainer'>
                        <img src='data:image/jpeg;base64,".base64_encode($post['image'])."' id='wholeImgPost'>
                        <h3 class='pl-3 pr-3 pt-4 pb-2' id='wholeHeadingPost'>".$post['title']."</h3>
                        <p class='lead pl-3 wholeDateSmallPosts' style='color: grey; font-size: 14px;'>by Saksham on <span style='color: #262626;'><strong>".date('d M, Y', strtotime($post['datetime']))."</strong></span</p>
                        <div class='m-4' style='width: 84%; height: 1.4px; background-color: #d3d3d3;'></div>
                        <p class='p-3 pb-4'>".$post['post']."</p>
                        
                        <div class='container bottomLoveCont p-0 m-0 pb-3' style='position: relative;'>
                        <hr>
                        <div class='row pl-3 pr-3'>
                            <div class='col-8 card-text' style='color: #666666; font-size: 14px;'>Show some love"; 

                                if(array_key_exists('id', $_SESSION)) {

                                    $isLikedQuery = "SELECT * FROM `liking` WHERE `user` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND `postid` = '".mysqli_real_escape_string($link, $post['id'])."' LIMIT 1";

                                    $isLikedQueryResult = mysqli_query($link, $isLikedQuery);

                                    if(mysqli_num_rows($isLikedQueryResult) > 0) {
                                        echo "<a class='toggleLike' data-postId ='".$post['id']."'><i class='icon love ion-android-favorite pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #E54449;'></i></a>";
                                    } else {
                                        echo "<a class='toggleLike' data-postId ='".$post['id']."'><i class='icon love ion-android-favorite-outline pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #666666;'></i></a>";
                                    }

                                } else {

                                    echo "<a class='toggleLike' data-toggle='modal' data-target='#myModal'><i class='icon love ion-android-favorite-outline pl-1' style='position: relative; font-size: 22px; top: 3px; left: 5px; color: #666666;'></i></a>";

                                }

                                echo "</div><div class='col-2 offset-2 pb-1 pt-1 text-center' style='position: relative; background-color: #E5E5E5; border-radius: 30px; right: 10px;'>
                                    <i class='icon ion-android-favorite p-0' style='position: relative; font-size: 22px; color: #666666;'></i> 
                                    <span class='p-0' style='position: relative; color: #666666; font-size: 15px; top: -3px;'>".$post['likes']." likes</span>
                                </div>
                            </div>
                        </div>  
                    </div>
                ";
            }

        ?>
        
        <div class='container-fluid col-12 p-0 mt-4' style='background-color: #fff;'>
            <form>
                <div class="form-group p-3" style='width: 100% !important;'>
                    <div class="form-group">
                        <label for="comment" class='lead' style="color: #47c9e5;">Leave a comment&nbsp;&nbsp;<i class='icon ion-chatbox-working' style='color: #47c9e5;'></i> . . . </label>
                        <textarea class="form-control" id="comment" rows="4"></textarea>
                        <input id='postIdCmmnt' type="hidden" value="<?php echo $_GET['postid'];  ?>">
                    </div>
                    <a class="btn btn-primary"<?php  if(array_key_exists('id', $_SESSION))  { ?> id="commentBtn" data <?php  } else {  ?> data-toggle='modal' data-target='#myModal' <?php }  ?> style='border-radius: 30px; color: #fff; background-color: #47c9e5 !important; border-color: #47c9e5; cursor: pointer; padding-bottom: 10px;'>Submit</a>
                </div>
            </form>
        </div>
        
        <div class="fluid-container col-12 p-0 mt-4" style="background-color: #fff;">
            <?php   
                $query = "SELECT * FROM `comment` WHERE `postid` = '".$_GET['postid']."' ORDER BY `datetime` DESC";
                $result = mysqli_query($link, $query);
                
                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {

                        echo "
                            <div class='container pt-2'>
                                <p class='lead' style='color: #47c9e5;'>".$row['username']."&nbsp;&nbsp;<span class='text-muted' style='font-size: 14px;'>".time_since(time() - strtotime($row['datetime']))." ago</span></p>
                                <p>".$row['comment']."</p>
                            </div>
                            <hr class='mb-0'>
                        ";

                    }
                }
                
            ?>
        </div>
            
    </div>