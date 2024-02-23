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
  <head>
    <title>NewComersUnion</title>
    <?php include $file_dir.'inc/tags.layout.php'; ?>
    <?php include $file_dir.'inc/style.layout.php'; ?>
  </head>
  <body id="bg">
    <div class="page-wraper">
      <div id="loading-icon-bx"></div>
      <!-- Header Top ==== -->
      <header class="header rs-nav">
        <?php include $file_dir.'inc/header.layout.php'; ?>
      </header>
      <!-- header END ==== -->
      <!-- Content -->
      <div class="page-content bg-white">
        <!-- inner page banner -->
        <div
          class="page-banner ovbl-dark"
          style="background-image: url(assets/images/blog/latest-blog/WhatsApp-Image-2023-11-19-at-11.40.09_f248ff06-e1700418583691-400x300.jpg)"
        >
          <div class="container">
            <div class="page-banner-entry">
              <h1 class="text-white">Contact Us</h1>
            </div>
          </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
          <div class="container">
            <ul class="list-inline">
              <li><a href="index.php">Home</a></li>
              <li>Contact Us</li>
            </ul>
          </div>
        </div>
        <div class="content-block">
          <div class="page-banner contact-page section-sp2">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-5 m-b30">
                  <div class="bg-primary text-white contact-info-bx">
                    <h2 class="m-b10 title-head">
                      Contact <span>Information</span>
                    </h2>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                    </p>
                    <div class="widget widget_getintuch">
                      <ul>
                        <li>
                          <i class="ti-location-pin"></i>75k Newcastle St. Ponte
                          Vedra Beach, FL 309382 New York
                        </li>
                        <li>
                          <i class="ti-mobile"></i>0800-123456 (24/7 Support
                          Line)
                        </li>
                        <li><i class="ti-email"></i>info@example.com</li>
                      </ul>
                    </div>
                    <h5 class="m-t0 m-b20">Follow Us</h5>
                    <ul class="list-inline contact-social-bx">
                      <li>
                        <a href="#" class="btn outline radius-xl"
                          ><i class="fa fa-facebook"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="btn outline radius-xl"
                          ><i class="fa fa-twitter"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="btn outline radius-xl"
                          ><i class="fa fa-linkedin"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="btn outline radius-xl"
                          ><i class="fa fa-google-plus"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-7 col-md-7">
                  <form
                    class="contact-bx ajax-form"
                    action="http://educhamp.themetrades.com/demo/assets/script/contact.php"
                  >
                    <div class="ajax-message"></div>
                    <div class="heading-bx left">
                      <h2 class="title-head">Get In <span>Touch</span></h2>
                      <p>
                        It is a long established fact that a reader will be
                        distracted by the readable content of a page
                      </p>
                    </div>
                    <div class="row placeani">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <div class="input-group">
                            <label>Your Name</label>
                            <input
                              name="name"
                              type="text"
                              required
                              class="form-control valid-character"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <div class="input-group">
                            <label>Your Email Address</label>
                            <input
                              name="email"
                              type="email"
                              class="form-control"
                              required
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <div class="input-group">
                            <label>Your Phone</label>
                            <input
                              name="phone"
                              type="text"
                              required
                              class="form-control int-value"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <div class="input-group">
                            <label>Subject</label>
                            <input
                              name="subject"
                              type="text"
                              required
                              class="form-control"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <div class="input-group">
                            <label>Type Message</label>
                            <textarea
                              name="message"
                              rows="4"
                              class="form-control"
                              required
                            ></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <div class="input-group">
                            <div
                              class="g-recaptcha"
                              data-sitekey="6Lf2gYwUAAAAAJLxwnZTvpJqbYFWqVyzE-8BWhVe"
                              data-callback="verifyRecaptchaCallback"
                              data-expired-callback="expiredRecaptchaCallback"
                            ></div>
                            <input
                              class="form-control d-none"
                              style="display: none"
                              data-recaptcha="true"
                              required
                              data-error="Please complete the Captcha"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <button
                          name="submit"
                          type="submit"
                          value="Submit"
                          class="btn button-md"
                        >
                          Send Message
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content END-->
      <!-- Footer ==== -->
      <footer>
        <?php include $file_dir.'inc/footer.layout.php'; ?>
      </footer>
    </div>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up"></button>
    <!-- External JavaScripts -->
    <?php include $file_dir.'inc/scripts.layout.php'; ?>
  </body>
</html>
