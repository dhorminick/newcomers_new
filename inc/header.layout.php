<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="contact-us"><i class="fa fa-question-circle"></i>Help</a></li>
							<li><a href="mailto:<?php echo $siteMainEmail; ?>"><i class="fa fa-envelope-o"></i><?php echo $siteMainEmail; ?></a></li>
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
						<a href="index.php"><img src="assets/images/logo.png" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.php"><img src="assets/images/logo.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
							<li class="active"><a href="index">Home</a> </li>
							<li class="active"><a href="contact-us">Contact</a> </li>
							<li class="active"><a href="about-us">About Us</a> </li>
							<li class="active"><a href="event">Events <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="#">Upcoming Events</a></li>
									<li><a href="#">Past Event Highlights</a></li>
								</ul>
							</li>
							<?php if($signedIn == true){ ?>
							<li class="active"><a href="javascript:;">My Account <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="#">Reserved Events</a></li>
									<li><a href="#">Account Settings</a></li>
								</ul>
							</li>
							<?php } ?>
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

		<style>
			#bdvgh li{
				margin: 5px;
			}
			/* .header .is-fixed .menu-bar{
				background-color: var(--sc-primary) !important;
				color: white;
			} */
		</style>