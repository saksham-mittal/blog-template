            <div class="container col-md-3 col-xs-12 pr-0 mr-0 pl-0 ml-0 <?php if(array_key_exists('page', $_GET)) { ?> pt-5 <?php } else { ?> pt-0 <?php }?>" id='recentPostsContainer'>

                <h3 class='pb-4 pl-2' style='font-weight: 600; color: #505050;'>Latest posts</h3>

                <?php   
                    displayLatestPost();
                ?>
                
                <div id="ad" class='container-fluid p-1 mt-5' style="background-color: #fff;">
                    <img src="views/download.png" style="width: 100%;">
                </div>
                
                <div class='container-fluid p-1 ml-3 mt-5'>
                    <h4 class="mb-4 pl-4" style="font-weight: 600; color: #505050;">Popular Tags</h4>
                        <div class="tags pl-4">
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">TRAVEL</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">CAMERA</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">BUILDING</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">CRAFT</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">MOUNTAINS</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">SWIMMING</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">OFFICE</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">NOTEBOOK</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">GIRL</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">STORMTROOPER</a>
                            <a class="tag-divs-side mb-3 mr-3 p-3 text-center">SHOES</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ml-2 mr-2">
                        <div class="alert alert-danger" id="loginAlert"></div>
                        <form>
                            <input type="hidden" id="loginActive" name="loginActive" value="1">
                            <div class="usernameDiv form-group hidden-xs-up">
                                <label for="username">Username</label>
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon">@</div>
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>  
                        </form>
                        <p id="txt">Don't have an account?</p>   
                        <a id="toggleLogin" style='color: #428bca;'>Sign Up</a>
                        <br>
                        <hr>
                    </div>
                    <div class="row m-0 p-0 pb-4">
                        <div class="adminBtn col-5 p-0">
                            <a href='admin.php'><button type="button" class="btn btn-success" id='admin' style='position: relative;'>Admin</button></a>
                        </div>
                        <div class="col-7 p-0">
                            <button type="button" class="btn btn-primary float-right" id="loginsignupbtn">Login</button>
                            <button type="button" class="btn btn-secondary float-right mr-2" data-dismiss="modal" id='closeBtn'>Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-content" style="background-color: #262626;">
                <div class="row m-0">
                    <div class="about-footer col-md-3 col-xs-11 offset-md-1 mt-5 mb-5 pl-4 pr-4">
                        <a class='smallPostTitleLink' style='color: #fff; transition: all 0.4s ease;' href="aboutme.php">
                            <h1 class="mb-4" style="font-weight: 800;">ABOUT</h1>
                        </a>
                        <p class="lead" style="font-size: 13px; line-height: 19px;">
                            Pellentesque placerat tincidunt urna, vitae feugiat magna vestibulum non. Mauris ut sagittis est. Pellentesque a felis est. Duis in risus metus. Cras felis ante, sodales eget pretium eu, hendrerit at metus. Maecenas aliquam dictum sapien id ornare.
                        </p>
                        <p style="font-size: 25px;">
                            <a><i class="icon ion-social-facebook-outline"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a><i class="icon ion-social-twitter-outline"></i></a>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-11 mt-5 mb-5 pl-4 pr-4">
                        <h4 class="mb-4 pl-4" style="font-weight: 600;">Recent Posts</h4>
                        <?php   
                            displayLatestPostFooter();
                        ?>
                    </div>
                    <div class="col-md-4 col-xs-11 mt-5 mb-5 pl-4 pr-4">
                        <h4 class="mb-4 pl-4" style="font-weight: 600;">Tags</h4>
                        <div class="tags pl-4">
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">TRAVEL</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">CAMERA</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">BUILDING</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">CRAFT</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">MOUNTAINS</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">SWIMMING</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">OFFICE</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">NOTEBOOK</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">GIRL</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">STORMTROOPER</a>
                            <a class="tag-divs mb-3 mr-3 p-3 text-center">SHOES</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fluid-container text-center" id="copyright-footer" style="background-color: #222222;">
                COPYRIGHT <strong>&copy; <a href="front.php" style='color: #47c9e5;'>MyBlog</a></strong> by <strong>SAKSHAM MITTAL</strong> - 2017
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <script src="index.js" type="text/javascript"></script>
        
    </body>
    
</html>