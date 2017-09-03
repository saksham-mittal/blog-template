<!DOCTYPE html>

<html lang="en">
    
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <style type="text/css">
        
            body { 
                padding: 0;
                margin: 0;
                background: url(views/front.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                -webkit-font-smoothing: antialiased;
                overflow-y: hidden;
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
                background: url(views/Preloader_2.gif) center no-repeat #fff;
            }
            
            @font-face {
                font-family: font;
                src: url(myFont.otf);
            }
            
            .content {
                color: #fff;
                text-transform: uppercase;
                font-size: 16px;
                letter-spacing: 3px;
            }
            
            #tagline {
                font-size: 102px;
                font-family: font;
                color: #fff;
            }
            
			.btn {
                margin-left: 30px;
                float: left;
				height: 80px;
				width: 80px;
				cursor: pointer;
				overflow: hidden;
				border-radius: 47px;
				border: 2px solid #fff;
				-webkit-transition: all 0.2s ease;
				transition: all 0.2s ease;
			}

			.btn:hover {
				border: 2px solid #47C9E5;
			}

			.btn:before {
				color: #fff;
				position: relative;
				font-family: 'Ionicons';
				font-size: 42px;
				top: 10%;
				-webkit-transition: all 0.2s ease;
				transition: all 0.2s ease;
			}

			.btn:after {
				color: #47C9E5;
				position: relative;
				font-family: 'Ionicons';
				font-size: 42px;
				top: 100%;
				-webkit-transition: all 0.2s ease;
				transition: all 0.2s ease;
			}

			.btn:hover:before {
				top: -100%;
			}

			.btn:hover:after {
				top: 10%;
			}
            
            #btn1:before, #btn1:after {
                content: '\f231';
                left: 20%;
            }
            
            #btn1:after {
                left: -18%;
            }
            
            #btn2:before, #btn2:after {
                content: '\f243';
                left: 15%;
            }
            
            #btn2:after {
                left: -78%;
            }
            
            #btn3:before, #btn3:after {
                content: '\f2b0';
                left: 11%;
            }
            
            #btn3:after {
                left: -76%;
            }
            
            #btn4:before, #btn4:after {
                content: '\f234';
                left: 18%;
            }
            
            #btn4:after {
                left: -72%;
            }
            
            #btn5:before, #btn5:after {
                content: '\f351';
                left: 16%;
            }
            
            #btn5:after {
                left: -56%;
            }
            
            .content1 {
                color: #fff;
                text-transform: uppercase;
                font-size: 13px;
                letter-spacing: 3px;
            }
            
            .svg-wrapper {
                position: relative;
                top: 50%;
                width: 320px; 
            }
            .shape {
                stroke-dasharray: 140 540;
                stroke-dashoffset: -474;
                stroke-width: 8px;
                fill: transparent;
                stroke: #fff;
                border-bottom: 5px solid black;
                transition: stroke-width 1s, stroke-dashoffset 1s, stroke-dasharray 1s;
            }
            .text {
                font-family: 'Raleway';
                font-size: 22px;
                line-height: 32px;
                letter-spacing: 8px;
                color: #fff;
                top: -51px;
                position: relative;
            }
            .svg-wrapper:hover {
                cursor: pointer;
            }
            .svg-wrapper:hover .shape {
                stroke: #47C9E5;
                stroke-width: 4px;
                stroke-dashoffset: 0;
                stroke-dasharray: 760;
            }
            .svg-wrapper:hover .text {
                color: #47C9E5;
            }
            
        </style>
      
    </head>
    <body>
        
        <div class="se-pre-con" id='top'></div>
        
        <div class='text-center' id='shade' style='position: absolute; width: 100%; background-color: rgba(0, 0, 0, 0.4);'>
        
            <p class="content lead pb-3" style='margin-top: 11%;'>Catch up with my experiences and interests</p>
            <h2 id="tagline">My&nbsp;&nbsp;Blog</h2>
            
            <div class='row mt-5 mb-4'>
                <div class="col-3 offset-3 mr-1 svg-wrapper">
                    <a href='front.php' style='text-decoration: none;'>
                        <svg height="60" width="320" xmlns="http://www.w3.org/2000/svg">
                            <rect class="shape" height="60" width="320" />
                            <div class="text">BLOG POSTS</div>
                        </svg>
                    </a>
                </div>
               
                <div class="col-3 svg-wrapper">
                    <a href='aboutme.php' style='text-decoration: none;'>
                        <svg height="60" width="320" xmlns="http://www.w3.org/2000/svg">
                            <rect class="shape" height="60" width="320" />
                            <div class="text">ABOUT ME</div>
                        </svg>
                    </a>
                </div>
            </div>
            
            <p class="content1 lead pb-3">follow me on</p>
            <div style="position: absolute; left: 50%;">
                <div class="text-center" style='position: relative; left: -50%;'>

                    <div class="btn" id="btn1"></div>

                    <div class="btn" id="btn2"></div>

                    <div class="btn" id="btn3"></div>

                    <div class="btn" id="btn4"></div>

                    <div class="btn" id="btn5"></div>

                </div>
            </div>
        
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
        
            $("#shade").height($(window).height());
            
            $(window).on('load', function() {
                $(".se-pre-con").fadeOut("slow");
            });
            
        </script>
        
    </body>
    
</html>