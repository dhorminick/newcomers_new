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

	<title>EduChamp : Education HTML Template </title>
	<?php include $file_dir.'inc/tags.layout.php'; ?>
	<?php include $file_dir.'inc/style.layout.php'; ?>
	<link rel="stylesheet" href="assets/main.css">
	
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
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/blog/latest-blog/WhatsApp-Image-2023-11-19-at-11.40.09_f248ff06-e1700418583691-400x300.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Events</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Events</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Portfolio  -->
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
					<div class="feature-filters clearfix center m-b40">
						<ul class="filters" data-toggle="buttons">
							<li data-filter="" class="btn active">
								<input type="radio">
								<a href="#"><span>All</span></a> 
							</li>
							<li data-filter="happening" class="btn">
								<input type="radio">
								<a href="#"><span>Happening</span></a> 
							</li>
							<li data-filter="upcoming" class="btn">
								<input type="radio">
								<a href="#"><span>Upcoming</span></a> 
							</li>
							<li data-filter="expired" class="btn">
								<input type="radio">
								<a href="#"><span>Expired</span></a> 
							</li>
						</ul>
					</div>
					<div class="clearfix">
						<ul id="masonry" class="ttr-gallery-listing magnific-image row">
							<li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="assets/images/event/pic1.jpg" alt="">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date">29</div>
												<div class="event-month">October</div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
												<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
											</ul>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-6 col-md-6 col-sm-12 upcoming">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="assets/images/event/pic2.jpg" alt="">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date">29</div>
												<div class="event-month">October</div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
												<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
											</ul>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-6 col-md-6 col-sm-12  upcoming">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="assets/images/event/pic3.jpg" alt="">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date">29</div>
												<div class="event-month">October</div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
												<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
											</ul>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="assets/images/event/pic4.jpg" alt="">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date">29</div>
												<div class="event-month">October</div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
												<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
											</ul>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-6 col-md-6 col-sm-12 expired">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="assets/images/event/pic2.jpg" alt="">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date">29</div>
												<div class="event-month">October</div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
												<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
											</ul>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="assets/images/event/pic1.jpg" alt="">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date">29</div>
												<div class="event-month">October</div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
												<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
											</ul>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
	<!-- Footer ==== -->
    <footer>
        <?php include $file_dir.'inc/footer.layout.php'; ?>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>
<!-- External JavaScripts -->
<?php include $file_dir.'inc/scripts.layout.php'; ?>
</body>

</html>
