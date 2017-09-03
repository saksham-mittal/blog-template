<?php
    // This code belongs to Saksham Mittal 

    session_start();

    if(!array_key_exists('admin', $_SESSION)) {
    
?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="styles.css">
        
        <style type="text/css">
            
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
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
                background: url(views/Preloader_2.gif) center no-repeat #fff;
            }
        
        </style>
      
    </head>
    <body>
        
        <div class="se-pre-con"></div>
        
        <div id='adminCont' class="container pl-3 pr-3 pb-3">

          <form class="text-center">
                <h2 class="form-signin-heading display-4 mb-5 mt-5 pt-5">ADMIN</h2>
                <label for="adminUsername" class="sr-only">Username</label>
                <input type="text" id="adminUsername" class="form-control mb-2" placeholder="Username" required autofocus>
                <label for="adminPassword" class="sr-only mb-4">Password</label>
                <input type="password" id="adminPassword" class="form-control" placeholder="Password" required>
                <button type="button" class="btn btn-lg btn-primary btn-block mt-5 mb-5 lead" id="adminLogIn" style='height: 45px; font-size: 18px;'>Sign in</button>
          </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
        
            $(window).on('load', function() {
                $(".se-pre-con").fadeOut("slow");
            });
            
            $('#adminLogIn').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'action.php?action=adminLogIn',
                    data: 'username=' + $('#adminUsername').val() + '&password=' + $('#adminPassword').val(),
                    success: function(result) {
                        if(result == 1) {
                            window.location.assign("views/dashboard.php");
                        } else {
                            alert(result);
                        }
                    }
                })
            });
            
        </script>
        
    </body>
    
</html>

<?php

    } else {
    
        header('Location: views/dashboard.php');
    
    }

?>