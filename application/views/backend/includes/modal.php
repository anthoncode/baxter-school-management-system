	<script type="text/javascript">
		function showAjaxModal( url ) {
			// SHOWING AJAX PRELOADER IMAGE
			jQuery( '#modal_ajax .modal-body' ).html( '<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>' );

			// LOADING THE AJAX MODAL
			jQuery( '#modal_ajax' ).modal( 'show', {
				backdrop: 'true'
			} );

			// SHOW AJAX RESPONSE ON REQUEST SUCCESS
			$.ajax( {
				url: url,
				success: function ( response ) {
					jQuery( '#modal_ajax .modal-body' ).html( response );
				}
			} );
		}
	</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					<?php echo $system_name;?>
				</h4>
			</div>

			<div class="modal-body" style="height: 500px; overflow:auto;">


			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


	<script type="text/javascript">
		function confirm_modal( delete_url ) {
			jQuery( '#modal-normal' ).modal( 'show', {
				backdrop: 'static'
			} );
			document.getElementById( 'delete_link' ).setAttribute( 'href', delete_url );
		}
	</script>

<!-- (Normal Modal)-->
<div class="modal fade" id="modal-normal">
	<div class="modal-dialog">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Are you sure?</h2>
			</header>
			<div class="panel-body">
				<div class="modal-wrapper">
					<div class="modal-icon">
						<i class="fa fa-question-circle"></i>
					</div>
					<div class="modal-text">
						<p>Are you sure to delete this information ?</p>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<a href="#" class="btn btn-danger" id="delete_link"><?php echo get_phrase('delete');?></a>
						<button class="btn btn-default" data-dismiss="modal"><?php echo get_phrase('cancel');?></button>
					</div>
				</div>
			</footer>
		</section>
	</div>
</div>

