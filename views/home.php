<div class="container-fluid" id="home-banner">
    <img src="views/homeback.jpg" id="homeBack">
</div>

<div class="container-fluid" id="banner-overlay" style="background-color: rgba(0, 0, 0, 0.2);">
    <h2 id="tagline">My&nbsp;&nbsp;Blog</h2>
    <p id="taglineBy">- Saksham Mittal</p>
</div>

<div class="row pl-0 pt-5 pb-4 ml-0 mr-0" id="postsCont">
    <div class="col-md-7 offset-md-1 col-xs-12" id="postContainer">
        <div class="row m-0" id="rowposts" style="position: relative;">
            <?php   
                displayPost();
            ?>
        </div>
    </div>
    
