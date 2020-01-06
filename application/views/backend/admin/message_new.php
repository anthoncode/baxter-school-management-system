	<div class="mailbox-email-header mb-lg">
		<h3 class="mailbox-email-subject m-none text-weight-light">
			<?php echo get_phrase('write_new_message'); ?>
		</h3>
	</div>
<?php echo form_open(base_url() . 'index.php?admin/message/send_new/', array( 'id' => 'form', 'enctype' => 'multipart/form-data')); ?>
	<div class="panel">
	
		<div class="panel-heading">
			<h4 class="panel-title"> 
			 <i class="fa fa-envelope-o mr-xs"></i>
			</h4>
		</div>

		<div class="panel-body">
		
		<div class="form-group">
		<div class="row">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align: center;">
				<?php echo get_phrase('recipient'); ?> <span class="required">*</span>
			</label>
		</div>

		<div class="compose">
			<select class="form-control" data-plugin-selectTwo data-width="100%" name="reciever" required>
				<option value="">
					<?php echo get_phrase('select_a_user'); ?>
				</option>
				<optgroup label="<?php echo get_phrase('student'); ?>">
					<?php
					$students = $this->db->get( 'student' )->result_array();
					foreach ( $students as $row ):
						?>

					<option value="student-<?php echo $row['student_id']; ?>">- <?php echo $row['name']; ?></option>

					<?php endforeach; ?>
				</optgroup>
				<optgroup label="<?php echo get_phrase('teacher'); ?>">
					<?php
					$teachers = $this->db->get( 'teacher' )->result_array();
					foreach ( $teachers as $row ):
						?>

					<option value="teacher-<?php echo $row['teacher_id']; ?>">- <?php echo $row['name']; ?></option>

					<?php endforeach; ?>
				</optgroup>
				<optgroup label="<?php echo get_phrase('parent'); ?>">
					<?php
					$parents = $this->db->get( 'parent' )->result_array();
					foreach ( $parents as $row ):
						?>

					<option value="parent-<?php echo $row['parent_id']; ?>">- <?php echo $row['name']; ?></option>

					<?php endforeach; ?>
				</optgroup>
			</select>
		</div>
	</div>
		
		
			<div class="compose">
				<textarea name="message" class="form-control" placeholder="<?php echo get_phrase('write_your_message'); ?>" required title="<?php echo get_phrase('value_required');?>" aria-required="true" rows="10" style="height: 320px;"></textarea>
			</div>
		</div>

		<div class="panel-footer">
			<div class="text-right">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-send mr-xs"></i>
					<span><?php echo get_phrase('send'); ?></span>
				</button>
			</div>
		</div>
		</form>
	</div>					
