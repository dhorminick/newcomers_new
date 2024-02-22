<?php 
    $file_dir = '../';
    $file_subdir = '../';
    include $file_dir.'inc/config.inc.php';
    include $file_dir.'inc/db.inc.php'; 
    include $file_dir.'inc/mail.inc.php'; 
    $message = [];

    $toDisplay = false;
    $toDisplayError = 'Event ID Required For Mass Mail!!';

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
            $toDisplayError = 'Event ID Does Not Exist!!';
        }
    }

    if (isset($_POST["mail_all"])) {
        $m_from = sanitizePlus($_POST["m_from"]);
        $m_reply = sanitizePlus($_POST["m_reply"]);
        $m_subject = sanitizePlus($_POST["m_subject"]);
        $m_mail = sanitizePlus($_POST["m_mail"]);
        $event_id = sanitizePlus($_POST["e_id"]);

        $confirmEvent = "SELECT * FROM newcomers_events WHERE event_id = '$e_id'";
        $event_exists = $con->query($confirmEvent);
        if ($event_exists->num_rows > 0) {	
            $row = $event_exists->fetch_assoc();
            $participants = unserialize($row['participants']);
            if ($participants == []) {
                # empty 
                array_push($message, 'Error 402: Event Has No Participant Yet!!');
            } else {
                $participants_emails = array_column($participants, 'email');
                $participants_emails = (array_unique($participants_emails));
                $participants_emails = array_values($participants_emails);

                $res = _sendmassmail($m_from, $participants_emails, $m_mail, $m_subject);
                array_push($message, $res);
            }
            
        }else{
            array_push($message, 'Error 402: Event ID Does Not Exist!!');
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $file_dir.'inc/admin_tags.layout.php'; ?>
	<title>Mass Mail Event Participants <?php echo $site; ?></title>
	<?php include $file_dir.'inc/admin_style.inc.php'; ?>
    <link rel="stylesheet" href="assets/summernote/summernote.min.css">
	
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
					<li>Mass Mail</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="ro">
				<section class="mass_mail">
                    <?php if($toDisplay == true){ ?>
                    <div class="_container">
                        <div class="chard custom">
                            <?php include $file_dir.'inc/alert.inc.php'; ?>
                            <div class="chard-header" style="margin-bottom: 20px">
                                <h4>Mail Participants:</h4>
                                <div class="chard-header-action">
                                    <a href="event/manage-event"><button class="btn btn-primary btn-icon icon-left"><i class="fa fa-arrow-left"></i> Event List</button></a>
                                </div>
                            </div>
                            <div class="chard-body">
                                <div class="mail_event">
                                    <form method="post">
                                    <div class="row">
                                        <div class="form-group col-12 col-lg-3">
                                            <label for="id">Event ID:</label>
                                            <span class="form_control"><?php echo $info['event_id']; ?></span>
                                        </div>
                                        <div class="form-group col-12 col-lg-9">
                                            <label for="id">Event Title:</label>
                                            <span class="form_control"><?php echo $info['event_title']; ?></span>
                                        </div>
                                        <div class="form-group col-12 col-lg-3">
                                            <label for="from">From:</label>
                                            <input type="text" class="form-control" name="m_from" id="form">
                                        </div>
                                        <div class="form-group col-12 col-lg-3">
                                            <label for="reply">Reply To:</label>
                                            <input type="text" class="form-control" name="m_reply" value="-- same as above --" id="reply">
                                        </div>
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="sub">Mail Subject:</label>
                                            <input type="text" class="form-control" name="m_subject" id="sub">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="mail">Mail Body:</label>
                                            <textarea name="m_mail" class='summernote' id="mail" cols="30" rows="10"></textarea>
                                        </div>
                                        <input type="hidden" name="e_id" value="<?php echo $info['event_id']; ?>">
                                        <div class="form-group col-12 text-right mt-3">
                                            <button class="btn btn-primary btn-icon icon-left" name="mail_all" type="submit"><i class="fa fa-paper-plane"></i> Send Mail</button>
                                            <button class="btn btn-secondary btn-icon icon-left" type="reset"><i class="fa fa-times-circle"></i> Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                        <div class="_container">
                            <div style="display: flex;justify-content:center;align-items:center;height:400px;width:100%;">
                                <div style="text-align: center;">
                                    <h3>Error 402!!</h3>
                                    <div style="margin: 15px 0px;"><?php echo $toDisplayError; ?></div>
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
<script src="assets/summernote/summernote.min.js"></script>
</body>

</html>
<style>
    .mass_mail{
        margin-top: 30px;
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
    .note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable {
        min-height: 200px !important;
        max-height: 400px !important;
        overflow: auto;
        padding: 10px !important;
    }
    .note-toolbar-wrapper {
        display: none !important;
    }
    .note-editable.card-block p {
        line-height: 5px !important;
        /* margin-bottom: 0em !important; */
    }
    .note-statusbar {
        display: none !important;
    }
    .note-editor.note-frame.card {
        width: 100% !important;
    }
</style>
<script>
    $(document).ready(function() {
            $('.summernote').summernote();
    });
</script>