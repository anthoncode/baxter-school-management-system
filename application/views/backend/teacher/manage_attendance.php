<section class="panel">
	<?php echo form_open(base_url() . 'index.php?teacher/attendance_selector/', array('id' => 'form'));?>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
			<div class="form-group">
			<label class="control-label"><?php echo get_phrase('class');?> <span class="required">*</span></label>
				<select name="class_id" class="form-control mb-sm" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required title="<?php echo get_phrase('value_required');?>" onchange="select_section(this.value)">
					<option value=""><?php echo get_phrase('select_class');?></option>
					<?php
						$classes = $this->db->get('class')->result_array();
						foreach($classes as $row):
					?>
					<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>

					<?php endforeach;?>
				</select>
			</div>
			</div>

			
			<div class="col-md-4">
			<div class="form-group">
			<label class="control-label "><?php echo get_phrase('section');?> <span class="required">*</span></label>
				<select class="form-control mb-sm" data-plugin-selectTwo data-minimum-results-for-search="Infinity" id="section_selector_holder" data-width="100%" name="section_id">
					<option value=""><?php echo get_phrase('select_class_first') ?></option>
				</select>
			</div>
			</div>
		

			<div class="col-md-4">
			<div class="form-group">
			<label class="control-label"><?php echo get_phrase('date');?> <span class="required">*</span></label>
				<input type="text" class="form-control mb-sm" data-plugin-datepicker name="timestamp" data-plugin-options='{ "format": "dd-mm-yyyy"}'
					value="<?php echo date("d-m-Y");?>"/>
			</div>
			</div>
		</div>
	</div>
	
	<div class="panel-footer">
		<center><button type="submit" class="mb-xs mt-xs mr-xs btn btn btn-primary"><?php echo get_phrase('manage_attendance');?></button></center>
	</div>
	<?php echo form_close();?>
</section>

<script type="text/javascript">
	function select_section(class_id) {

		$.ajax( {
			url: '<?php echo base_url();?>index.php?teacher/get_class_section/' + class_id,
			success: function ( response ) {
				jQuery( '#section_selector_holder' ).html( response );
			}
		} );
	}
</script>

