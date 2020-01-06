<?php 
	$edit_data = $this->db->get_where('section' , array(
		'section_id' => $param2
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">

			<?php echo form_open(base_url() . 'index.php?admin/sections/edit/' . $row['section_id'] , array('class' => 'form-horizontal form-bordered', 'id' => 'form', 'enctype' => 'multipart/form-data'));?>

			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('add_new_section');?>
            	</h4>
			
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label">
						<?php echo get_phrase('name');?>
					</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>" value="<?php echo $row['name'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						<?php echo get_phrase('nick_name');?>
					</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="nick_name" value="<?php echo $row['nick_name'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						<?php echo get_phrase('class');?>
					</label>

					<div class="col-sm-5">
						<select name="class_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>">
							<option value="">
								<?php echo get_phrase('select');?>
							</option>
							<?php 
									$classes = $this->db->get('class')->result_array();
									foreach($classes as $row2):
										?>
							<option value="<?php echo $row2['class_id'];?>" <?php if ($row[ 'class_id'] == $row2[ 'class_id']) echo 'selected';?>>
								<?php echo $row2['name'];?>
							</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						<?php echo get_phrase('teacher');?>
					</label>

					<div class="col-sm-5">
						<select name="teacher_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
							<option value=""><?php echo get_phrase('select');?></option>
							<?php 
								$teachers = $this->db->get('teacher')->result_array();
								foreach($teachers as $row3):
							?>
							<option value="<?php echo $row3['teacher_id'];?>" <?php if ($row[ 'teacher_id'] == $row3[ 'teacher_id']) echo 'selected';?>><?php echo $row3['name'];?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>

			</div>

			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							<?php echo get_phrase('update');?>
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>
<?php endforeach;?>