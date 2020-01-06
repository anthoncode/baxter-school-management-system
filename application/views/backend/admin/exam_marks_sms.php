<section class="panel">
<?php echo form_open(base_url() . 'index.php?admin/exam_marks_sms/send_sms',array('id' => 'form'));?>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4 mb-sm">
				<div class="form-group">
				<label class="control-label"><?php echo get_phrase('exam');?> <span class="required">*</span></label>
					<select name="exam_id" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
					<?php 
						$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
						foreach ($exams as $row):
					?>
						<option value="<?php echo $row['exam_id'];?>"><?php echo $row['name'];?></option>
					<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="col-md-4 mb-sm">
				<div class="form-group">
				<label class="control-label"><?php echo get_phrase('class');?> <span class="required">*</span></label>
					<select name="class_id" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
					<?php 
						$classes = $this->db->get('class')->result_array();
						foreach ($classes as $row):
					?>
						<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
					<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="col-md-4 mb-sm">
				<div class="form-group">
				<label class="control-label"><?php echo get_phrase('receiver');?> <span class="required">*</span></label>
					<select name="receiver" class="form-control" id="receiver" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
						<option value=""><?php echo get_phrase('select_receiver');?></option>
						<option value="student"><?php echo get_phrase('students');?></option>
						<option value="parent"><?php echo get_phrase('parents');?></option>
					</select>
				</div>
			</div>
		</div>
		
	</div>
   
	   <footer class="panel-footer">
		  <center>
			<button type="submit" class="btn btn-primary"><?php echo get_phrase('send_marks');?> via SMS</button>
		  </center>
	   </footer>
         
	<?php echo form_close();?>
	
</section>
