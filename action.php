<?php
    // This code belongs to Saksham Mittal 

    include("functions.php");
    
    if($_GET['action'] == 'loginSignup') {
        
        $error = "";
        
        if (!$_POST['email']) {
            $error = "An Email Address is required.";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid Email Address."; 
        } else if (!$_POST['password']) {
            $error = "A Password is required.";
        } 
        
        if($error != "") {
            echo $error;
            exit();
        }
        
        if($_POST['loginActive'] == "0") {
            
            if(!$_POST['username']) {
                $error = "A Username is required.";
            } else if (preg_match("/[^\w-.]/", $_POST['username'])) {
                $error = "Username must contain only Letters, Numbers and '_'";
            }
            
            if($error != "") {
                echo $error;
                exit();
            }
            
            $query = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' AND `username` = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            
            if(mysqli_num_rows($result) > 0) {
                $error = "That Email Address/ Username is already taken.";
            } else {
                
                $confirmQuery = "INSERT INTO `confirm` (`email`, `activationcode`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5($_POST['username'].$_POST['email'].date('mY'))."')";
                if(!mysqli_query($link, $confirmQuery)) {
                    $error = "Couldn't create user - please try again later!";
                }
             
                $query = "INSERT INTO `users` (`username`, `email`, `password`, `active`) VALUES ('".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."', 0)";
                if(mysqli_query($link, $query)) {
                    
                    $query = "UPDATE `users` SET `password` = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE `id` = '".mysqli_insert_id($link)."'";
                    mysqli_query($link, $query);
                    
                    echo "1";
                } else {
                    $error = "Couldn't create user - please try again later!";
                }
                
            }
            
        } else {
            
            $query = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
            if($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                
                if($row['active'] == '1') {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    echo "1";
                } else {
                    echo "2";       // means that you have to activate the account
                }
                
            } else {
                $error = "Couldn't find that email/password combination. Please try again later!";
            }
            
        }
        
        if($error != "") {
            echo $error;
            exit();
        }
        
    }

    if($_GET['action'] == 'sendmail') {
        
        $query = "SELECT `activationcode` FROM `confirm` WHERE `email` = '".$_POST['email']."' LIMIT 1";
        $code = mysqli_fetch_assoc(mysqli_query($link, $query));
        
        $emailTo = $_POST['email'];

        $subject = "Thanks for showing interest ";
        $subject .= $_POST['username']."!";
        
        $body = '<html><body style="padding: 50px; background-color: #EEEEEE; -webkit-font-smoothing: antialiased;">';
        $body .= '
        <div class="container pl-4 pr-4" style="padding: 15px; border-radius: 8px; background-color: #FFFFFF;">
            <p style="font-size: 22px; font-family: sans-serif; font-weight: 400; color: #262626;">
                Feel free to leave a reply on the blog articles or like them if you feel so!
            </p>
            <p style="line-height: 24px; font-weight: 300; font-family: sans-serif; color: #666666" font-size: 14px;>This mail was sent to you because you signed up at <a href="http://connect-com.stackstaging.com/" style="text-decoration: none; color: #428bca;"><i>My blog</i></a>. If you didnt make that request kindly ignore this mail. To activate your account click on <a href="https://sakshamiith.000webhostapp.com/action.php?action=confirmuser&activationcode='.$code["activationcode"].'" style="text-decoration: none; color: #428bca;">this</a>.
            </p>
        </div>';
        $body .= '</body></html>';

        $headers = "Content-type:text/html;charset=UTF-8"."\r\n";
        $headers .= "From: saksham@000webhostapp.com";

        if(mail($emailTo, $subject, $body, $headers)) {
            echo "1";
        } else {
            echo "Activation Code could not be sent. Please try again later!";
        }
    }

    if($_GET['action'] == 'confirmuser') {
        $query = "SELECT `email` FROM `confirm` WHERE `activationcode` = '".$_GET['activationcode']."' LIMIT 1";
        $result = mysqli_fetch_assoc(mysqli_query($link, $query));
        if($result) {
            $activateQuery = "UPDATE `users` SET `active` = 1 WHERE `email` = '".$result['email']."' LIMIT 1";
            if(mysqli_query($link, $activateQuery)) {
                $deleteQuery = "DELETE FROM `confirm` WHERE `activationcode` = '".$_GET['activationcode']."' LIMIT 1";
                if(!mysqli_query($link, $deleteQuery)) {
                    $error = "There was some problem. Please try again later!";
                }
                
                $userQuery = "SELECT * FROM `users` WHERE `email` = '".$result['email']."'";
                $user = mysqli_fetch_assoc(mysqli_query($link, $userQuery));
                
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: front.php");
            }
        }
    }

    if($_GET['action'] == 'toggleLike') {
        
        $query = "SELECT * FROM `liking` WHERE `user` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND `postid` = '".mysqli_real_escape_string($link, $_POST['postId'])."' LIMIT 1";
        
        $result = mysqli_query($link, $query);
            
        if(mysqli_num_rows($result) > 0) {
            
            $row = mysqli_fetch_assoc($result);
            mysqli_query($link, "DELETE FROM `liking` WHERE `user` = ".mysqli_real_escape_string($link, $_SESSION['id'])." AND `postid` = '".mysqli_real_escape_string($link, $_POST['postId'])."' LIMIT 1");
            
            $post = mysqli_fetch_assoc(mysqli_query($link, "SELECT `likes` FROM `posts` WHERE `id` = '".mysqli_real_escape_string($link, $_POST['postId'])."' LIMIT 1"));
            mysqli_query($link, "UPDATE `posts` SET `likes` = '".($post['likes'] - 1)."' WHERE `id` = '".mysqli_real_escape_string($link, $_POST['postId'])."'");
            
            echo "1";
            
        } else {
        
            mysqli_query($link, "INSERT INTO `liking` (`user`, `postid`) VALUES (".mysqli_real_escape_string($link, $_SESSION['id']).", ".mysqli_real_escape_string($link, $_POST['postId']).")");
            
            $post = mysqli_fetch_assoc(mysqli_query($link, "SELECT `likes` FROM `posts` WHERE `id` = '".mysqli_real_escape_string($link, $_POST['postId'])."' LIMIT 1"));
            mysqli_query($link, "UPDATE `posts` SET `likes` = '".($post['likes'] + 1)."' WHERE `id` = '".mysqli_real_escape_string($link, $_POST['postId'])."'");
            
            echo "2";
        
        }
    }

    if($_GET['action'] == 'adminLogIn') {
        if((mysqli_real_escape_string($link, $_POST['username']) == 'admin') && (mysqli_real_escape_string($link, $_POST['password']) == 'sakshamm1998')) {
            $_SESSION['admin'] = 'Saksham';
            echo "1";
        } else {
            echo "Incorrect Details!";
        }
    }

    if($_GET['action'] == 'postComment') {
        $query = "INSERT INTO `comment` (`username`, `comment`, `postid`, `datetime`) VALUES ('".mysqli_real_escape_string($link, $_SESSION['username'])."', '".mysqli_real_escape_string($link, $_POST['comment'])."', '".mysqli_real_escape_string($link, $_POST['postid'])."', NOW())";
        if(mysqli_query($link, $query)) {
            echo "1";
        } else {
            echo "2";
        }
    }
    
?>