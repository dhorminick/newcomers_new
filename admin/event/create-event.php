<?php 
    $file_dir = '../../';
    $file_subdir = '../';
    include $file_dir.'inc/config.inc.php'; 
    include $file_dir.'inc/db.inc.php'; 
    $message = [];
    $event_done = false;
    #a:0:{}

    if (isset($_POST["create-event"])) {
        $event_id = sanitizePlus($_POST["e_id"]);
        $event_title = sanitizePlus($_POST["e_title"]);
        $event_description = sanitizePlus($_POST["e_description"]);
        $event_date = sanitizePlus($_POST["e_date"]);
        $event_time = sanitizePlus($_POST["e_time"]);
        $event_price = sanitizePlus($_POST["e_price"]);
        $event_location = sanitizePlus($_POST["e_location"]);

        $event_link = eventName($_POST["e_title"]);

        $filename = $_FILES["file"]["name"];

        if(isset($filename) && $filename != ''){
            $fileWasUploaded = true;
        	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        	$file_ext = substr($filename, strripos($filename, '.')); // get file name
        	$filesize = $_FILES["file"]["size"];

        	$allowed_file_types = array('.jpg','.png','.jpeg','.webm');	
        
        	if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000)) {	
        		// Rename file
        		$newfilename = 'event_'.$event_id . $file_ext;
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_dir."events/images/" . $newfilename)){
                    
                    $targetFilePath = $newfilename;
                    $date = date("Y-m-d");
                    $query = "INSERT INTO newcomers_events (event_id, event_title, event_description, event_date, event_time, event_price, event_location, event_link, event_image, set_date, participants, event_status) VALUES ('$event_id', '$event_title', '$event_description', '$event_date', '$event_time', '$event_price', '$event_location', '$event_link', '$targetFilePath', '$date', 'a:0:{}', 'upcoming')";
                    $sql = mysqli_query($con, $query);
                    if ($sql) {
                        #create file
                        $url = $file_dir."events/upcoming/";
                        $fileName = $event_link;
                        $event_page = fopen("$url/$fileName.php", "w") or die("Unable to open file!");
                        $txt = '<?php $file_dir = "../../"; $id = "'.$event_id.'"; include $file_dir."inc/config.inc.php"; include $file_dir."inc/db.inc.php"; include $file_dir."inc/event.layout.php"; ?>';
                        fwrite($event_page, $txt);
                        fclose($event_page);
                        array_push($message, "Event Registered Succesfully.");

                        $event_done = true;
                    } else {
                        array_push($message, 'Error 502: Error Uploading Event Details!!');
                    }
                }else{
                    array_push($message, 'Error 502: Error Uploading Event Image!!');
                }
            } elseif (empty($file_basename)) {	
        		// file selection error
        		#echo "Please select a file to upload.";
        		array_push($message, "Error Uploading File: Please Select A File For Upload!!");
        	} elseif ($filesize > 20000000) {	
        		// file size error
        		#echo "The file you are trying to upload is too large.";
        		array_push($message, "Error Uploading File: File Too Large, Maximum Allowed - 20MB!!");
        	} else {
        		// file type error
        		#echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
        		array_push($message, "Error Uploading File: Only these file types are allowed: " . implode(', ',$allowed_file_types));
        		unlink($_FILES["file"]["tmp_name"]);
        	}
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $file_dir.'inc/admin_tags.layout.php'; ?>
	<title>Create New Event <?php echo $site; ?></title>
	<?php include $file_dir.'inc/admin_style.inc.php'; ?>
    <link rel="stylesheet" href="../assets/summernote/summernote.min.css">
	
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
					<li>Create New Event</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="ro">
				<section class="new_event">
                    <div class="_container">
                        <div class="chard custom">
                            <div class="chard-header">
                                <h4>Create Events:</h4>
                                <div class="chard-header-action">
                                    <a href="/"><button class="btn btn-primary btn-icon icon-left"><i class="fa fa-arrow-left"></i> Back</button></a>
                                </div>
                            </div>
                            <div class="chard-body" style="margin-top:20px">
                                <?php include $file_dir.'inc/alert.inc.php'; ?>
                                <?php if ($event_done == true){ ?>
                                <div class="event_done">
                                    <div class="e">
                                        <div>You will be redirected to event page preview in <span id="page_preview"></span> second(s)</div>
                                        <div style="margin-top: 20px;"><a href="" class="btn btn-primary btn-icon icon-left btn-md"><i class="fa fa-arrow-left"></i> Back Home</a></div>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-12 col-lg-4">
                                            <label for="id">Event ID:</label>
                                            <input type="text" readonly class="form-control" name="e_id" value="<?php echo secure_random_string(5).'-'.secure_random_string(5).'-'.secure_random_string(5) ?>" id="id">
                                        </div>
                                        <div class="form-group col-12 col-lg-8">
                                            <label for="title">Event Title:</label>
                                            <input type="text"  class="form-control" name="e_title" id="title">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="desc">Event Description:</label>
                                            <textarea class="summernote" name="e_description" id="desc" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group col-12 col-lg-2">
                                            <label for="date">Event Date:</label>
                                            <input type="date" class="form-control" name="e_date" id="date">
                                        </div>
                                        <div class="form-group col-12 col-lg-2">
                                            <label for="time">Event Time:</label>
                                            <input type="time" class="form-control" name="e_time" id="time">
                                        </div>
                                        <div class="form-group col-12 col-lg-2">
                                            <label for="price">Event Price:</label>
                                            <input type="text"  class="form-control" name="e_price" id="price">
                                        </div>
                                        <div class="form-group col-12 col-lg-6">
                                            <label>Event Images: </label>
                                                <div class="input-group">
                                                    <div class='file_name form-control'>Select File:</div>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text" id='file_opener' style="cursor:pointer;">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-12" style='margin-bottom:10px;'>
                                            </div>
                                            <input id="file_main" name="file" type="file" accept="image/*" style="display: none;">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="loc">Event Location:</label>
                                            <textarea  class="form-control" name="e_location" id="loc" cols="30" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-12 text-right">
                                            <button type="submit" class="btn btn-primary btn-icon icon-left btn-md" name="create-event"><i class="fa fa-check-circle"></i> Create Event</button>
                                            <a href="" class="btn btn-secondary btn-icon icon-left btn-md"><i class="fa fa-times"></i> Cancel</a>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<?php include $file_dir.'inc/admin_scripts.inc.php'; ?>
<script src="../assets/summernote/summernote.min.js"></script>
</body>

</html>
<style>
        .form-group.col-12.text-right{
            margin-top: 30px;
        }
        .event_done{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 300px;
        }
        .event_done div.e{
            width: 70%;
            text-align: center;
            padding: 20px;
        }
        .new_event{
            margin-top: 30px;
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
    $('.summernote').summernote();
    $(document).ready(function() {
        });
    $("#file_opener").on("click", function () {
          $("#file_main").click();
        });
        
        $("#file_main").on("change", function () {
            for (let i = 0; i < this.files.length; i++) {
                $(".file_name").html(this.files[i].name);
            }
        });
</script>