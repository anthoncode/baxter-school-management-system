<?php
$edit_data = $this->db->get_where( 'teacher', array( 'teacher_id' => $param2 ) )->result_array();
foreach ( $edit_data as $row ):
	?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
			
				<?php echo form_open(base_url() . 'index.php?admin/teacher/do_update/'.$row['teacher_id'] , array('class' => 'form-horizontal form-bordered','target'=>'_top', 'id' => 'form', 'enctype' => 'multipart/form-data'));?>
				
				<div class="panel-heading">
					<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('edit_teacher');?>
            	</h4>
				
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label for="field-1" class="col-md-3 control-label">
							<?php echo get_phrase('photo');?>
						</label>

						<div class="col-md-7">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-xs btn-default btn-file">
                                    <span class="fileinput-new">Select image</span>
									<span class="fileinput-exists">Change</span>
									<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-xs btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('name');?>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" required name="name" value="<?php echo $row['name'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('birthday');?>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="birthday" data-plugin-datepicker data-plugin-options='{ "startView": 2 }' value="<?php echo $row['birthday'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('sex');?>
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="sex" class="form-control populate">
							    <option value="male" <?php if($row[ 'sex']=='' )echo 'selected';?>><?php echo get_phrase('select');?></option>
								<option value="male" <?php if($row[ 'sex']=='male' )echo 'selected';?>><?php echo get_phrase('male');?></option>
								<option value="female" <?php if($row[ 'sex']=='female' )echo 'selected';?>><?php echo get_phrase('female');?></option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('address');?>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('phone');?>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('email');?>
						</label>
						<div class="col-md-7">
							<input type="email" required class="form-control" required name="email" value="<?php echo $row['email'];?>"/>
						</div>
					</div>

				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary">
								<?php echo get_phrase('edit_teacher');?>
							</button>
						</div>
					</div>
				</footer>
				<?php echo form_close();?>
			</section>
		</div>
	</div>

<?php
endforeach;
?>