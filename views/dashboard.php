    <?php

        include('function-dashboard.php');

        if(array_key_exists("admin", $_SESSION)) {
        
    ?>

        <!DOCTYPE html>

            <!--   This code belongs to Saksham Mittal     -->

            <html lang="en">

                <head>

                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

                    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

                    <style type="text/css">

                        body {
                            background-color: #F5F6F9;
                            -webkit-font-smoothing: antialiased;
                            overflow-x: hidden;
                        }

                        .no-js #loader { display: none;  }
                        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
                        .se-pre-con {
                            position: fixed;
                            left: 0px;
                            top: 0px;
                            width: 100%;
                            height: 100%;
                            z-index: 9999;
                            background: url(Preloader_2.gif) center no-repeat #fff;
                            overflow: hidden;
                        }
                        
                        .icon-brand {
                            position: absolute;
                            z-index: 10;
                            width: 50px;
                            height: 50px;
                            top: 12px;
                            left: 30px;
                        }

                    </style>

                </head>
                <body>

                    <div class="se-pre-con" id='top'></div>

                    <div class='nav-blogpost' style='position: relative; width: 100%; height: 70px; background-color: #fff;'>
                        
                        <div class="icon-brand">
                            <a href="../front.php"><img src="my-icon(small-size).png" style="width: 100%;"></a>
                        </div>

                        <div class="dropdown mr-4 mt-3" style='float: right;'>
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size: 20px; border: none; background-color: transparent; color: #000;'>
                                <i class="icon ion-android-person ml-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">
                                    <?php echo "Hi ".$_SESSION['admin']."!"; ?>
                                </a>
                                <a class="dropdown-item" href="function-dashboard.php?function=logout">Logout</a>
                            </div>
                        </div>

                    </div>
                    
                    <div class='row p-0 pt-3 pb-3 m-0'>
                    
                        <div class="container col-md-8 col-xs-12" id='wholePostCont' style='padding-right: 0 !important; margin-right: 0 !important;'>
                            
                            <div class='container col-xsm-12 p-0' style='background-color: #fff;'>
                                
                                <form id="form" method='post' enctype="multipart/form-data">
                                    
                                    <div class="imgContainer text-center" style='width: 100%; border-style: dashed; border: 2px dashed #d3d3d3;'>

                                        <img id='img' src='uploadBack.png' style='width: 100%;'>
                                        <i class='icon ion-ios-cloud-upload-outline' style='position: absolute; left: 46%; color: #47c9e5; top: 80px; font-size: 60px; font-weight: 700;'></i>
                                        <button type="button" id='upload' class="btn btn-secondary" style='position: absolute; left: 42%; top: 170px; background-color: #47c9e5 !important; color: #fff;'>Upload Image</button>
                                        <input type="file" name="image" id="image" class='hidden-xs-up'>
                                        <input type="hidden" name="action" id="action" value="insert">
                                        <input type="hidden" name="image_id" id="image_id">

                                    </div>

                                    <div class="p-3 pt-4 pb-0">
                                        <div class="form-group">
                                            <label for="title">Blog Title</label>
                                            <input type="text" class="form-control" name='blogTitle' id="title" placeholder="Title of blog">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Date and time</label>
                                            <div class="row m-0">
                                                <input type="datetime-local" class="form-control col-11" name='dateTime' id="title" placeholder="Title">
                                                <span class="input-group-addon col-1">
                                                    <i class='icon ion-calendar' style='color: #47c9e5;'></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="blogpost">Blog Post</label>
                                            <textarea class="form-control" name='blogContent' id="blogpost" rows="7" placeholder="Start writing Blog!"></textarea>
                                        </div>
                                        <input name="insert" id="insert" type='submit' value='Post Blog' class="btn btn-primary">
                                    </div>
                                
                                </form>
                                <button id='resetBlog' class="btn btn-danger ml-3 mb-3">Reset the feilds</button>
                                
                                <div class="results pl-3 pr-3 pb-3"></div>
                                
                            </div>
                            
                        </div>
                        <div class="container col-md-3 col-xs-12 mt-5 pr-0 mr-0 pl-0 ml-0">

                            <p class='text-center lead pt-3 pb-3' style='font-size: 31px; color: #47c9e5;'>Recently Posted</p>

                            <?php   
                                displayLatestPost();
                            ?>

                        </div>
                        
                    </div>

                    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
                    
                    <script>  
                        
                        $(window).on('load', function() {
                            $(".se-pre-con").fadeOut("slow");
                        });
                        
                        $(document).ready(function(){
                            
                            $('#upload').click(function(){
                               $("input[type='file']").trigger('click');
                            })

                            $('#form').submit(function(event){
                                event.preventDefault();
                                var image_name = $('#image').val();
                                if(image_name == '')
                                {
                                    $('.results').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please Select Image!</div>');
                                    return false;
                                } else {
                                   var extension = $('#image').val().split('.').pop().toLowerCase();
                                   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1) {
                                        $('.results').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Invalid Image File!</div>');
                                        $('#image').val('');
                                        return false;
                                   } else {
                                        $.ajax ({
                                            url: "action-dashboard.php",
                                            method: "POST",
                                            data: new FormData(this),
                                            contentType: false,
                                            processData: false,
                                            success: function(data) {
                                                if(data == '1') {
                                                    $('.results').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Yay!</strong> Blog successfully posted!</div>');
                                                } else {
                                                    $('.results').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sorry!</strong> There was some issue posting the blog</div>');
                                                }
                                                $('#form')[0].reset();
                                            }
                                        });
                                    }
                                }
                            });
                            
                            $('#resetBlog').on('click', function() {
                                $("input[type=text], input[type=datetime-local], input[type=file], textarea").val("");
                            });
                            
                            if($(window).width() > 576) {
                                $('#wholePostCont').addClass('ml-5');
                                $('#wholePostCont').addClass('p-5');
                                $('#wholePostCont').removeClass('ml-1');
                                $('#wholePostCont').removeClass('mr-1');
                            } else {
                                $('#wholePostCont').removeClass('ml-5');
                                $('#wholePostCont').removeClass('p-5');
                                $('#wholePostCont').addClass('ml-1');
                                $('#wholePostCont').addClass('mr-1');
                            }

                            $(window).on('resize', function() {
                                if($(window).width() > 576) {
                                    $('#wholePostCont').addClass('ml-5');
                                    $('#wholePostCont').addClass('p-5');
                                    $('#wholePostCont').removeClass('ml-1');
                                    $('#wholePostCont').removeClass('mr-1');
                                } else {
                                    $('#wholePostCont').removeClass('ml-5');
                                    $('#wholePostCont').removeClass('p-5');
                                    $('#wholePostCont').addClass('ml-1');
                                    $('#wholePostCont').addClass('mr-1');
                                }
                            });
                        }); 
                        
                    </script>

                </body>

            </html>

        <?php
            
            } else {
                header("Location: ../admin.php");
            }
    
        ?>