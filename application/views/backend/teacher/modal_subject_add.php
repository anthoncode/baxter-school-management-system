<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<?php echo form_open(base_url() . 'index.php?teacher/subject/create' , array('class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_subject');?>
            	</h4>
			</div>
			<div class="panel-body">
				<div class="padded">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('name');?> <span class="required">*</span>
						</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('class');?> <span class="required">*</span>
						</label>
						<div class="col-sm-7">
							<select name="class_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>>
								<?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
								?>
								<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<?php echo get_phrase('teacher');?>
						</label>
						<div class="col-sm-7">
							<select name="teacher_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
								<?php 
								$teachers = $this->db->get('teacher')->result_array();
								foreach($teachers as $row):
								?>
								<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							<?php echo get_phrase('add_subject');?>
						</button>
					</div>
				</div>
			</footer>
			</form>
		</div>
	</div>
</div>