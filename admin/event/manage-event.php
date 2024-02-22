<?php 
    
    $file_dir = '../../';
    $file_subdir = '../';
    include $file_dir.'inc/config.inc.php';
    include $file_dir.'inc/db.inc.php'; 
    $message = [];

    $toDisplay = false;

    if (isset($_GET['id']) && isset($_GET['id']) !== "") {
        $e_id = sanitizePlus($_GET['id']);
        $toDisplay = true;

        $checkIfEventExists = "SELECT * FROM newcomers_events WHERE event_id = '$e_id'";
        $eventExists = $con->query($checkIfEventExists);
        if ($eventExists->num_rows > 0) {	
            $event_exist = true;
            $info = $eventExists->fetch_assoc();
        }else{
            $event_exist = false;
            $toDisplay = false;
        }
    }

    if (isset($_POST["close-event"])) {
        #update database
        $updateEvent = "UPDATE newcomers_events SET event_status = 'closed' WHERE event_id = '$e_id'";
        $updateEventResult = $con->query($updateEvent);
        if ($updateEventResult) {
            if(rename("/events/upcoming/".$info['event_link'].".php", "/events/closed/".$info['event_link'].".php")){
                array_push($message, "Event - ".strtoupper($e_id)." - CLosed Successfully!!");
            }else{
                array_push($message, "Error: Event - ".strtoupper($e_id)." - CLosed Successfully, Failed To Update File Structure!!");
            }    
        }else{
            array_push($message, "Error");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $file_dir.'inc/admin_tags.layout.php'; ?>
	<title>Manage Event <?php echo $site; ?></title>
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
					<li><a href="#"><i class="f fa-home"></i>Home</a></li>
					<li>Manage Event</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="ro">
				<section class="manage_event">
                    <?php if($toDisplay == true){ ?>
                    <div class="_container">
                        <div class="chard custom">
                            <?php include $file_dir.'inc/alert.inc.php'; ?>
                            <div class="chard-header">
                                <h4>Event Details:</h4>
                                <div class="chard-header-action">
                                    <a href="update-event?id=<?php echo $info['event_id']; ?>"><button class="btn btn-primary btn-icon icon-left"><i class="fa fa-arrow-left"></i> Edit Event</button></a>
                                    <button class="btn btn-secondary btn-icon icon-left" data-toggle="modal" data-target="#closeEvent" id='close_event' event='<?php echo $info['event_id']; ?>'><i class="fa fa-times-circle"></i> Close Event</button>
                                </div>
                            </div>
                            <div class="chard-body" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-3">
                                        <label for="id">Event ID:</label>
                                        <span class="form_control"><?php echo $info['event_id']; ?></span>
                                    </div>
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="id">Event Date:</label>
                                        <span class="form_control"><?php echo date("D\. jS \of F Y", strtotime($info["event_date"])); ?></span>
                                    </div>
                                    <div class="form-group col-12 col-lg-3">
                                        <label for="id">Event Time:</label>
                                        <span class="form_control"><?php echo $info['event_time']; ?></span>
                                    </div>
                                    <div class="form-group col-12 col-lg-2">
                                        <label for="id">Event Price:</label>
                                        <span class="form_control"><?php if(strtolower($info['event_price']) == 'free'){ $event_price = 'Free!!'; }else{ $event_price = '$'.$info['event_price']; } echo $event_price; ?></span>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="id">Event Title:</label>
                                        <span class="form_control"><?php echo $info['event_title']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="chard custom">
                            <div class="chard-header">
                                <h4>Event Participants:</h4>
                                <div class="chard-header-action">
                                    <a href="../mass-mail?id=<?php echo $info['event_id']; ?>"><button class="btn btn-primary btn-icon icon-left"><i class="fa fa-arrow-left"></i> Mass Mail</button></a>
                                    <button class="btn btn-secondary btn-icon icon-left" data-toggle="modal" data-target="#addParticipants"><i class="fa fa-plus"></i> Add Participant</button>
                                </div>
                            </div>
                            <div class="chard-body" style="margin-top: 10px;">
                                <div class="updating_list">
                                    <div class="updating_list_main">
                                        <div><h3>Updating Participant List...</h3></div>
                                    </div>
                                </div>
                                <div class="event_list" id="svnsf">
                                    <table id="table" class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th style="width:10%;">S/N</th>
                                                <th style="width:30%;">Full Name</th>
                                                <th style="width:30%;">Email Address</th>
                                                <th style="width:20%;">Date Of Registation</th>
                                                <th style="width:10%;">...</th>
                                            </tr>
                                            <?php 
                                                $i = 0;
                                                $reg_users = unserialize($info['participants']);
                                                $reg_count = count($reg_users);
                                                if($reg_count > 0){$beg = '1';}else{$beg = '0';}
                                                if($reg_users !== []){
                                                foreach ($reg_users as $item) { $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td><?php echo $item['email']; ?></td>
                                                <td><?php echo date("D\. jS \of F Y", strtotime($item["date"])); ?></td>
                                                <td><button class="btn btn-danger btn-icon icon-left del_participnt" onclick="delUser('<?php echo $item['id']; ?>', '<?php echo $info['event_id']; ?>')" ><i class="fa fa-trash"></i> Delete</button></td>
                                            </tr>
                                            <?php } }else{ #empty ?>
                                            <tr><td style="margin:10px 0px;text-align:center;" colspan='12'>No Registered Participant Yet!!</td></tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="text-right show_ing">Showing <?php echo $beg; ?> - <?php echo $reg_count; ?> of <?php echo $reg_count; ?> Participants</div>
                                </div>
                            </div>
                        </div>
                    </div>                    

                    <div class="modal fade review-bx-reply" id="addParticipants" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Participant Email Address:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="add_event_participant">
                                    <div class="modal-body">
                                    <div id="res">Participant Added Succesfully</div>
                                    <div class="form-roup">
                                        <label for="id" style="float:left;">Email Address:</label>
                                        <input type="text" class="form-control" name="participant_email" id="id">
                                        <input type="hidden" name="e_id" value="<?php echo $info['event_id']; ?>">
                                    </div>
                                    <div class="form-roup" style="margin-top: 10px;">
                                        <label for="name" style="float:left;">Full Name:</label>
                                        <input type="text" class="form-control" name="participant_name" id="name">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="chard-footer text-right">
                                        <button class="btn btn-primary btn-icon icon-left" type="submit"><i class="fa fa-plus"></i> Add</button>
                                        <button class="btn btn-secondary btn-icon icon-left" type="button" id="cancel_add"><i class="fa fa-times-circle"></i> Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade review-bx-reply" id="closeEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Close Event:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                    
                                        <div class="chard-body" style="text-align: center;">
                                            <p>Are you sure you want to update the status of event <br><span id="i_d"><?php echo strtoupper($info['event_id']); ?></span><br> to closed?</p>
                                            <input type="hidden" name="e_id" value="<?php echo $info['event_id']; ?>">
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <div class="chard-footer">
                                            <button class="btn btn-primary btn-icon icon-left" type="submit" name="close-event"><i class="fa fa-check"></i> Close Event</button>
                                            <button class="btn btn-secondary btn-icon icon-left" type="button" id="cancel_close"><i class="fa fa-times-circle"></i> Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php }else{ ?>
                        <div class="_container">
                            <div style="display: flex;justify-content:center;align-items:center;height:400px;width:100%;">
                                <div style="text-align: center;">
                                    <h3>Error 402!!</h3>
                                    <div style="margin: 15px 0px;">Event ID Does not Exist!</div>
                                    <div><a href="/" class="btn btn-icon btn-primary btn-lg icon-left"><i class="fa fa-arrow-left"></i> Back Home</a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </section>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<?php include $file_dir.'inc/admin_scripts.inc.php'; ?>
</body>

</html>
<style>
    :root {
        --br: 10px;
        --res-color: #14A800;
    }
    .form_control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        /* border: 1px solid #ced4da; */
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out,
        box-shadow .15s ease-in-out;
    }
    .chard.custom {
        padding: 10px;
        border-radius: var(--br);
    }
    .chard.custom.popup {
        margin-bottom: 0px;
    }
    
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    #table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    #table {
        border-collapse: collapse;
    }

    #table:not(.table-sm):not(.table-md):not(.dataTable) td, #table:not(.table-sm):not(.table-md):not(.dataTable) th {
        padding: 0 10px;
        height: 60px;
        vertical-align: middle;
    }

    #table td, #table:not(.table-bordered) th {
        border-top: none;
    }
    #table td, #table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    th {
        text-align: inherit;
    }
    #res{
        display: none;
        padding: 10px 15px;
        background-color: var(--res-color);
        color: white;
        text-align: center;
        border-radius: 5px;
        margin: 0px 25px 10px 25px;
    }
</style>
<style>
    
    @media (min-width: 1201px){
        .container {
            max-width: 1200px;
        }
    }
    .header_inner.manage__event{
        margin-bottom: 30px;
    }
    #i_d{
        font-weight: bolder;
    }
    .updating_list{
        width: 100%;
        height: 100%;
        position: absolute;
        margin: -107px 0 0 -35px;
        border-radius: var(--br);
        display: none;
    }
    .updating_list_main{
        width: 100%;
        height: 100%;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        border-radius: var(--br);
        background-color: rgb(0, 0, 0, 0.8);
        color: white;
    }
    .updating_list div *{
        color: white !important;
    }
    .l_add_option {
        background: #333146;
    }
    .l-modal__shadow {
        width: 100%;
        height: 100%;
        position: fixed;
        display: block;
        background: #161616;
        opacity: 0.92;
        z-index: -1;
        cursor: url(../images/cursor.png), auto;
    }
    .l_add_option .l_add_body {
        position: relative;
        top: 30%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 550px;
        background: #F5F7FA;
        border-radius: var(--br);
    }

    .l_popup {
        display: inline-block;
        text-align: center;
        background: white;
        max-width: 550px;
        width: 100%;
        line-height: 1.48;
    }
</style>
<script>
    $("#cancel_add").on("click", function () {
        $("#id").val('');
        $(".js-modal-hide").click();
    });
    $("#cancel_close").on("click", function () {
        $(".js-modal-2-hide").click();
    });
    $("#add_event_participant").submit(function (e) {
        //event.preventDefault();
        //alert('semi stop!');
        e.preventDefault();
    
        var formValues = $(this).serialize();
    
        $.post("../ajax/main.php", {
            insertUser: formValues,
        }).done(function (data) {
            $("#res").html(data);
            $("#res").show();
            $(".updating_list").show();
            setTimeout(function () {
                $("#res").hide();
                $("#id").val("");
                $("#name").val("");
                $("#svnsf").load(" #svnsf > *");
                $(".show_ing").load(" .show_ing > *");
            }, 2000);
            setTimeout(function () {
                $(".updating_list").hide();
            }, 2100);
        });
    });
    
    // $(".del_participant").on("click", function () {
    //     var del_id = $(this).attr('data-id');
    //     var e_id = $(this).attr('event');
    //     del_id_uc = del_id.toUpperCase();
    //     if (confirm("Are you sure you want to delete participant with ID: "+del_id_uc+"?")) {
    //         // txt = "You pressed OK!";
    //         var dataA = 'user='+del_id+'&event='+e_id;
    //         //var formValues = dataA.serialize();
    //         $.post("../ajax/main.php", {
    //             delUser: dataA,
    //         }).done(function (data) {
    //             alert(data);
    //             setTimeout(function () {
    //                 $("#svnsf").load(" #svnsf > *");
    //             }, 1000);
    //         });
    //     } else {}

    // });
    
    function delUser(u_id, ev_id) {
        var del_id = u_id;
        var e_id = ev_id;
        del_id_uc = del_id.toUpperCase();
        if (confirm("Are you sure you want to delete participant with ID: "+del_id_uc+"?")) {
            // txt = "You pressed OK!";
            var dataA = 'user='+del_id+'&event='+e_id;
            // alert(dataA);
            
            //var formValues = dataA.serialize();
            $.post("../ajax/main.php", {
                delUser: dataA,
            }).done(function (data) {
                alert(data);
                setTimeout(function () {
                    $("#table").load(" #table > *");
                    $(".show_ing").load(" .show_ing > *");
                }, 1000);
            });
        } else {}

    }
</script>