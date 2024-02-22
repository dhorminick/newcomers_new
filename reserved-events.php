<?php
    session_start();
    $file_dir = '';
    $file_subdir = '';
    include $file_dir.'inc/config.inc.php';
    include $file_dir.'inc/db.inc.php'; 
    $hasRegisteredEvent = false;

    if (isset($_SESSION["loggedIn"]) == true || isset($_SESSION["loggedIn"]) === true) {
        $signedIn = true;
        $user = 'etiketochukwu@gmail.com';
    } else {
        $signedIn = false;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>My Reserved Events <?php echo $site; ?></title>
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
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Reserved Events</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="/">Home</a></li>
					<li>Reserved Events</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Portfolio  -->
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
                    <?php if($signedIn == true){ ?>
                    <div class="feature-filters clearfix center m-b40">
						
					</div>
					<div class="clearfix">
                        <?php 
                            $query="SELECT * FROM newcomers_events";
                            $result=$con->query($query);
                            if ($result->num_rows > 0) {
                                $o = 0;
                                while($row = $result->fetch_assoc()){
                                $participants = $row['participants'];
                                $e_participants = unserialize($participants);
                                $db_count = count($e_participants);

                                    $isInArray = in_array_custom($user, $e_participants) ? 'found' : 'notfound';
                                    if($isInArray === 'found'){
                                        $hasRegisteredEvent = true;
                                        $o++;
                                        
                        ?>
						<ul id="masonr_y" class="ttr-gallery-listing magnific-image row">
							<li class="action-card col-lg-6 col-md-6 col-sm-12">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="events/images/<?php echo $row['event_image']; ?>" alt="<-- Event Image -->">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date"><?php echo date("d", strtotime($row["event_date"])); ?></div>
												<div class="event-month"><?php echo date("M", strtotime($row["event_date"])); ?></div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="events/upcoming/<?php echo $row['event_link']; ?>"><?php echo ucwords($row['event_title']); ?></a></h4>
											<ul class="media-post">
												<li><a href="events/upcoming/<?php echo $row['event_link']; ?>"><i class="fa fa-clock-o"></i> <?php echo date("g:ia", strtotime($row["event_time"])); ?></a></li><br>
												<li><a href="events/upcoming/<?php echo $row['event_link']; ?>"><i class="fa fa-map-marker"></i> <?php echo ucwords($row['event_location']); ?></a></li>
											</ul>
											<!-- <p><?php #echo ucwords($row['event_description']); ?></p> -->
										</div>
									</div>
								</div>
							</li>
						</ul>
                        <?php } } if($o > 0){$beg = '1';}else{$beg = '0';} ?><div class="text-center show_ing" style="font-weight: 500;font-size:18px;">Showing <?php echo $beg; ?> - <?php echo $o; ?> of <?php echo $o; ?> Reserved Event</div> <?php } ?>
                        <?php if ($hasRegisteredEvent == false) { ?>
                            <div class="_container">
                                <div style="display: flex;justify-content:center;align-items:center;height:400px;width:100%;">
                                    <div style="text-align: center;">
                                        <h3>Empty List!!</h3>
                                        <div style="margin: 15px 0px;">You have no reserved any event yet!!</div>
                                        <div><a href="/upcoming-events" class="btn btn-icon btn-primary button-lg icon-left"><i class="fa fa-arrow-left"></i> View All Upcoming Events</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
					</div>
                    <?php }else{ ?>
                        <div class="_container">
                        <div style="display: flex;justify-content:center;align-items:center;height:400px;width:100%;">
                            <div style="text-align: center;">
                                <h3>User Account Error</h3>
                                <div style="margin: 15px 0px;">Sign In To Access Your Reserved Events!!</div>
                                <div><a href="/sign-in" class="btn btn-icon btn-primary btn-lg icon-left">Sign In To Account</a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
<style>
    #masonr_y{
        list-style-type: none !important;
    }
</style>