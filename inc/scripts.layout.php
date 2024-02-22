<script src="<?php echo $file_dir; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/counter/waypoints-min.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/counter/counterup.min.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/masonry/masonry.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/masonry/filter.js"></script>
<script src="<?php echo $file_dir; ?>assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo $file_dir; ?>assets/js/functions.js"></script>
<script src="<?php echo $file_dir; ?>assets/js/contact.js"></script>
<script src='<?php echo $file_dir; ?>assets/vendors/switcher/switcher.js'></script>

<script>
			
			$("#subscription-orm").submit(function (e) {
				e.preventDefault();
			
				var formValues = $(this).serialize();
			
				$.post("/ajax/main.php", {
					insertUser: formValues,
				}).done(function (data) {
					$("'ajax-message'").html(data);
					setTimeout(function () {
						$(".ajax-message").hide();
                        $("#news_mail").html('');
					}, 2000);
				});
			});
		</script>