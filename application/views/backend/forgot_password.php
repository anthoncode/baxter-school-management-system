	<?php
	  $system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	  $skin_colour        =   $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description;
	?>
	
<!doctype html>
<html class="fixed<?php if ($skin_colour == 'dark') echo ' dark'; ?>">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<meta name="keywords" content="Baxter School Management Software"/>
	<meta name="description" content="Baxter School Management System">
	<meta name="author" content="PVS Systems Pvt Ltd">

	<title> <?php echo get_phrase('reset_password'); ?> | <?php echo $system_title; ?> </title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css"/>
	<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css"/>
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css"/>
	<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css"/>
	<link rel="stylesheet" href="assets/stylesheets/theme.css"/>
	<link rel="stylesheet" href="assets/stylesheets/skins/default.css"/>
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
	<script src="assets/vendor/modernizr/modernizr.js"></script>
	<script src="assets/vendor/jquery/jquery.js"></script>
	<link rel="shortcut icon" href="assets/images/favicon.png">

</head>

<body>
	<!-- start: page -->
	<section class="body-sign appear-animation" data-appear-animation="fadeInLeft">

		<script type="text/javascript">
			jQuery( document ).ready( function ( $ ) {
				// Validation and Ajax action
				$( "form#login" ).validate({
					rules: {
						email: {
							required: true,
							email: true
						},
					},

					messages: {
						email: {
							required: 'Please enter your email.'
						},
					},
					
					highlight: function( label ) {
						$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success: function( label ) {
						$(label).closest('.form-group').removeClass('has-error');
						label.remove();
					},
					errorPlacement: function( error, element ) {
						var placement = element.closest('.input-group');
						if (!placement.get(0)) {
							placement = element;
						}
						if (error.text() !== '') {

							if(element.parent('.checkbox, .radio').length || element.parent('.input-group').length)
							{
							 placement.after(error);
							}
							else
							{	
							 var placement = element.closest('div');
							 placement.append(error);
							 wrapper: "li"
							}

						}
					},

					// Form Processing via AJAX
					submitHandler: function ( form ) {

						$.ajax( {
							url: '<?php echo base_url()?>index.php?login/ajax_forgot_password',
							method: 'POST',
							dataType: 'json',
							data: {
								email: $( "#email" ).val(),
							},
							success: function ( resp ) {
								// Redirect after successful login page (when progress bar reaches 100%)
								PNotify.removeAll();
								if ( resp.status == 'true' ) {

									new PNotify( {
										title: 'Done !',
										text: "Password Reset successful, Check your Email: " + $( '#email' ).val(),
										shadow: true,
										type: 'success',
										addclass: 'stack-bar-top',
										width: "100%",
										buttons: {
											sticker: false
										}
									} );

								} else {

									new PNotify( {
										title: 'Failed Reset !',
										text: "We couldn't find a registered user with that email address. Please check that you've typed it correctly and try again.",
										shadow: true,
										type: 'error',
										addclass: 'stack-bar-top',
										width: "100%",
										buttons: {
											sticker: false
										}
									});
								}
							}
						});
					}
				});

			});
		</script>

		<div class="center-sign">

			<div class="errors-container"></div>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Recover Password</h2>
				</div>
				<div class="panel-body">
				
				
					<div class="text-center">
					 <div class="mb-lg"><img src="uploads/logo.png" height="54" alt="Baxter School" /></div>
					 <h5><?php echo $system_name ?></h5>
					</div>
				
					<div class="alert alert-info">
						<p class="m-none text-weight-semibold h6">Enter your e-mail below and we will send you reset instructions!</p>
					</div>

					<form method="post" id="login" class="validate">
						<div class="form-group mb-none">
							<div class="input-group">
								<input name="email" id="email" type="email" placeholder="E-mail" class="form-control input-lg"/>
								<span class="input-group-btn">
										<button class="btn btn-primary btn-lg" type="submit">Reset!</button>
								</span>
							</div>
						</div>
						<div class="text-center mt-lg"> 
							<a href="<?php echo base_url(); ?>index.php?login"> <i class="fa fa-long-arrow-left mr-xs"></i>
								<?php echo get_phrase('return_to_login_page'); ?> ?
							</a>
						</div>
					</form>
				</div>
			</div>

			<p class="text-center text-muted mt-md mb-md">
				<?php echo $this->db->get_where('settings' , array('type' =>'footer_text'))->row()->description;?>
			</p>
		</div>
	</section>
	
	<script src="assets/vendor/jquery-appear/jquery-appear.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
	<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
	<script src="assets/javascripts/theme.js"></script>
	<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
	<script src="assets/javascripts/theme.js"></script>
	<script src="assets/javascripts/theme.custom.js"></script>
	<script src="assets/javascripts/theme.init.js"></script>

</body>

</html>