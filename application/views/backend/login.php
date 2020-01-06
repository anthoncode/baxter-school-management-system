	<?php
		$system_name = $this->db->get_where( 'settings', array( 'type' => 'system_name' ) )->row()->description;
		$system_title = $this->db->get_where( 'settings', array( 'type' => 'system_title' ) )->row()->description;
		$skin_colour = $this->db->get_where( 'settings', array( 'type' => 'skin_colour' ) )->row()->description;
	?>

<!doctype html>
<html class="fixed<?php if ($skin_colour == 'dark') echo ' dark'; ?>">

<head>
	<!-- Basic -->
	<meta charset="UTF-8">

	<meta name="keywords" content="School Management Software"/>
	<meta name="description" content="Baxter School Management System">
	<meta name="author" content="PVS Systems Pvt Ltd">

	<title> <?php echo get_phrase('login');?> | <?php echo $system_title;?> </title>

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
	<link rel="stylesheet" href="assets/stylesheets/skins/square-borders.css"/>
	<script src="assets/vendor/modernizr/modernizr.js"></script>
	<script src="assets/vendor/jquery/jquery.js"></script>
	<link rel="shortcut icon" href="assets/images/favicon.png">
</head>

<body>
	<!-- start: page -->
	<section class="body-sign appear-animation" data-appear-animation="fadeInRight">
		<div class="center-sign">

			<div class="errors-container"></div>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h4 class="title text-uppercase m-none"><i class="fa fa-user mr-xs"></i>LogIn</h4>
				</div>
				<div class="panel-body">
					
					<div class="text-center">
					 <div class="mb-xs"><img src="uploads/logo.png" height="54" alt="Baxter School" /></div>
					 <h5><?php echo $system_name ?></h5>
					</div><hr>

					<form method="post" id="login">
						<div class="form-group mb-lg">
							<label>Username</label>
							<div class="input-group input-group-icon">
								<input name="email" id="email" type="text" placeholder="E-Mail" class="form-control input-lg"/>
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-user"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="form-group mb-lg">
							<div class="clearfix">
								<label class="pull-left">Password</label>
							</div>
							<div class="input-group input-group-icon">
								<input name="password" type="password" id="password" placeholder="Password" class="form-control input-lg"/>
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-lock"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 text-right">
								<button type="submit" class="btn btn-primary hidden-xs"><i class="fa fa-sign-in mr-xs"></i> Log In</button>
								<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg"><i class="fa fa-sign-in mr-xs"></i> Log In</button>
							</div>
						</div>

						<hr class="solid">

						<div class="text-center">
							<a href="<?php echo base_url();?>index.php?login/forgot_password">
								<?php echo get_phrase('forgot_your_password');?> ?
							</a>
						</div>
					</form>
				</div>
				<p class="text-center text-muted mt-md mb-md">
					<?php echo $this->db->get_where('settings' , array('type' =>'footer_text'))->row()->description;?>
				</p>
			</div>

		</div>
	</section>
	<!-- end: page -->


	<script type="text/javascript">
		jQuery( document ).ready( function ( $ ) {
			// Login Form & Validation
			$( "form#login" ).validate( {
				rules: {
					email: {
						required: true,
						email: true
					},

					password: {
						required: true
					}
				},

				messages: {
					email: {
						required: 'Please enter your email.'
					},

					password: {
						required: 'Please enter your password.'
					}
				},

				// Form Processing via AJAX
				submitHandler: function ( form ) {
					// Send data to the server	
					$.ajax( {
						url: '<?php echo base_url()?>index.php?login/ajax_login',
						method: 'POST',
						dataType: 'json',
						data: {
							email: $( form ).find( '#email' ).val(),
							password: $( form ).find( '#password' ).val(),
						},
						success: function ( response ) {
							// Remove any alert
							$( ".errors-container .alert" ).slideUp( 'fast' );

							// Login status [success|invalid]
							if ( response.login_status == 'success' ) {
								var redirect_url = '<?php echo base_url()?>';

								if ( response.redirect_url && response.redirect_url.length ) {
									redirect_url = response.redirect_url;
								}
								window.location.href = redirect_url;
							} else {

								$( ".errors-container" ).html( '<div class="alert alert-primary" style="background-color: #cc3f44;">\
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\<strong>Invalid Login!</strong><br/>You have entered wrong email or password, please try again and enter correct email and password !\
								</div>' );
								$( ".errors-container .alert" ).hide().slideDown();

							}
						}
					} );

				}
			} );

		} );
	</script>

	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
	<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
	<script src="assets/vendor/jquery-appear/jquery-appear.js"></script>
	<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
	<script src="assets/javascripts/theme.js"></script>
	<script src="assets/javascripts/theme.custom.js"></script>
	<script src="assets/javascripts/theme.init.js"></script>

</body>

</html>