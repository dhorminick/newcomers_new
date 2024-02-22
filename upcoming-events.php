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

	<title>Upcoming Events <?php echo $site; ?></title>
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
                    <h1 class="text-white">Upcoming Events</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="/">Home</a></li>
					<li>Upcoming Events</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
			<div class="section-area section-sp1 gallery-bx custom">
				<div class="container">
                    <div class="clearfix">
                        <div id="masonr_y" class="ttr-gallery-listing magnific-image row">
                        <?php 
                            $query="SELECT * FROM newcomers_events WHERE event_status = 'upcoming'";
                            $result=$con->query($query);
                            if ($result->num_rows > 0) { $o = 0; while($row = $result->fetch_assoc()){ $o++;
                        ?>
						
							<div class="action-card col-12 row">
                                <div class="col-lg-4 col-12 e_banner">
                                    <img src="events/images/<?php echo $row['event_image']; ?>" alt="<-- Event Image -->">
                                </div>
                                <div class="col-lg-8 col-12 e_main">
                                    <div class="date_ee">
                                        <div class="event_time">
                                            <div class="event-date"><?php echo date("d", strtotime($row["event_date"])); ?></div>
                                            <div class="event-month"><?php echo date("M", strtotime($row["event_date"])); ?></div>
                                        </div>
                                    </div>
                                    <div class="e_header"><h4><a href="events/upcoming/<?php echo $row['event_link']; ?>"><?php echo ucwords($row['event_title']); ?></a></h4></div>
                                    <div class="e_mid">
                                        <div class="e_date"><span style="font-weight: 500;"><i class="fa fa-calendar"></i> Date:</span> <?php echo date("D\. jS \of F Y", strtotime($row["event_date"])); ?></div>
                                        <div class="e_time"><span style="font-weight: 500;"><i class="fa fa-clock-o"></i> Time:</span> <?php echo date("g:ia", strtotime($row["event_time"])); ?></div>
                                        <div class="e_location"><span style="font-weight: 500;"><i class="fa fa-map-marker"></i> Venue:</span> <?php echo ucwords($row['event_location']); ?></div>
                                    </div>
                                    <div class="e_body truncate-overflow"><?php echo $row['event_description']; ?></div>
                                    <div class="e_footer">
                                        <div class="text-right">
                                            <a href="events/upcoming/<?php echo $row['event_link']; ?>" class="btn btn-primary btn-icon icon-left btn-md txt-white">View Event</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action-card col-12 row" style="display: none;">
                                <div class="col-lg-8 col-12 e_main">
                                    <div class="date_ee">
                                        <div class="event_time">
                                            <div class="event-date"><?php echo date("d", strtotime($row["event_date"])); ?></div>
                                            <div class="event-month"><?php echo date("M", strtotime($row["event_date"])); ?></div>
                                        </div>
                                    </div>
                                    <div class="e_header"><h4><a href="events/upcoming/<?php echo $row['event_link']; ?>"><?php echo ucwords($row['event_title']); ?></a></h4></div>
                                    <div class="e_mid row">
                                        <div class="e_date col-lg-5 col-12"><span style="font-weight: 500;"><i class="fa fa-calendar"></i> Date:</span> <?php echo date("D\. jS \of F Y", strtotime($row["event_date"])); ?></div>
                                        <div class="e_time col-lg-4 col-12"><span style="font-weight: 500;"><i class="fa fa-clock-o"></i> Time:</span> <?php echo date("g:ia", strtotime($row["event_time"])); ?></div>
                                        <div class="e_location col-12"><span style="font-weight: 500;"><i class="fa fa-map-marker"></i> Venue:</span> <?php echo ucwords($row['event_location']); ?></div>
                                    </div>
                                    <div class="e_body truncate-overflow"><?php echo $row['event_description']; ?></div>
                                    <div class="e_footer">
                                        <div class="text-right">
                                            <a href="events/upcoming/<?php echo $row['event_link']; ?>" class="btn btn-primary btn-icon icon-left btn-md txt-white">View Event</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 e_banner">
                                    <img src="events/images/<?php echo $row['event_image']; ?>" alt="<-- Event Image -->">
                                </div>
                                
                            </div>
						
                        <?php }  if($o > 0){$beg = '1';}else{$beg = '0';} ?><div class="text-center show_ing" style="font-weight: 500;font-size:18px;">Showing <?php echo $beg; ?> - <?php echo $o; ?> of <?php echo $o; ?> Reserved Event</div>
                        </div>
                    </div>
                    <?php }else{ ?>
                        <div class="_container col-12">
                        <div style="display: flex;justify-content:center;align-items:center;height:400px;width:100%;">
                            <div style="text-align: center;">
                                <h3>Upcoming Events List Empty!!</h3>
                                <div style="margin: 15px 0px;">No upcoming events registered yet, check back again soon.</div>
                                <div><a href="/events-highlights" class="btn btn-icon btn-primary btn-lg icon-left txt-white"><i class="fa fa-arrow-left"></i> View Past Events Highlights</a></div>
                            </div>
                        </div>
                    </div>
                    <style>#dvbi{display:none;}</style>
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
    .section-sp1.custom {
        /* margin: 50px 0; */
    }

    .section-sp1.custom {
        /* padding-top: 80px; */
        padding-bottom: 50px;
    }
    .date_ee{
        position: absolute;
        right: 10px;
        top: 0px;
    }
    .event_time {
        color: #fff;
        background-color: var(--primary);
        text-align: center;
        padding: 15px 10px;
        font-weight: 600;
        border-radius: 0px 0px 10px 10px;
    }
    #masonr_y{
        list-style-type: none !important;
    }
    .action-card.col-12.row{
        padding: unset !important;
        margin: 0px 0px 20px 0px !important;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* margin-bottom: 10px !important; */
        border-radius: 10px;
    }
    .e_banner img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        margin: 0px !important;
    }
    .e_banner{
        width: 300px;
        /* height: 360px; */
        object-fit: cover;
        border: 1px solid var(--primary);
        border-radius: 10px 0px 0px 10px;
        padding: 0px !important;
    }
    .e_main{
        padding: 15px 20px;
        min-height: 360px;
    }
    .e_mid{
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .e_mid i{
        margin-right: 3px;
    }
    .txt-white{
        color: white !important;
    }
    .e_body{
        min-height: 155px;
    }
    :root {
    --lh: 1.4rem;
    }
    .truncate-overflow {
        --max-lines: 6;
        position: relative;
        max-height: calc(var(--lh) * var(--max-lines));
        overflow: hidden;
        padding-right: 1rem;
    }
    html {
        line-height: var(--lh);
    }
    .truncate-overflow::after {
        content: "";
        position: absolute;
        right: 0;
        width: 1rem;
        height: 1rem;
        background: white;
    }
</style>