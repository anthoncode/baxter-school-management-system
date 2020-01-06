<?php
$edit_data = $this->db->get_where( 'class', array( 'class_id' => $param2 ) )->result_array();
foreach ( $edit_data as $row ):
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('edit_student');?>
            	</h4>
				
				</div>
				<div class="panel-body">

					<?php echo form_open(base_url() . 'index.php?admin/classes/do_update/'.$row['class_id'] , array('class' => 'form-horizontal form-bordered','target'=>'_top'));?>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('name');?>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('numeric_name');?>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="name_numeric" value="<?php echo $row['name_numeric'];?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('teacher');?>
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="teacher_id" class="form-control populate">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <?php $teachers = $this->db->get('teacher')->result_array();
                                foreach($teachers as $row2):
                                ?>
                                    <option value="<?php echo $row2[ 'teacher_id'];?>" <?php if($row['teacher_id'] == $row2['teacher_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-md-7">
							<button type="submit" class="btn btn-primary">
								<?php echo get_phrase('edit_class');?>
							</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
endforeach;
?>