<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kim_blog";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

    <title>BLOG | posts</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />
    <link rel="stylesheet" href="assets/css/blog-styles.css" />
    
</head>

  <body>
    <div id="page-wraper">
      <!-- Sidebar Menu -->
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <!-- <div class="button">
              <a href="login.html"><button type="button" class="button">Login</button></a>
            </div> -->
            <div class="image">
              <a href="#"><img src="assets/images/author-image.jpg" alt="" /></a>
            </div>
            <div class="author-content">
              <h4>FAIDHA HUSSEIN</h4>
              <span> 
                Computer Sciencist |
                Entreprenuer |
                influencer <br>
                Professional IT |
                Drone Pilot |
                Media Personality 
              </span>
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="blog-menu">
                <li><a href="blog.php">My Blog</a></li>
                <li><a href="login.html">Publish</a></li>
                <li><a href="index.html">Portfolio</a></li>
               </ul>
            </nav>
            <div class="social-network">
              <ul class="soial-icons">
                <li>
                  <a href="https://fb.com/"
                    ><i class="fa fa-facebook"></i
                  ></a>
                </li>
                <li>
                  <a href="https://twitter.com/HusseinFaidha?t=noayi03x98ZJF5-M_vBr0g&s=09"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="https://www.linkedin.com/in/faidha-hussein-361958245"><i class="fa fa-linkedin"></i></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/invites/contact/?i=8fbnbst9jl7q&utm_content=3o49unj
                  "><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-github"></i></a>
                </li>
              </ul>
            </div>
            <div class="copyright-text">
              <p>Copyright &#169; 2022 &#x2013; <span>MMC &#8482;</span> </p>
            </div>
          </div>
        </div>
      </div>

      <?php
      $sql = "SELECT * FROM posts";
      $result = mysqli_query($connection, $sql);
      
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) { ?>
      <section class="posts">
        
        <div class="card" >
            <img alt="posts" width="100%"> <? echo $row["Document"];?> </img>
            <div class="card-container">
              <h4><b> <? echo $row["Title"]; ?> </b></h4>
              <p> <? echo $row["Explanations"]; ?>  </p>
            </div>
            <div class="time-date">
                <p style="color: black; font-size: small;"> <strong> 10th Nov 2022</strong>|<span>10:10pm</span></p>
                <button>Delete</button>
                <button>EDIT</button>
              </div>
        </div>
        </div>
        
      </section>
         <?php
           }
         } else {
               echo "0 results";
               }
  
         mysqli_close($connection);
           ?>
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
      //according to loftblog tut
      $(".main-menu li:first").addClass("active");

      var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
          reqSection = $(".section").filter(
            '[data-section="' + direction + '"]'
          ),
          reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
          $("body, html").animate(
            {
              scrollTop: reqSectionPos
            },
            800
          );
        } else {
          $("body, html").scrollTop(reqSectionPos);
        }
      };

      var checkSection = function checkSection() {
        $(".section").each(function() {
          var $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
          if (topEdge < wScroll && bottomEdge > wScroll) {
            var currentId = $this.data("section"),
              reqLink = $("a").filter("[href*=\\#" + currentId + "]");
            reqLink
              .closest("li")
              .addClass("active")
              .siblings()
              .removeClass("active");
          }
        });
      };

      $(".main-menu").on("click", "a", function(e) {
        e.preventDefault();
        showSection($(this).attr("href"), true);
      });

      $(window).scroll(function() {
        checkSection();
      });
    </script>
  </body>
</html>
