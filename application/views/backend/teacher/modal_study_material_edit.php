<?php
$class_info = $this->db->get( 'class' )->result_array();
$single_study_material_info = $this->db->get_where( 'document', array( 'document_id' => $param2 ) )->result_array();
foreach ( $single_study_material_info as $row ) {
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<form role="form" class="form-horizontal form-bordered" action="<?php echo base_url(); ?>index.php?teacher/study_material/update/<?php echo $row['document_id'] ?>" method="post" enctype="multipart/form-data">
					<div class="panel-heading">
						<h4 class="panel-title">
							<?php echo get_phrase('edit_study_material'); ?>
						</h4>
					</div>

					<div class="panel-body">

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								<?php echo get_phrase('date'); ?>
							</label>

							<div class="col-sm-7">
								<input type="text" name="timestamp" class="form-control" data-plugin-datepicker data-plugin-options='{ "format": "D, dd MM yyyy"}' placeholder="date here" value="<?php echo date(" d M, Y ", $row['timestamp']); ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								<?php echo get_phrase('title'); ?>
							</label>

							<div class="col-sm-7">
								<input type="text" name="title" class="form-control" id="field-1" value="<?php echo $row['title']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">
								<?php echo get_phrase('description'); ?>
							</label>

							<div class="col-sm-7">
								<textarea name="description" class="form-control" rows="3">
									<?php echo $row['description']; ?>
								</textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">
								<?php echo get_phrase('class'); ?>
							</label>

							<div class="col-sm-7">
								<select name="class_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" id="class_id" onchange="return get_class_subject(this.value)">
									<option value="">
										<?php echo get_phrase('select_class'); ?>
									</option>
									<?php foreach ($class_info as $row2) { ?>
									<option value="<?php echo $row2['class_id']; ?>" <?php if ($row[ 'class_id'] == $row2[ 'class_id']) echo 'selected'; ?>><?php echo $row2['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label">
								<?php echo get_phrase('subject'); ?>
							</label>
							<div class="col-sm-7">
								<select name="subject_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" id="subject_selector_holder">
									<?php
									$subject = $this->db->get_where( 'subject', array( 'class_id' => $row[ 'class_id' ] ) )->result_array();
									foreach ( $subject as $row2 ) {
									?>
									<option value="<?php echo $row2['subject_id']; ?>" <?php if ($row[ 'subject_id'] == $row2[ 'subject_id']) echo 'selected'; ?>><?php echo $row2['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<footer class="panel-footer">
						<div class="row">
							<div class="col-sm-9 col-sm-offset-3">
								<button type="submit" class="btn btn-success">
									<?php echo get_phrase('update'); ?>
								</button>
							</div>
						</div>
					</footer>
				</form>
			</div>

		</div>
	</div>
	<?php } ?>

	<script type="text/javascript">
		function get_class_subject( class_id ) {

			$.ajax( {
				url: '<?php echo base_url(); ?>index.php?teacher/get_class_subject/' + class_id,
				success: function ( response ) {
					jQuery( '#subject_selector_holder' ).html( response );
				}
			} );

		}
	</script>