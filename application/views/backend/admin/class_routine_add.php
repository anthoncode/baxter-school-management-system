<section class="panel">

	<?php echo form_open(base_url() . 'index.php?admin/class_routine/create' , array('class' => 'form-horizontal form-bordered', 'id' => 'form'));?>

	<div class="panel-body">
		<div class="col-md-12">

			<div class="form-group">
				<label class="col-sm-3 control-label">
					<?php echo get_phrase('class');?> <span class="required">*</span>
				</label>
				<div class="col-sm-5">
					<select name="class_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required title="<?php echo get_phrase('value_required');?>" class="form-control populate" onchange="return get_class_section_subject(this.value)">
						<option value=""><?php echo get_phrase('select_class');?></option>
						<?php $classes = $this->db->get('class')->result_array();
                         foreach($classes as $row):
                        ?>
						<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
			</div>

			<div id="section_subject_selection_holder"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					<?php echo get_phrase('day');?>
				</label>
				<div class="col-sm-5">
					<select name="day" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required class="form-control populate">
						<option value="sunday">Sunday</option>
						<option value="monday">Monday</option>
						<option value="tuesday">Tuesday</option>
						<option value="wednesday">Wednesday</option>
						<option value="thursday">Thursday</option>
						<option value="friday">Friday</option>
						<option value="saturday">Saturday</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">
					<?php echo get_phrase('starting_time');?>
				</label>
				<div class="col-md-5">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_start" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }'>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">
					<?php echo get_phrase('ending_time');?>
				</label>
				<div class="col-md-5">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_end" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }'>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="panel-footer">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">
					<?php echo get_phrase('add_class_routine');?>
				</button>
			</div>
		</div>
	</footer>
	<?php echo form_close();?>
</section>

	<script type="text/javascript">
		function get_class_section_subject( class_id ) {
			$.ajax( {
				url: '<?php echo base_url();?>index.php?admin/get_class_section_subject/' + class_id,
				success: function ( response ) {
					jQuery( '#section_subject_selection_holder' ).html( response );
				}
			} );
		}
	</script>