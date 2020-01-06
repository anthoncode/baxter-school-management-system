<div class="row appear-animation fadeInRight" data-appear-animation="fadeInRight">
<?php
$edit_data = $this->db->get_where( 'enroll', array(
	'student_id' => $student_id, 'year' => $this->db->get_where( 'settings', array( 'type' => 'running_year' ) )->row()->description
) )->result_array();
foreach ( $edit_data as $row ):
?>

	<div class="col-md-4">
		<section class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md">
					<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" class="rounded img-responsive">
					<div class="thumb-info-title">
						<span class="thumb-info-inner">
							<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name; ?>
						</span>
						<span class="thumb-info-type">
							Student
						</span>
					</div>
				</div>

				<div class="widget-toggle-expand mb-md">
					<div class="widget-content-expanded">
					
						<div class="table-responsive">
							<table class="table table-striped table-condensed mb-none">

							<?php if($row['class_id'] != ''):?>
							<tr>
								<td><?php echo get_phrase('class');?></td>
								<td align="right"><?php echo $this->crud_model->get_class_name($row['class_id']);?></td>
							</tr>
							<?php endif;?>

							<?php if($row['section_id'] != '' && $row['section_id'] != 0):?>
							<tr>
								<td><?php echo get_phrase('section');?></td>
								<td align="right"><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?></td>
							</tr>
							<?php endif;?>

							<?php if($row['roll'] != ''):?>
							<tr>
								<td><?php echo get_phrase('roll');?></td>
								<td align="right"><?php echo $row['roll'];?></td>
							</tr>
							<?php endif;?>
							<tr>
								<td><?php echo get_phrase('birthday');?></td>
								<td align="right"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->birthday;?></td>
							</tr>
							<tr>
								<td><?php echo get_phrase('gender');?></td>
								<td align="right"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->sex;?></td>
							</tr>
							<tr>
								<td><?php echo get_phrase('religion');?></td>
								<td align="right"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->religion;?></td>
							</tr>
							<tr>
								<td><?php echo get_phrase('blood_group');?></td>
								<td align="right"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->blood_group;?></td>
							</tr>
							<tr>
								<td><?php echo get_phrase('phone');?></td>
								<td align="right"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->phone;?></td>
							</tr>
							<tr>
								<td><?php echo get_phrase('email');?></td>
								<td align="right"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->email;?></td>
							</tr>
							<tr>
								<td><?php echo get_phrase('address');?></td>
								<td align="right"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->address;?></td>
							</tr>
							<tr>
							<td><?php echo get_phrase('parent');?></td>
							<td align="right">
								<?php $parent_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->parent_id;
								echo $this->db->get_where('parent' , array('parent_id' => $parent_id))->row()->name; ?>
						   </td>
							</tr>
							<tr>
								<td><?php echo get_phrase('parent_phone');?></td>
								<td align="right"><?php echo $this->db->get_where('parent' , array('parent_id' => $parent_id))->row()->phone;?></td>
							</tr> 
						</table>
					</div>	
					
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="col-md-8">
		<div class="tabs">
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#edit" data-toggle="tab"><i class="fa fa-user"></i> <?php echo get_phrase('manage_profile');?></a>
				</li>
				<li>
					<a href="#resetpass" data-toggle="tab"><i class="fa fa-lock"></i> <?php echo get_phrase('change_password');?></a>
				</li>
			</ul>
			
			<div class="tab-content">
				<div id="edit" class="tab-pane active">
				   <?php echo form_open(base_url() . 'index.php?admin/student/do_update/'.$row['student_id'].'/'.$row['class_id'], array('class' => 'form-wizard form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>
					<fieldset class="mb-xl mt-lg">

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								<?php echo get_phrase('photo');?>
							</label>

							<div class="col-md-8">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" alt="...">
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
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('name');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('class');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="class" disabled value="<?php echo $this->db->get_where('class' , array('class_id' => $row['class_id']))->row()->name; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('section');?>
							</label>
							<div class="col-md-8">
								<select name="section_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
									<option value=""><?php echo get_phrase('select_section');?></option>
									<?php
										$sections = $this->db->get_where( 'section', array( 'class_id' => $row[ 'class_id' ] ) )->result_array();
										foreach ( $sections as $row2 ):
									?>
									<option value="<?php echo $row2['section_id'];?>" <?php if($row[ 'section_id'] == $row2[ 'section_id']) echo 'selected';?>><?php echo $row2['name'];?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('roll');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="roll" value="<?php echo $row['roll'];?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('parent');?>
							</label>
							<div class="col-md-8">
								<select name="parent_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>">
									<option value=""><?php echo get_phrase('select');?></option>
									<?php 
									$parents = $this->db->get('parent')->result_array();
									$parent_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->parent_id;
									foreach($parents as $row3):
										?>
									<option value="<?php echo $row3['parent_id'];?>" <?php if($row3[ 'parent_id'] == $parent_id)echo 'selected';?>><?php echo $row3['name'];?></option>
									<?php
									endforeach;
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('birthday');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="birthday" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->birthday; ?>" data-plugin-datepicker data-plugin-options='{ "startView": 2 }'>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('gender');?>
							</label>
							<div class="col-md-8">
								<select name="sex" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
									<?php
									$gender = $this->db->get_where( 'student', array( 'student_id' => $row[ 'student_id' ] ) )->row()->sex;
									?>
									<option value=""><?php echo get_phrase('select');?></option>
									<option value="male" <?php if($gender=='male' )echo 'selected';?>><?php echo get_phrase('male');?></option>
									<option value="female" <?php if($gender=='female' )echo 'selected';?>><?php echo get_phrase('female');?></option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('religion');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="religion" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->religion; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('blood_group');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="blood_group" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->blood_group; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('address');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="address" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->address; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('phone');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="phone" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->phone; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('email');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="email" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->email; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('dormitory');?>
							</label>
							<div class="col-md-8">
							<select name="dormitory_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
								<option value=""><?php echo get_phrase('select');?></option>
								<?php
								$dorm_id = $this->db->get_where( 'student', array( 'student_id' => $row[ 'student_id' ] ) )->row()->dormitory_id;
								$dormitories = $this->db->get( 'dormitory' )->result_array();
								foreach ( $dormitories as $row2 ):
								?>
								<option value="<?php echo $row2['dormitory_id'];?>" <?php if($dorm_id == $row2[ 'dormitory_id']) echo 'selected';?>><?php echo $row2['name'];?></option>
								<?php endforeach; ?>
							</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('transport_route');?>
							</label>
							<div class="col-md-8">
								<select name="transport_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
								<option value=""><?php echo get_phrase('select');?></option>
								<?php
								$trans_id = $this->db->get_where( 'student', array( 'student_id' => $row[ 'student_id' ] ) )->row()->transport_id;
								$transports = $this->db->get( 'transport' )->result_array();
								foreach ( $transports as $row2 ):
								?>
								<option value="<?php echo $row2['transport_id'];?>" <?php if($trans_id == $row2[ 'transport_id']) echo 'selected';?>><?php echo $row2['route_name'];?></option>
								<?php endforeach;?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-primary">
									<?php echo get_phrase('edit_student');?>
								</button>
							</div>
						</div>

					</fieldset>
					</form>
				</div>
            
	            <div id="resetpass" class="tab-pane">
					<?php echo form_open(base_url() . 'index.php?admin/student/change_password/'.$row['student_id'].'/'.$row['class_id'] , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>
						<fieldset class="mb-xl mt-lg">
							<div class="form-group">
								<label class="col-sm-3 control-label">
									<?php echo get_phrase('new_password');?> <span class="required">*</span>
								</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="new_password"  required title = "<?php echo get_phrase('value_required');?>" value=""/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">
									<?php echo get_phrase('confirm_new_password');?> <span class="required">*</span>
								</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="confirm_new_password"  required title = "<?php echo get_phrase('value_required');?>" value=""/>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-primary">
										<?php echo get_phrase('password_update');?>
									</button>
								</div>
							</div>
						</fieldset>
					</form>
	            </div>
			</div>
		</div>
	</div>

	<?php
	endforeach;
	?>
</div>