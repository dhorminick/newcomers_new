<?php
    $file_dir = '';
    include $file_dir.'inc/config.inc.php';
    include $file_dir.'inc/db.inc.php'; 
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
      <meta
        property="og:description"
        content="NewComersUnion : Event website"
      />
      <meta property="og:image" content="" />
      <meta name="format-detection" content="telephone=no" />

      <!-- FAVICONS ICON ============================================= -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
      <link
        rel="shortcut icon"
        type="image/x-icon"
        href="assets/images/favicon.png"
      />

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
      <link
        rel="stylesheet"
        type="text/css"
        href="assets/css/shortcodes/shortcodes.css"
      />

      <!-- STYLESHEETS ============================================= -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
      <link
        class="skin"
        rel="stylesheet"
        type="text/css"
        href="assets/css/color/color-1.css"
      />

      <!-- REVOLUTION SLIDER CSS ============================================= -->
      <link
        rel="stylesheet"
        type="text/css"
        href="assets/vendors/revolution/css/layers.css"
      />
      <link
        rel="stylesheet"
        type="text/css"
        href="assets/vendors/revolution/css/settings.css"
      />
      <link
        rel="stylesheet"
        type="text/css"
        href="assets/vendors/revolution/css/navigation.css"
      />
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
                      <a href="faq-1.html"
                        ><i class="fa fa-question-circle"></i>Ask a Question</a
                      >
                    </li>
                    <li>
                      <a href="javascript:;"
                        ><i class="fa fa-envelope-o"></i>Support@website.com</a
                      >
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
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
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
                  <a href="index.html"
                    ><img src="assets/images/logo-white.png" alt=""
                  /></a>
                </div>
                <!-- Mobile Nav Button ==== -->
                <button
                  class="navbar-toggler collapsed menuicon justify-content-end"
                  type="button"
                  data-toggle="collapse"
                  data-target="#menuDropdown"
                  aria-controls="menuDropdown"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
                <!-- Author Nav ==== -->
                <div class="secondary-menu">
                  <div class="secondary-inner">
                    <ul>
                      <li>
                        <a href="javascript:;" class="btn-link"
                          ><i class="fa fa-facebook"></i
                        ></a>
                      </li>
                      <li>
                        <a href="javascript:;" class="btn-link"
                          ><i class="fa fa-google-plus"></i
                        ></a>
                      </li>
                      <li>
                        <a href="javascript:;" class="btn-link"
                          ><i class="fa fa-linkedin"></i
                        ></a>
                      </li>
                      <!-- Search Button ==== -->
                      <li class="search-btn">
                        <button
                          id="quik-search-btn"
                          type="button"
                          class="btn-link"
                        >
                          <i class="fa fa-search"></i>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Search Box ==== -->
                <div class="nav-search-bar">
                  <form action="#">
                    <input
                      name="search"
                      value=""
                      type="text"
                      class="form-control"
                      placeholder="Type to search"
                    />
                    <span><i class="ti-search"></i></span>
                  </form>
                  <span id="search-remove"><i class="ti-close"></i></span>
                </div>
                <!-- Navigation Menu ==== -->
                <div
                  class="menu-links navbar-collapse collapse justify-content-start"
                  id="menuDropdown"
                >
                  <div class="menu-logo">
                    <a href="index.html"
                      ><img src="assets/images/logo.png" alt=""
                    /></a>
                  </div>
                  <ul class="nav navbar-nav">
                    <li class="active">
                      <a href="javascript:;"
                        >Home <i class="fa fa-chevron-down"></i
                      ></a>
                      <ul class="sub-menu">
                        <li><a href="index.html">Home 1</a></li>
                        <li><a href="index-2.html">Home 2</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="javascript:;"
                        >Pages <i class="fa fa-chevron-down"></i
                      ></a>
                      <ul class="sub-menu">
                        <li>
                          <a href="javascript:;"
                            >About<i class="fa fa-angle-right"></i
                          ></a>
                          <ul class="sub-menu">
                            <li><a href="about-1.html">About 1</a></li>
                            <li><a href="about-2.html">About 2</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="javascript:;"
                            >Event<i class="fa fa-angle-right"></i
                          ></a>
                          <ul class="sub-menu">
                            <li><a href="event.html">Event</a></li>
                            <li>
                              <a href="events-details.html">Events Details</a>
                            </li>
                          </ul>
                        </li>
                        <li>
                          <a href="javascript:;"
                            >FAQ's<i class="fa fa-angle-right"></i
                          ></a>
                          <ul class="sub-menu">
                            <li><a href="faq-1.html">FAQ's 1</a></li>
                            <li><a href="faq-2.html">FAQ's 2</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="javascript:;"
                            >Contact Us<i class="fa fa-angle-right"></i
                          ></a>
                          <ul class="sub-menu">
                            <li><a href="contact-1.html">Contact Us 1</a></li>
                            <li><a href="contact-2.html">Contact Us 2</a></li>
                          </ul>
                        </li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="membership.html">Membership</a></li>
                        <li><a href="error-404.html">404 Page</a></li>
                      </ul>
                    </li>
                    <li class="add-mega-menu">
                      <a href="javascript:;"
                        >Our Courses <i class="fa fa-chevron-down"></i
                      ></a>
                      <ul class="sub-menu add-menu">
                        <li class="add-menu-left">
                          <h5 class="menu-adv-title">Our Courses</h5>
                          <ul>
                            <li><a href="courses.html">Courses </a></li>
                            <li>
                              <a href="courses-details.html">Courses Details</a>
                            </li>
                            <li>
                              <a href="profile.html">Instructor Profile</a>
                            </li>
                            <li><a href="event.html">Upcoming Event</a></li>
                            <li><a href="membership.html">Membership</a></li>
                          </ul>
                        </li>
                        <li class="add-menu-right">
                          <img src="assets/images/adv/adv.jpg" alt="" />
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="javascript:;"
                        >Blog <i class="fa fa-chevron-down"></i
                      ></a>
                      <ul class="sub-menu">
                        <li>
                          <a href="blog-classic-grid.html">Blog Classic</a>
                        </li>
                        <li>
                          <a href="blog-classic-sidebar.html"
                            >Blog Classic Sidebar</a
                          >
                        </li>
                        <li>
                          <a href="blog-list-sidebar.html">Blog List Sidebar</a>
                        </li>
                        <li>
                          <a href="blog-standard-sidebar.html"
                            >Blog Standard Sidebar</a
                          >
                        </li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                      </ul>
                    </li>
                    <li class="nav-dashboard">
                      <a href="javascript:;"
                        >Dashboard <i class="fa fa-chevron-down"></i
                      ></a>
                      <ul class="sub-menu">
                        <li><a href="admin/index.html">Dashboard</a></li>
                        <li>
                          <a href="admin/add-listing.html">Add Listing</a>
                        </li>
                        <li><a href="admin/bookmark.html">Bookmark</a></li>
                        <li><a href="admin/courses.html">Courses</a></li>
                        <li><a href="admin/review.html">Review</a></li>
                        <li>
                          <a href="admin/teacher-profile.html"
                            >Teacher Profile</a
                          >
                        </li>
                        <li>
                          <a href="admin/user-profile.html">User Profile</a>
                        </li>
                        <li>
                          <a href="javascript:;"
                            >Calendar<i class="fa fa-angle-right"></i
                          ></a>
                          <ul class="sub-menu">
                            <li>
                              <a href="admin/basic-calendar.html"
                                >Basic Calendar</a
                              >
                            </li>
                            <li>
                              <a href="admin/list-view-calendar.html"
                                >List View Calendar</a
                              >
                            </li>
                          </ul>
                        </li>
                        <li>
                          <a href="javascript:;"
                            >Mailbox<i class="fa fa-angle-right"></i
                          ></a>
                          <ul class="sub-menu">
                            <li><a href="admin/mailbox.html">Mailbox</a></li>
                            <li>
                              <a href="admin/mailbox-compose.html">Compose</a>
                            </li>
                            <li>
                              <a href="admin/mailbox-read.html">Mail Read</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <div class="nav-social-link">
                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                    <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                    <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
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
                      <h1>Take The World's Best Courses Online.</h1>
                      <p>
                        Ante amet vitae vulputate odio nulla vel pretium
                        pulvinar aenean.<br />
                        Poncus eget adipiscing etiam arcu Ultricies.
                      </p>
                      <div class="intro_button">
                        <a href="#" class="nav-link">Start my free month</a>
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
                        <img src="assets/images/our-services/pic1.jpg" alt="" />
                      </div>
                      <div class="info-bx text-center">
                        <div class="feature-box-sm radius bg-white">
                          <i class="fa fa-bank text-primary"></i>
                        </div>
                        <h4><a href="#">Best Industry Leaders</a></h4>
                        <a href="#" class="btn radius-xl">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-bx">
                      <div class="action-box">
                        <img src="assets/images/our-services/pic2.jpg" alt="" />
                      </div>
                      <div class="info-bx text-center">
                        <div class="feature-box-sm radius bg-white">
                          <i class="fa fa-book text-primary"></i>
                        </div>
                        <h4><a href="#">Learn Courses Online</a></h4>
                        <a href="#" class="btn radius-xl">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="service-bx m-b0">
                      <div class="action-box">
                        <img src="assets/images/our-services/pic3.jpg" alt="" />
                      </div>
                      <div class="info-bx text-center">
                        <div class="feature-box-sm radius bg-white">
                          <i class="fa fa-file-text-o text-primary"></i>
                        </div>
                        <h4><a href="#">Book Library & Store</a></h4>
                        <a href="#" class="btn radius-xl">View More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Our Services END -->

            <!-- Form -->
           <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(assets/images/background/bg1.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center text-white">
							<h2>Become A Member Now</h2>
							<h5>Attend Events and Seminars and Socialize</h5>
							<div class="cours-search">
    <button class="btn join-community-btn" type="button">Join the Community</button>
</div>

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
                    <p class="m-b0">Upcoming Education Events To Feed Brain.</p>
                  </div>
                </div>
                <div class="row">
                  <div
                    class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0 m-b30"
                  >
                    <div class="item">
                      <div class="event-bx">
                        <div class="action-box">
                          <img src="assets/images/event/pic4.jpg" alt="" />
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
                              <a href="#">Education Autumn Tour 2019</a>
                            </h4>
                            <ul class="media-post">
                              <li>
                                <a href="#"
                                  ><i class="fa fa-clock-o"></i> 7:00am
                                  8:00am</a
                                >
                              </li>
                              <li>
                                <a href="#"
                                  ><i class="fa fa-map-marker"></i> Berlin,
                                  Germany</a
                                >
                              </li>
                            </ul>
                            <p>
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the..
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="event-bx">
                        <div class="action-box">
                          <img src="assets/images/event/pic3.jpg" alt="" />
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
                              <a href="#">Education Autumn Tour 2019</a>
                            </h4>
                            <ul class="media-post">
                              <li>
                                <a href="#"
                                  ><i class="fa fa-clock-o"></i> 7:00am
                                  8:00am</a
                                >
                              </li>
                              <li>
                                <a href="#"
                                  ><i class="fa fa-map-marker"></i> Berlin,
                                  Germany</a
                                >
                              </li>
                            </ul>
                            <p>
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the..
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="event-bx">
                        <div class="action-box">
                          <img src="assets/images/event/pic2.jpg" alt="" />
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
                              <a href="#">Education Autumn Tour 2019</a>
                            </h4>
                            <ul class="media-post">
                              <li>
                                <a href="#"
                                  ><i class="fa fa-clock-o"></i> 7:00am
                                  8:00am</a
                                >
                              </li>
                              <li>
                                <a href="#"
                                  ><i class="fa fa-map-marker"></i> Berlin,
                                  Germany</a
                                >
                              </li>
                            </ul>
                            <p>
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the..
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
            <div
              class="section-area section-sp2 bg-fix ovbl-dark"
              style="background-image: url(assets/images/background/bg1.jpg)"
            >
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
                <div
                  class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0"
                >
                  <div class="item">
                    <div class="testimonial-bx">
                      <div class="testimonial-thumb">
                        <img src="assets/images/testimonials/pic1.jpg" alt="" />
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
                </div>
              </div>
            </div>
            <!-- Testimonials END -->

            <!-- Recent News -->
            <div class="section-area section-sp2">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 heading-bx left">
                    <h2 class="title-head">Recent <span>News</span></h2>
                    <p>
                      It is a long established fact that a reader will be
                      distracted by the readable content of a page
                    </p>
                  </div>
                </div>
                <div
                  class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0"
                >
                  <div class="item">
                    <div class="recent-news">
                      <div class="action-box">
                        <img
                          src="assets/images/blog/latest-blog/pic1.jpg"
                          alt=""
                        />
                      </div>
                      <div class="info-bx">
                        <ul class="media-post">
                          <li>
                            <a href="#"
                              ><i class="fa fa-calendar"></i>Jan 02 2019</a
                            >
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-user"></i>By William</a>
                          </li>
                        </ul>
                        <h5 class="post-title">
                          <a href="blog-details.html"
                            >This Story Behind Education Will Haunt You
                            Forever.</a
                          >
                        </h5>
                        <p>
                          Knowing that, you’ve optimised your pages countless
                          amount of times, written tons.
                        </p>
                        <div class="post-extra">
                          <a href="#" class="btn-link">READ MORE</a>
                          <a href="#" class="comments-bx"
                            ><i class="fa fa-comments-o"></i>20 Comment</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="recent-news">
                      <div class="action-box">
                        <img
                          src="assets/images/blog/latest-blog/pic2.jpg"
                          alt=""
                        />
                      </div>
                      <div class="info-bx">
                        <ul class="media-post">
                          <li>
                            <a href="#"
                              ><i class="fa fa-calendar"></i>Feb 05 2019</a
                            >
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-user"></i>By John</a>
                          </li>
                        </ul>
                        <h5 class="post-title">
                          <a href="blog-details.html"
                            >What Will Education Be Like In The Next 50
                            Years?</a
                          >
                        </h5>
                        <p>
                          As desperate as you are right now, you have done
                          everything you can on your.
                        </p>
                        <div class="post-extra">
                          <a href="#" class="btn-link">READ MORE</a>
                          <a href="#" class="comments-bx"
                            ><i class="fa fa-comments-o"></i>14 Comment</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="recent-news">
                      <div class="action-box">
                        <img
                          src="assets/images/blog/latest-blog/pic3.jpg"
                          alt=""
                        />
                      </div>
                      <div class="info-bx">
                        <ul class="media-post">
                          <li>
                            <a href="#"
                              ><i class="fa fa-calendar"></i>April 14 2019</a
                            >
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-user"></i>By George</a>
                          </li>
                        </ul>
                        <h5 class="post-title">
                          <a href="blog-details.html"
                            >Master The Skills Of Education And Be.</a
                          >
                        </h5>
                        <p>
                          You will see in the guide all my years of valuable
                          experience together with.
                        </p>
                        <div class="post-extra">
                          <a href="#" class="btn-link">READ MORE</a>
                          <a href="#" class="comments-bx"
                            ><i class="fa fa-comments-o"></i>23 Comment</a
                          >
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
