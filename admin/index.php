<?php
	session_start();
    $file_dir = '../';
    $file_subdir = '';
    include $file_dir.'inc/config.inc.php';
    include $file_dir.'inc/db.inc.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $file_dir.'inc/admin_tags.layout.php'; ?>
	<title>Admin Dashboard <?php echo $site; ?></title>
	<?php include $file_dir.'inc/admin_style.inc.php'; ?>
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<?php include $file_dir.'inc/admin_header.layout.php'; ?>
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
	<?php include $file_dir.'inc/admin_sidebar.layout.php'; ?>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Frofit
							</h4>
							<span class="wc-des">
								All Customs Value
							</span>
							<span class="wc-stats">
								$<span class="counter">18</span>M 
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									78%
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								 New Feedbacks
							</h4>
							<span class="wc-des">
								Customer Review
							</span>
							<span class="wc-stats counter">
								120 
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									88%
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								New Orders 
							</h4>
							<span class="wc-des">
								Fresh Order Amount 
							</span>
							<span class="wc-stats counter">
								772 
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									65%
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								New Users 
							</h4>
							<span class="wc-des">
								Joined New User
							</span>
							<span class="wc-stats counter">
								350 
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									90%
								</span>
							</span>
						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<!-- <div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Your Profile Views</h4>
						</div>
						<div class="widget-inner">
							<canvas id="chart" width="100" height="45"></canvas>
						</div>
					</div>
				</div> -->
				<!-- Your Profile Views Chart END-->
				<!-- <div class="col-lg-4 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Notifications</h4>
						</div>
						<div class="widget-inner">
							<div class="noti-box-list">
								<ul>
									<li>
										<span class="notification-icon dashbg-gray">
											<i class="fa fa-check"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 02:14</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-yellow">
											<i class="fa fa-shopping-cart"></i>
										</span>
										<span class="notification-text">
											<a href="#">Your order is placed</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 7 Min</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-red">
											<i class="fa fa-bullhorn"></i>
										</span>
										<span class="notification-text">
											<span>Your item is shipped</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 2 May</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-green">
											<i class="fa fa-comments-o"></i>
										</span>
										<span class="notification-text">
											<a href="#">Sneha Jogi</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 14 July</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-primary">
											<i class="fa fa-file-word-o"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 15 Min</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->
				<!-- <div class="col-lg-6 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>New Users</h4>
						</div>
						<div class="widget-inner">
							<div class="new-user-list">
								<ul>
									<li>
										<span class="new-users-pic">
											<img src="assets/images/testimonials/pic1.jpg" alt=""/>
										</span>
										<span class="new-users-text">
											<a href="#" class="new-users-name">Anna Strong </a>
											<span class="new-users-info">Visual Designer,Google Inc </span>
										</span>
										<span class="new-users-btn">
											<a href="#" class="btn button-sm outline">Follow</a>
										</span>
									</li>
									<li>
										<span class="new-users-pic">
											<img src="assets/images/testimonials/pic2.jpg" alt=""/>
										</span>
										<span class="new-users-text">
											<a href="#" class="new-users-name"> Milano Esco </a>
											<span class="new-users-info">Product Designer, Apple Inc </span>
										</span>
										<span class="new-users-btn">
											<a href="#" class="btn button-sm outline">Follow</a>
										</span>
									</li>
									<li>
										<span class="new-users-pic">
											<img src="assets/images/testimonials/pic1.jpg" alt=""/>
										</span>
										<span class="new-users-text">
											<a href="#" class="new-users-name">Nick Bold  </a>
											<span class="new-users-info">Web Developer, Facebook Inc </span>
										</span>
										<span class="new-users-btn">
											<a href="#" class="btn button-sm outline">Follow</a>
										</span>
									</li>
									<li>
										<span class="new-users-pic">
											<img src="assets/images/testimonials/pic2.jpg" alt=""/>
										</span>
										<span class="new-users-text">
											<a href="#" class="new-users-name">Wiltor Delton </a>
											<span class="new-users-info">Project Manager, Amazon Inc </span>
										</span>
										<span class="new-users-btn">
											<a href="#" class="btn button-sm outline">Follow</a>
										</span>
									</li>
									<li>
										<span class="new-users-pic">
											<img src="assets/images/testimonials/pic3.jpg" alt=""/>
										</span>
										<span class="new-users-text">
											<a href="#" class="new-users-name">Nick Stone </a>
											<span class="new-users-info">Project Manager, Amazon Inc  </span>
										</span>
										<span class="new-users-btn">
											<a href="#" class="btn button-sm outline">Follow</a>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Orders</h4>
						</div>
						<div class="widget-inner">
							<div class="orders-list">
								<ul>
									<li>
										<span class="orders-title">
											<a href="#" class="orders-title-name">Anna Strong </a>
											<span class="orders-info">Order #02357 | Date 12/08/2019</span>
										</span>
										<span class="orders-btn">
											<a href="#" class="btn button-sm red">Unpaid</a>
										</span>
									</li>
									<li>
										<span class="orders-title">
											<a href="#" class="orders-title-name">Revenue</a>
											<span class="orders-info">Order #02357 | Date 12/08/2019</span>
										</span>
										<span class="orders-btn">
											<a href="#" class="btn button-sm red">Unpaid</a>
										</span>
									</li>
									<li>
										<span class="orders-title">
											<a href="#" class="orders-title-name">Anna Strong </a>
											<span class="orders-info">Order #02357 | Date 12/08/2019</span>
										</span>
										<span class="orders-btn">
											<a href="#" class="btn button-sm green">Paid</a>
										</span>
									</li>
									<li>
										<span class="orders-title">
											<a href="#" class="orders-title-name">Revenue</a>
											<span class="orders-info">Order #02357 | Date 12/08/2019</span>
										</span>
										<span class="orders-btn">
											<a href="#" class="btn button-sm green">Paid</a>
										</span>
									</li>
									<li>
										<span class="orders-title">
											<a href="#" class="orders-title-name">Anna Strong </a>
											<span class="orders-info">Order #02357 | Date 12/08/2019</span>
										</span>
										<span class="orders-btn">
											<a href="#" class="btn button-sm green">Paid</a>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title custom">
							<h4>Recently Opened Events:</h4>
                            <div class="wc-title-action">
                                <a href="event/create-event"><button class="btn btn-primary btn-icon icon-left"><i class="fa fa-plus"></i> Create New Event</button></a>
                                <a href="events"><button class="btn btn-secondary btn-icon icon-right">View All <i class="fa fa-arrow-right"></i></button></a>
                            </div>
						</div>
						<div class="widget-inner">
                            <div class="event_list" id="svnsf">
                                <table id="table" class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th style="width:10%;">S/N</th>
                                            <th style="width:37%;">Event Title</th>
                                            <th style="width:13%;">Event Price</th>
                                            <th style="width:23%;">Event Date</th>
                                            <th style="width:10%;">Participants</th>
                                            <th style="width:7%;">...</th>
                                        </tr>
                                        <?php 
                                            $checkIfEventExists = "SELECT * FROM newcomers_events ORDER BY id DESC limit 5";
                                            $eventExists = $con->query($checkIfEventExists);
                                            $i = 0;
                                            if($eventExists->num_rows > 0){
                                                $reg_count = $eventExists->num_rows;
                                                if($reg_count > 0){$beg = '1';}else{$beg = '0';}
                                                while ($item = $eventExists->fetch_assoc()) { $i++;
                                                    $participant = count(unserialize($item['participants']));
                                                    if(strtolower($item['event_price']) == 'free'){
                                                        $event_price = 'Free!!';
                                                    }else{
                                                        $event_price = '$'.$item['event_price'];
                                                    }
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo ucwords($item['event_title']); ?></td>
                                            <td><?php echo $event_price; ?></td>
                                            <td><?php echo date("D\. jS \of F Y", strtotime($item["event_date"])); ?></td>
                                            <td><?php echo $participant; ?></td>
                                            <td><a href='events?id=<?php echo $item['event_id']; ?>' class="btn btn-primary button-sm btn-icon icon-right">View <i class="fa fa-arrow-right"></i></a></td>
                                        </tr>
                                        <?php } }else{ #empty ?>
                                        <tr><td style="margin:10px 0px;text-align:center;" colspan='12'>No Registered User Yet!!</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="text-right" style="margin-top:20px;">Showing <?php echo $beg; ?> - <?php echo $reg_count; ?> of <?php echo $reg_count; ?> Opened Events</div>
                            </div>
						</div>
					</div>
				</div>
                <div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="wc-title custom">
							<h4>New Users:</h4>
                            <div class="wc-title-action">
                                <a href="users"><button class="btn btn-secondary btn-icon icon-right">View All <i class="fa fa-arrow-right"></i></button></a>
                            </div>
						</div>
						<div class="widget-inner">
                            <div class="event_list">
                                <table id="table" class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th style="width:10%;">S/N</th>
                                            <th style="width:35%;">Email Address</th>
                                            <th style="width:35%;">Full Name</th>
                                            <th style="width:20%;">Date Of Registration</th>
                                        </tr>
                                        <?php 
                                            $checkIfUserExists = "SELECT * FROM newcomers_users ORDER BY id DESC limit 5";
                                            $userExists = $con->query($checkIfUserExists);
                                            $i = 0;
                                            if($userExists->num_rows > 0){
                                                $reg_count = $userExists->num_rows;
                                                if($reg_count > 0){$beg = '1';}else{$beg = '0';}
                                                while ($item = $userExists->fetch_assoc()) { $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $item['email']; ?></td>
                                            <td><?php echo ucwords($item['firstname'].' '.$item['lastname']); ?></td>
                                            <td><?php echo date("D\. jS \of F Y", strtotime($item["reg_date"])); ?></td>
                                        </tr>
                                        <?php } }else{ #empty ?>
                                        <tr><td style="margin:10px 0px;text-align:center;" colspan='12'>No Registered User Yet!!</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="text-right" style="margin-top:20px;">Showing <?php echo $beg; ?> - <?php echo $reg_count; ?> of <?php echo $reg_count; ?> Registered User</div>
                            </div>
						</div>
					</div>
				</div>
                <div class="col-lg-4 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Notifications</h4>
						</div>
						<div class="widget-inner">
							<div class="noti-box-list">
								<ul>
									<li>
										<span class="notification-icon dashbg-gray">
											<i class="fa fa-check"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 02:14</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-yellow">
											<i class="fa fa-shopping-cart"></i>
										</span>
										<span class="notification-text">
											<a href="#">Your order is placed</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 7 Min</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-red">
											<i class="fa fa-bullhorn"></i>
										</span>
										<span class="notification-text">
											<span>Your item is shipped</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 2 May</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-green">
											<i class="fa fa-comments-o"></i>
										</span>
										<span class="notification-text">
											<a href="#">Sneha Jogi</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 14 July</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-primary">
											<i class="fa fa-file-word-o"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 15 Min</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<?php include $file_dir.'inc/admin_scripts.inc.php'; ?>
</body>

</html>
<style>
    .wc-title.custom{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>