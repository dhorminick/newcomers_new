<?php
    session_start();
    $file_dir = '';
    $file_subdir = '';
    include $file_dir.'inc/config.inc.php';
    include $file_dir.'inc/db.inc.php'; 
    $hasRegisteredEvent = false;

    if (isset($_SESSION["loggedIn"]) == true || isset($_SESSION["loggedIn"]) === true) {
        $signedIn = true;
    } else {
        $signedIn = false;
    } 
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <meta name="robots" content="" />

  <!-- DESCRIPTION -->
  <meta name="description" content="NewComersUnion : Event website" />

  <!-- OG -->
  <meta property="og:title" content="NewComersUnion : Event website" />
  <meta property="og:description" content="NewComersUnion : Event website" />
  <meta property="og:image" content="" />
  <meta name="format-detection" content="telephone=no" />

  <!-- FAVICONS ICON ============================================= -->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

  <!-- PAGE TITLE HERE ============================================= -->
  <title>NewComersUnion : Event website</title>

  <!-- MOBILE SPECIFIC ============================================= -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
      <![endif]-->

  <!-- All PLUGINS CSS ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/assets.css" />

  <!-- TYPOGRAPHY ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/typography.css" />

  <!-- SHORTCODES ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css" />

  <!-- STYLESHEETS ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css" />

  <!-- REVOLUTION SLIDER CSS ============================================= -->
  <link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/layers.css" />
  <link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/settings.css" />
  <link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/navigation.css" />
  <link rel="stylesheet" href="assets/style.css">
  <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">
  <div class="page-wraper">
    <div id="loading-icon-bx"></div>
    <!-- Header Top ==== -->
    <header class="header rs-nav header-transparent">
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex justify-content-between">
            <div class="topbar-left">
              <ul>
                <li>
                  <a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a>
                </li>
                <li>
                  <a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a>
                </li>
              </ul>
            </div>
            <div class="topbar-right">
              <ul>
                <li>
                  <select class="header-lang-bx">
                    <option data-icon="flag flag-uk">English UK</option>
                    <option data-icon="flag flag-us">English US</option>
                  </select>
                </li>
                <li><a href="auth/sign-in">Sign In</a></li>
                <li><a href="auth/sign-up">Sign Up</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="sticky-header navbar-expand-lg">
        <div class="menu-bar clearfix">
          <div class="container clearfix">
            <!-- Header Logo ==== -->
            <div class="menu-logo">
              <a href="index.html"><img src="assets/images/logo-white.png" alt="" /></a>
            </div>
            <!-- Mobile Nav Button ==== -->
            <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse"
              data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false"
              aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
            </button>
            <!-- Author Nav ==== -->
            <div class="secondary-menu">
              <div class="secondary-inner">
                <ul id="bdvgh">
                  <li><a href="<?php echo $page_fb; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="<?php echo $page_ln; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="<?php echo $page_x; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="<?php echo $page_ig; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  <!-- Search Button ==== -->
                  <li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i
                        class="fa fa-search"></i></button></li>
                </ul>
              </div>
            </div>
            <!-- Search Box ==== -->
            <div class="nav-search-bar">
              <form action="#">
                <input name="search" value="" type="text" class="form-control" placeholder="Type to search" />
                <span><i class="ti-search"></i></span>
              </form>
              <span id="search-remove"><i class="ti-close"></i></span>
            </div>
            <!-- Navigation Menu ==== -->
            <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
              <div class="menu-logo">
                <a href="index.html"><img src="assets/images/logo.png" alt="" /></a>
              </div>
              <ul class="nav navbar-nav">
                <li class="no-submenu"><a href="index.php">Home</a> </li>
                <li class="no-submenu"><a href="contact-us.php">Contact</a> </li>
                <li class="no-submenu"><a href="about-us.php">About Us</a> </li>
                <li class="submenu"><a href="event.php">Events <i class="fa fa-chevron-down"></i></a>
                  <ul class="sub-menu">
                    <li><a href="index.html">Upcoming Events</a></li>
                    <li><a href="index-2.html">Past Event Highlights</a></li>
                  </ul>
                </li>
                <li class="submenu"><a href="javascript:;">My Account <i class="fa fa-chevron-down"></i></a>
                  <ul class="sub-menu">
                    <li><a href="index.html">Reserved Events</a></li>
                    <li><a href="index-2.html">Account Settings</a></li>
                  </ul>
                </li>
              </ul>
              <div class="nav-social-link">
                <a href="<?php echo $page_fb; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo $page_ln; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="<?php echo $page_x; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="<?php echo $page_ig; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
            <!-- Navigation Menu END ==== -->
          </div>
        </div>
      </div>
    </header>
    <!-- Header Top END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
      <header class="header_3 ovpr-dark">
        <div class="intro_wrapper">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                  <h1>"Discover Several Events with Newcomers!"</h1>
                  <p>
                    Join us at the Newcomers' Event for an unforgettable experience!<br> Connect, learn, and have fun
                    with a diverse range of activities. Register now and be part of the excitement
                  </p>
                  <div class="intro_button">
                    <a href="#" class="nav-link btn"><?php if($signedIn == true){
                          echo "View Registered Events";
                        } 
                        else{
                          echo "Join community";
                        }?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="content-block">
        <!-- Our Services -->
        <div class="section-area content-inner service-info-bx">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="service-bx">
                  <div class="action-box">
                    <img src="assets/images/blog/latest-blog/WhatsApp-Image-2023-11-19-at-11.40.09_f248ff06-e1700418583691-400x300.jpg" alt="" />
                  </div>
                  <div class="info-bx text-center">
                    <div class="feature-box-sm radius bg-white">
                      <i class="fa fa-bank text-primary"></i>
                    </div>
                    <h4><a href="#">Experience excitement upcoming events!</a></h4>
                    <a href="#" class="btn radius-xl">View More</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="service-bx">
                  <div class="action-box">
                    <img src="assets/images/event/event_516996000-e1700323520913.webp" alt="" />
                  </div>
                  <div class="info-bx text-center">
                    <div class="feature-box-sm radius bg-white">
                      <i class="fa fa-book text-primary"></i>
                    </div>
                    <h4><a href="#">nights of entertainment and celebrations</a></h4>
                    <a href="#" class="btn radius-xl">View More</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="service-bx m-b0">
                  <div class="action-box">
                    <img src="assets/images/event/IMG_1097-scaled-e1700408816788-400x300.jpg" alt="" />
                  </div>
                  <div class="info-bx text-center">
                    <div class="feature-box-sm radius bg-white">
                      <i class="fa fa-file-text-o text-primary"></i>
                    </div>
                    <h4><a href="#">Don't miss unforgettable events</a></h4>
                    <a href="auth/sign-up.php" class="btn radius-xl"><?php if($signedIn == true){
                          echo "Reserved Events";
                        } 
                        else{
                          echo "Join community";
                        }?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Our Services END -->

        <!-- Form -->
        <div class="section-area section-sp1 ovpr-dark bg-fix online-cours"
          style="background-image:url(assets/images/background/bg1.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center text-white">

                <?php if ($signedIn==true) {
                  echo'<h5>Own Your Feature Learning New Skills Online</h5>
							<form class="cours-search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="What do you want to learn today?	">
									<div class="input-group-append">
										<button class="btn" type="submit">Search</button> 
									</div>
								</div>
							</form>';
                }else{
                  echo '<h2>Become A Member Now</h2>
                <h5>Attend Events and Seminars and Socialize</h5>
                <div class="cours-search">
                  <button class="btn join-community-btn" type="button">Join the Community</button>

                </div>';
                }?>

              </div>
            </div>
            <div class="mw800 m-auto">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="cours-search-bx m-b30">
                    <div class="icon-box">
                      <h3><i class="ti-user"></i><span class="counter">500</span></h3>
                    </div>
                    <span class="cours-search-text"> Join over 500 Enthusiasts</span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="cours-search-bx m-b30">
                    <div class="icon-box">
                      <h3><i class="ti-book"></i><span class="counter">300</span></h3>
                    </div>
                    <span class="cours-search-text">300+ Events</span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="cours-search-bx m-b30">
                    <div class="icon-box">
                      <h3><i class="ti-layout-list-post"></i><span class="counter">200</span></h3>
                    </div>
                    <span class="cours-search-text">Discover Events Worldwide</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Form END -->
        <div class="section-area section-sp2">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center heading-bx">
                <h2 class="title-head m-b0">
                  Upcoming <span>Events</span>
                </h2>
                <p class="m-b0">"Join us for a community gathering to enrich your mind and connect with others!"</p>
              </div>
            </div>
            <div class="row">
              <div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0 m-b30">
                <div class="item">
                  <!-- @Dhorminick use php to add event titles and dates here -->
                  <div class="event-bx">
                    <div class="action-box">
                      <img src="assets/images/event/event_516996000-e1700323520913.webp" alt="" />
                    </div>
                    <div class="info-bx d-flex">
                      <div>
                        <div class="event-time">
                          <div class="event-date">29</div>
                          <div class="event-month">October</div>
                        </div>
                      </div>
                      <div class="event-info">
                        <h4 class="event-title">
                          <a href="#">Community Connections: A Gathering of Minds</a>
                        </h4>
                        <ul class="media-post">
                          <li>
                            <a href="#"><i class="fa fa-clock-o"></i> 7:00am
                              8:00am</a>
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-map-marker"></i> Berlin,
                              Germany</a>
                          </li>
                        </ul>
                        <p>
                         Join us for a day of shared knowledge and networking. Connect with like-minded individuals, learn from experts, and forge new connections that will last a lifetime. Together, we'll explore new ideas and inspire each other to reach new heights.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="event-bx">
                    <div class="action-box">
                      <img src="assets/images/event/IMG_0976-scaled-jpg-430x323.webp" alt="" />
                    </div>
                    <div class="info-bx d-flex">
                      <div>
                        <div class="event-time">
                          <div class="event-date">29</div>
                          <div class="event-month">October</div>
                        </div>
                      </div>
                      <div class="event-info">
                        <h4 class="event-title">
                          <a href="#">Chinese International Student Orientation – TMU</a>
                        </h4>
                        <ul class="media-post">
                          <li>
                            <a href="#"><i class="fa fa-clock-o"></i> 7:00am
                              8:00am</a>
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-map-marker"></i> Berlin,
                              Germany</a>
                          </li>
                        </ul>
                        <p>
                          Embark on a journey of discovery at The Learning Hub. Dive into a world of knowledge, where every corner holds a new opportunity to learn and grow. From interactive workshops to engaging talks, this event is designed to ignite your curiosity and fuel your passion for learning.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="event-bx">
                    <div class="action-box">
                      <img src="assets/images/event/IMG_1097-scaled-e1700408816788-400x300.jpg" alt="" />
                    </div>
                    <div class="info-bx d-flex">
                      <div>
                        <div class="event-time">
                          <div class="event-date">29</div>
                          <div class="event-month">October</div>
                        </div>
                      </div>
                      <div class="event-info">
                        <h4 class="event-title">
                          <a href="#">Learning Hub: A Day of Discovery</a>
                        </h4>
                        <ul class="media-post">
                          <li>
                            <a href="#"><i class="fa fa-clock-o"></i> 7:00am
                              8:00am</a>
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-map-marker"></i> Berlin,
                              Germany</a>
                          </li>
                        </ul>
                        <p>
                         Start your day with intention and purpose at Mindful Mornings. Join us for a series of mindful activities, including meditation, yoga, and reflective discussions. Connect with others who share your commitment to personal growth and well-being. Together, we'll create a supportive community that fosters growth and resilience
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <a href="#" class="btn">View All Event</a>
            </div>
          </div>
        </div>

        <!-- Testimonials -->
        <div class="section-area section-sp2 bg-fix ovbl-dark"
          style="background-image: url(assets/images/background/bg1.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-white heading-bx left">
                <h2 class="title-head text-uppercase">
                  what people <span>say</span>
                </h2>
                <p>
                  It is a long established fact that a reader will be
                  distracted by the readable content of a page
                </p>
              </div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
              <div class="item">
                <div class="testimonial-bx">
                  <div class="testimonial-thumb">
                    <img src="assets/images/testimonials/pic2.jpg" alt="" />
                  </div>
                  <div class="testimonial-info">
                    <h5 class="name">Peter Packer</h5>
                    <p>-Art Director</p>
                  </div>
                  <div class="testimonial-content">
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry. Lorem Ipsum has been the
                      industry's standard dummy text ever since the 1500s,
                      when an unknown printer took a galley of type...
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-bx">
                  <div class="testimonial-thumb">
                    <img src="assets/images/testimonials/pic1.jpg" alt="" />
                  </div>
                  <div class="testimonial-info">
                    <h5 class="name">Anna Becker</h5>
                    <p>-Event Director</p>
                  </div>
                  <div class="testimonial-content">
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry. Lorem Ipsum has been the
                      industry's standard dummy text ever since the 1500s,
                      when an unknown printer took a galley of type...
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Testimonials END -->

        <!-- Recent News -->
        <div class="section-area section-sp2">
          <div class="container">
            <div class="row">
              <div class="col-md-12 heading-bx left">
                <h2 class="title-head">Recent <span>Events</span></h2>
                <p>
                  Check out some of our recents Events fill with fun and entertainment
                </p>
              </div>
            </div>
            <div class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0">
              <div class="item">
                <div class="recent-news">
                  <div class="action-box">
                    <img src="assets/images/blog/latest-blog/IMG_1510-scaled-jpg-430x323 - Copy (3).webp" alt="" />
                  </div>
                  <div class="info-bx">
                    <ul class="media-post">
                      <li>
                        <a href="#"><i class="fa fa-calendar"></i>Jan 04 2024</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-user"></i>By William</a>
                      </li>
                    </ul>
                    <h5 class="post-title">
                      <a href="blog-details.html">New year Social Networking.</a>
                    </h5>
                    <p>
                      Socialize hangout and have fun.
                    </p>
                    <div class="post-extra">
                      <a href="#" class="btn-link">READ MORE</a>
                      <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>20 Comment</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="recent-news">
                  <div class="action-box">
                    <img src="assets/images/blog/latest-blog/WhatsApp-Image-2023-11-19-at-11.40.09_f248ff06-e1700418583691-400x300.jpg" alt="" />
                  </div>
                  <div class="info-bx">
                    <ul class="media-post">
                      <li>
                        <a href="#"><i class="fa fa-calendar"></i> July 8 2023</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-user"></i>By John</a>
                      </li>
                    </ul>
                    <h5 class="post-title">
                      <a href="blog-details.html">Summer Rooftop Networking Party</a>
                    </h5>
                    <p>
                      As desperate as you are right now, you have done
                      everything you can on your.
                    </p>
                    <div class="post-extra">
                      <a href="#" class="btn-link">READ MORE</a>
                      <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>14 Comment</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="recent-news">
                  <div class="action-box">
                    <img src="assets/images/blog/latest-blog/IMG_0858-scaled-e1700414648249-430x323.jpg" alt="" />
                  </div>
                  <div class="info-bx">
                    <ul class="media-post">
                      <li>
                        <a href="#"><i class="fa fa-calendar"></i>April 14 2023</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-user"></i>By George</a>
                      </li>
                    </ul>
                    <h5 class="post-title">
                      <a href="blog-details.html">Pub Night for Newcomers </a>
                    </h5>
                    <p>
                      You will see in the guide all my years of valuable
                      experience together with.
                    </p>
                    <div class="post-extra">
                      <a href="#" class="btn-link">READ MORE</a>
                      <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>23 Comment</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Recent News End -->
      </div>
      <!-- contact area END -->
    </div>
    <!-- Content END-->
    <!-- Footer ==== -->
    <footer>
      <?php include $file_dir.'inc/footer.layout.php'; ?>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up"></button>
  </div>

  <!-- External JavaScripts -->
  <?php include $file_dir.'inc/scripts.layout.php'; ?>
  <!-- Revolution JavaScripts Files -->

</body>

</html>

</html>