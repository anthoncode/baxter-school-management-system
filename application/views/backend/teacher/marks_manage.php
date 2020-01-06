<?php echo form_open(base_url() . 'index.php?teacher/marks_selector',array('id' => 'form'));?>
<section class="panel">
  <div class="panel-body">
	<div class="row">

	<div class="col-md-3 mb-sm">
		<div class="form-group">
		<label class="control-label"><?php echo get_phrase('exam');?> <span class="required">*</span></label>
			<select name="exam_id" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
				<?php
					$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
					foreach($exams as $row):
				?>
				<option value="<?php echo $row['exam_id'];?>"><?php echo $row['name'];?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="col-md-3 mb-sm">
		<div class="form-group">
		<label class="control-label"><?php echo get_phrase('class');?> <span class="required">*</span></label>
			<select name="class_id" class="form-control" onchange="get_class_subject(this.value)" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
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

	<div id="subject_holder">
		<div class="col-md-3 mb-sm">
			<div class="form-group">
			<label class="control-label"><?php echo get_phrase('section');?> <span class="required">*</span></label>
				<select name="" id="" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
					<option value=""><?php echo get_phrase('select_class_first');?></option>		
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			<label class="control-label"><?php echo get_phrase('subject');?> <span class="required">*</span></label>
				<select name="" id="" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
					<option value=""><?php echo get_phrase('select_class_first');?></option>		
				</select>
			</div>
		</div>
	</div>

  </div>
</div>
  
	<footer class="panel-footer">
		<center>
				<button type="submit" class="btn btn-primary"><?php echo get_phrase('manage_marks');?></button>
		</center>
	</div>
</section>

<?php echo form_close();?>

<script type="text/javascript">
	function get_class_subject(class_id) {
		
		$.ajax({
            url: '<?php echo base_url();?>index.php?teacher/marks_get_subject/' + class_id ,
            success: function(response)
            {
                jQuery('#subject_holder').html(response);
            }
        });

	}
</script>