<?php
$CheckIfUserExist = "SELECT * FROM newcomers_events WHERE event_id = '$id' LIMIT 1";
$UserExist = $con->query($CheckIfUserExist);
if ($UserExist->num_rows > 0) {
    $row = $UserExist->fetch_assoc();
    $pageTitle = $row['event_title'];
    $event_date = date("D\. jS \of F Y", strtotime($row["event_date"]));
    $event_time = $row['event_time'];
    $event_header = $row['event_title'];
    $event_img = $row['event_image'];

    if(strtolower($row['event_price']) == 'free'){
        $event_price = 'Free!!';
    }else{
        $event_price = '$'.$row['event_price'];
    }
    
    $event_location = $row['event_location'];
    $event_upvotes = '10';
    $event_reviews = '0';
}else{
    include $file_dir.'inc/error_event_page.php';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle.' '.$site; ?></title>

    <?php include $file_dir.'inc/header.layout.php'; ?>
</head>
<body>
    <header class="header_four">
    <?php include $file_dir.'inc/nav.layout.php'; ?>
    </header>

    <section class="event">
        <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="_top">
                    <div class="_top_left">
                        <a href="/event/upcoming"><button class="btn btn-primary btn-icon icon-left btn-md"><i class="fas fa-arrow-left"></i> All Events</button></a>
                    </div>
                    <div class="_top_right">
                        <span class="_top_right_date"><i class="fas fa-calendar-alt"></i> <?php echo $event_date; ?></span>
                        <span class="_top_right_time"><i class="fas fa-clock"></i> <?php echo $event_time; ?></span>
                    </div>
                </div>
                <div class="_center">
                    <img src="<?php echo $file_dir.'events/images/'.$event_img; ?>" class="img-fluid" alt="__Event Image__" srcset="">
                    <div class="post_response_count d-flex justify-content-between">
                        <ul class="d-flex tags">
                            <!-- <li class="tag_headline">Event Tags : </li>
                            <li>Piterson</li>
                            <li>Cavien</li>
                            <li>Piterson</li>
                            <li>Cavien</li> -->
                        </ul>
                        <ul class="d-flex comnent_count">
                            <li><i class="fas fa-thumbs-up"></i><?php echo $event_upvotes; ?> Upvote(s)</li>
                            <li><i class="fas fa-comment"></i><?php echo $event_reviews; ?> Review(s)</li>
                        </ul>  
                    </div>
                </div>
                <div class="_header"><h3><?php echo $event_header; ?></h3></div>
                <div class="_bottom">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius.</p>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                    <p>iscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                </div>

                <div class="_share blog_wrapper social_wrapper">
                    <ul class="custom social_items list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook-f fb_icon"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter tw_icon"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in link_icon"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram in_icon"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb_40">
                <div class="join_event">
                    <div class="reg_even">
                        <h4>Become A Member</h4>
                        <p class="p_10">Sign Up to gain full access to events subscription and details!</p>
                        <p><a href="/auth/sign-up"><button class="btn btn-primary btn-icon icon-left btn-lg">Join Community</button></a></p>
                    </div>
                </div>
                <div class="event_summary">
                    <h4 class="_sum_header">Event Summary:</h4>
                    <p><span class="sum_header">Event Timer :</span> <span id="_timer"></span></p>
                    <p><span class="sum_header">Event Date :</span> <?php echo $event_date; ?></p>
                    <p><span class="sum_header">Event Time :</span> <?php echo $event_time; ?></p>
                    <p><span class="sum_header">Event Venue :</span> <?php echo $event_location; ?></p>
                    <p><span class="sum_header">Event Fee :</span> <?php echo $event_price; ?></p>

                    <?php if (isset($_SESSION["loggedIn"]) == true || isset($_SESSION["loggedIn"]) === true) { ?>
                    <?php }else{ ?>
                    <div id="rsv_err">
                        <button class="btn btn-primary btn-lg btn-icon icon-left" disabled><i class="fas fa-check-circle"></i> Reserve Event</button>   
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </section>

    
    <?php include $file_dir.'inc/footer.layout.php'; ?>
    <?php include $file_dir.'inc/scripts.layout.php'; ?>
</body>
</html>

<style>
    .event_summary{
        position: -webkit-sticky; /* Safari */
        position: sticky;
        top: 20px;
    }
    .btn:disabled{
        cursor: not-allowed;
    }
    .blog_wrapper.social_wrapper .social-items li a .fb_icon {
          color: #4867aa; }
        .blog_wrapper.social_wrapper .social-items li a .tw_icon {
          color: #1da1f2; }
        .blog_wrapper.social_wrapper .social-items li a .link_icon {
          color: #0077B5; }
        .blog_wrapper.social_wrapper .social-items li a .in_icon {
          color: #262223; }
          .blog_wrapper.social_wrapper .social-items li a i {
          padding: 0;
          height: 30px;
          width: 30px;
          text-align: center;
          line-height: 29px;
          border-radius: 50%;
          font-size: 15px;
          margin: 0;
          background: transparent;
          -webkit-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out; }
          .blog_wrapper.social_wrapper .social-items li a i:hover {
            padding: 0;
            -webkit-transform: scale(1.3);
                    transform: scale(1.3); }
    #_timer{
        /* font-size: 3em; */
        /* font-weight: bolder;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100px;
        padding: 20px; */
    }
    .e_div{
        font-size: 1.5em;
        font-weight: bolder;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #rsv_err{
        width: 100%;
        margin-top: 20px;
        /* display: flex;
        align-items: center;
        justify-content: center; */
    }
    #rsv_err button{
        width: 100%;
        font-size: 15px !important;
    }
    ._top{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    ._top_right span + span{
        margin-left: 20px;
    }
    .d-flex.comnent_count i{
        margin-right: 5px;
    }
    .d-flex.comnent_count li{
        margin-right: 20px;
    }
    ._top_right span i{
        margin-right: 5px;
    }
    ._center img{
        width: 100%;
        /* min-height: 300px; */
        border-radius: 5px;
    }
    ._bottom{
        margin-top: 10px;
    }
    ._header{
        margin: 30px 0px 20px 0px;
    }
    section.event{
        padding: 30px !important;
    }
    .reg_even{
        border-radius: 5px;
        padding: 20px;
        background: linear-gradient(65deg, #5958a0 0%, #111b51 100%);
        padding: 40px 30px;
        text-align: center;
        -webkit-box-shadow: 0px 0px 81px 0px rgba(47, 47, 47, 0.1);
        box-shadow: 0px 0px 81px 0px rgba(47, 47, 47, 0.1);
    }
    .mb_40{
        margin-top: 58px;
    }
    .reg_even *{
        color: white !important;
    }
    .p_10{
        margin: 20px 0px;
        line-height: normal !important;
    }
    .sum_header{
        font-weight: bolder
    }
    .event_summary{
        padding: 20px;
        background-color: rgba( 0, 0, 0, 0.02 );
        margin-top: 20px;
        border-radius: 5px;
    }
    .event_summary ._sum_header{
        margin-bottom: 20px;
    }
    .event_summary p{
        background-color: rgba( 0, 0, 0, 0.05 );
        padding: 10px 15px;
        border-radius: 5px;
    }
    .post_response_count{
        margin-top: 10px;
    }
</style>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?php echo date("M d\, Y", strtotime($row["event_date"])); ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
        
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
        
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    // Output the result in an element with id="demo"
    document.getElementById("_timer").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("_timer").innerHTML = "EXPIRED";
    }
    }, 1000);
</script>