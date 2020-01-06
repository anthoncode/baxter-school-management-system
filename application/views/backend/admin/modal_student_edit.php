<?php
$edit_data = $this->db->get_where( 'enroll', array(
	'student_id' => $param2, 'year' => $this->db->get_where( 'settings', array( 'type' => 'running_year' ) )->row()->description
) )->result_array();
foreach ( $edit_data as $row ):
?>
	<div class="row">
		<div class="col-md-12">
			<?php echo form_open(base_url() . 'index.php?admin/student/do_update/'.$row['student_id'].'/'.$row['class_id'] , array('class' => 'form-wizard form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>
			<section class="panel">
				<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('edit_student');?>
            	</h4>
				
				</div>
				<div class="panel-body">

					<div class="form-group">
						<label for="field-1" class="col-sm-12 control-label">
							<?php echo get_phrase('photo');?>
						</label>

						<div class="col-sm-5">
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

					<div class="row mb-xs">
						<div class="col-md-12">
							<div class="form-group">
								<label for="field-1" class="control-label">
									<?php echo get_phrase('name');?>
								</label>
								<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name; ?>">
							</div>
						</div>
					</div>

					<div class="row mb-xs">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="field-1" class="control-label">
									<?php echo get_phrase('class');?>
								</label>
								<input type="text" class="form-control" name="class" disabled value="<?php echo $this->db->get_where('class' , array('class_id' => $row['class_id']))->row()->name; ?>">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('section');?>
								</label>
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
					</div>

					<div class="row mb-xs">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="field-1" class="control-label">
									<?php echo get_phrase('roll');?>
								</label>
								<input type="text" class="form-control" name="roll" value="<?php echo $row['roll'];?>">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('parent');?>
								</label>

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
					</div>

					<div class="row mb-xs">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('birthday');?>
								</label>
								<input type="text" class="form-control" name="birthday" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->birthday; ?>" data-plugin-datepicker data-plugin-options='{ "startView": 2 }'>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('gender');?>
								</label>
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
					</div>

					<div class="row mb-xs">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('religion');?>
								</label>
								<input type="text" class="form-control" name="religion" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->religion; ?>">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('blood_group');?>
								</label>
								<input type="text" class="form-control" name="blood_group" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->blood_group; ?>">
							</div>
						</div>
					</div>

					<div class="row mb-xs">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('address');?>
								</label>
								<input type="text" class="form-control" name="address" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->address; ?>">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('phone');?>
								</label>
								<input type="text" class="form-control" name="phone" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->phone; ?>">
							</div>
						</div>
					</div>

					<div class="row mb-xs">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="field-1" class="control-label">
									<?php echo get_phrase('email');?>
								</label>
								<input type="text" class="form-control" name="email" value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->email; ?>">
							</div>
						</div>
					</div>

					<div class="row mb-xs">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('dormitory');?>
								</label>
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

						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">
									<?php echo get_phrase('transport_route');?>
								</label>
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
					</div>

				</div>

				<footer class="panel-footer">
					<button type="submit" class="btn btn-primary">
						<?php echo get_phrase('edit_student');?>
					</button>
				</footer>

			</section>
			<?php echo form_close();?>
		</div>
	</div>

<?php
endforeach;
?>