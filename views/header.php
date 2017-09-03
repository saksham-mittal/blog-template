<!DOCTYPE html>

<html lang="en">
    
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="styles.css">
      
    </head>
    <body>
        
        <div class="se-pre-con" id='top'></div>
        
        <a href='#top' class='scrollTop'><i class='icon ion-ios-arrow-up' style='color: #d3d3d3; position: relative; font-size: 30px; left: 15px;'></i></a>
        
        <div class="icon-brand">
            <a href="front.php"><img src="views/my-icon(small-size).png" style="width: 100%;"></a>
        </div>
        
        <span class="search-icon">
            <?php
                if(array_key_exists('page', $_GET)) {
            ?>

                    <input class="srch pt-0" type="text" name="search" style='color: #000; border-bottom: 1.4px solid #000; transition: all .4s ease;'>
                    <a href="#" id='srchLink' style='color: #000;'><i class="icon ion-ios-search-strong" id="srch-icon"></i></a>

            <?php
                } else {
            ?>

                    <input class="srch pt-0" type="text" name="search" style='color: #fff; border-bottom: 1.4px solid #fff; transition: all .4s ease;'>
                    <a href="#" id='srchLink' style='color: #fff;'><i class="icon ion-ios-search-strong" id="srch-icon"></i></a>

            <?php
                }     
                if(array_key_exists('id', $_SESSION)) {  
                    
                    if(array_key_exists('page', $_GET)) {
            ?>
                        <div class="dropdown" style='float: right;'>
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='border: none; background-color: transparent; color: #000;'>
                                <i class="icon ion-android-person ml-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">
                                    <?php echo "Hi ".$_SESSION['username']."!"; ?>
                                </a>
                                <a class="dropdown-item" href="?function=logout">Logout</a>
                            </div>
                        </div>
            <?php
                    } else {
            ?>
                        <div class="dropdown" style='float: right;'>
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='border: none; background-color: transparent; color: #fff;'>
                                <i class="icon ion-android-person ml-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">
                                    <?php echo "Hi ".$_SESSION['username']."!"; ?>
                                </a>
                                <a class="dropdown-item" href="?function=logout">Logout</a>
                            </div>
                        </div>
            <?php
                    }
                    
                } else {
                    
                    if(array_key_exists('page', $_GET)) {
            ?>
            
                        <button id="loginsignup" data-toggle="modal" data-target="#myModal" style='border: none; background-color: transparent; color: #000;'><i class="icon ion-android-person ml-3"id="srch-icon"></i></button>
            
            <?php
                    } else {
            ?>
            
                        <button id="loginsignup" data-toggle="modal" data-target="#myModal" style='border: none; background-color: transparent; color: #fff;'><i class="icon ion-android-person ml-3"id="srch-icon"></i></button>
            
            <?php
                    }
                }
            ?>
        </span>