<div class="row">
	<div class="col-md-12">
		<section class="panel panel-featured panel-featured-primary">
			<div class="panel-heading">
				<h6 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('addmission_form');?>
            	</h6>
			
			</div>
			<div class="panel-body">

				<?php echo form_open(base_url() . 'index.php?teacher/student/create/' , array('class' => 'form-horizontal form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('photo');?>
					</label>

					<div class="col-md-6">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
								<img src="uploads/200x200.png" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							<div>
								<span class="mr-xs btn btn-default btn-file">
								<span class="fileinput-new">Select image</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="userfile" accept="image/*">
								</span>
								<a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('name');?> <span class="required">*</span>
					</label>
					<div class="col-md-6 ">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-user"></i>
						</span>
							<input type="text" class="form-control" name="name" title="<?php echo get_phrase('value_required');?>" required value="<?=set_value('name')?>" autofocus>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('parent');?>
					</label>
					<div class="col-md-6">
						<select data-plugin-selectTwo data-width="100%" name="parent_id" class="form-control populate">
							<option value=""><?php echo get_phrase('select');?></option>
							<?php  $parents = $this->db->get('parent')->result_array();
							foreach($parents as $row): ?>
							   <option value="<?php echo $row['parent_id'];?>" <?php if (set_value('parent_id') == $row['parent_id']) echo 'selected'; ?>><?php echo $row['name'];?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('class');?> <span class="required">*</span>
					</label>
					<div class="col-md-6">
						<select name="class_id" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" class="form-control populate"  required id="class_id" title="<?php echo get_phrase('value_required');?>" onchange="return get_class_sections(this.value)">
							<option value=""><?php echo get_phrase('select');?></option>
							<?php $classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
							?>
							<option value="<?php echo $row['class_id'];?>" <?php if (set_value('class_id') == $row['class_id']) echo 'selected'; ?>><?php echo $row['name'];?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('section');?>
					</label>
					<div class="col-md-6">
						<select data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="section_id" class="form-control populate" id="section_selector_holder">
							<option value=""><?php echo get_phrase('select_class_first');?></option>
									<?php
							         if (set_value('section_id') != ''):
										$sections = $this->db->get_where( 'section', array( 'class_id' => set_value('class_id') ) )->result_array();
										foreach ( $sections as $row2 ):
									?>
									<option value="<?php echo $row2['section_id'];?>" <?php if(set_value('section_id') == $row2[ 'section_id']) echo 'selected';?>><?php echo $row2['name'];?></option>
									<?php
										endforeach; 
										endif;
									?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('roll');?> <span class="required">*</span>
					</label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="roll" required title="<?php echo get_phrase('value_required');?>" value="<?=set_value('roll')?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('birthday');?>
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
							</span>
						
							<input type="text" class="form-control" name="birthday" value="<?=set_value('birthday')?>" data-plugin-datepicker data-plugin-options='{ "startView": 2 }'>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('gender');?>
					</label>

					<div class="col-md-6">
						<select data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="sex" class="form-control populate">
							<option value=""><?php echo get_phrase('select');?></option>
							<option value="male" <?php if (set_value('sex') == 'male') echo 'selected'; ?>><?php echo get_phrase('male');?></option>
							<option value="female" <?php if (set_value('sex') == 'female') echo 'selected'; ?>><?php echo get_phrase('female');?></option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('religion');?>
					</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="religion" value="<?=set_value('religion')?>">
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('blood_group');?>
					</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="blood_group" value="<?=set_value('blood_group')?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('address');?>
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-map-marker"></i>
						</span>
						
							<input type="text" class="form-control" name="address" value="<?=set_value('address')?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('phone');?>
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-phone"></i>
						</span>
						
							<input type="text" class="form-control" name="phone" value="<?=set_value('phone')?>">
						</div>
					</div>
				</div>

				<div class="form-group <?php if (form_error('email')) echo 'has-error'; ?>">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('email');?> <span class="required">*</span>
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-envelope"></i>
						</span>
							<input type="email" class="form-control" name="email" required id="email" value="<?=set_value('email')?>">
						</div>
						<?php echo form_error('email', '<label id="email-error" class="error" for="email">', '</label>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('password');?> <span class="required">*</span>
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-lock"></i>
						</span>
						
							<input type="password" class="form-control" name="password" required title="<?php echo get_phrase('value_required');?>" value="<?=set_value('password')?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('dormitory');?>
					</label>
					<div class="col-md-6">
						<select name="dormitory_id" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" class="form-control populate">
							<option value=""><?php echo get_phrase('select');?></option>
							<?php $dormitories = $this->db->get('dormitory')->result_array();
	                            foreach($dormitories as $row):
	                        ?>
							<option value="<?php echo $row['dormitory_id'];?>" <?php if (set_value('dormitory_id') == $row['dormitory_id']) echo 'selected'; ?>><?php echo $row['name'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						<?php echo get_phrase('transport_route');?>
					</label>

					<div class="col-md-6">
						<select data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="transport_id" class="form-control populate">
							<option value=""><?php echo get_phrase('select');?></option>
							<?php  $transports = $this->db->get('transport')->result_array();
	                            foreach($transports as $row):
	                        ?>
							<option value="<?php echo $row['transport_id'];?>" <?php if (set_value('transport_id') == $row['transport_id']) echo 'selected'; ?>><?php echo $row['route_name'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

			</div>

			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="mr-xs btn btn-primary">
							<?php echo get_phrase('add_student');?>
						</button>
						<button type="reset" class="btn btn-default">Reset Form</button>
					</div>
				</div>
			</footer>

			<?php echo form_close();?>

		</section>
	</div>
</div>

<script type="text/javascript">
	function get_class_sections( class_id ) {

		$.ajax( {
			url: '<?php echo base_url();?>index.php?teacher/get_class_section/' + class_id,
			success: function ( response ) {
				jQuery( '#section_selector_holder' ).html( response );
			}
		} );
	}
</script>

