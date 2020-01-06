<div class="row appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
	<?php 
		foreach($edit_data as $row):
	?>

	<div class="col-md-4">
		<section class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md">
					<img src="<?php echo $this->crud_model->get_image_url('admin' , $row['admin_id']);?>" class="rounded img-responsive">
					<div class="thumb-info-title">
						<span class="thumb-info-inner">
							<?php echo $row['name'];?>
						</span>
						<span class="thumb-info-type">
							<?php echo $this->session->userdata('login_type'); ?>
						</span>
					</div>
				</div>

				<div class="widget-toggle-expand mb-md">
					<div class="widget-content-expanded">
						<ul class="simple-todo-list">
							<li class="mb-xs" ><i class="fa fa-user mr-xs"></i>
								<?php echo $row['name'] ; ?>
							</li>
							<li class="mb-xs"><i class="fa fa-envelope mr-xs"></i>
								<?php echo $row['email'] ; ?>
							</li>
							<li class="mb-xs"><i class="fa fa-institution mr-xs"></i>
								<?php echo $this->db->get_where('settings' , array('type' =>'system_title'))->row()->description;?>
							</li>
							<li><i class="glyphicon glyphicon-phone-alt mr-xs"></i>
								<?php echo $this->db->get_where('settings' , array('type' =>'phone'))->row()->description;?>
							</li>
						</ul>
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
			</ul>
			<div class="tab-content">

				<div id="edit" class="tab-pane active">

					<?php echo form_open(base_url() . 'index.php?admin/manage_profile/update_profile_info' , array('class' => 'form-horizontal form-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
					<h4 class="mb-xlg">Personal Information</h4>
					<fieldset class="mb-xl">

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								<?php echo get_phrase('photo');?>
							</label>

							<div class="col-md-8">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
										<img src="<?php echo $this->crud_model->get_image_url('admin' , $row['admin_id']);?>" alt="...">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
									<div>
										<span class="mr-xs btn btn-xs btn-default btn-file">
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
								<input type="text" class="form-control" required name="name" value="<?php echo $row['name'];?>"/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('email');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" required name="email" value="<?php echo $row['email'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-primary">
									<?php echo get_phrase('update_profile');?>
								</button>
							</div>
						</div>

					</fieldset>
					</form>
					
					<hr class="dotted tall">

					<?php echo form_open(base_url() . 'index.php?admin/manage_profile/change_password' , array('class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
					<h4 class="mb-xlg">
						<?php echo get_phrase('change_password');?>
					</h4>
					<fieldset class="mb-xl">
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('current_password');?> <span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" required title="<?php echo get_phrase('value_required');?>" name="password" value=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('new_password');?> <span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" required title="<?php echo get_phrase('value_required');?>" name="new_password" value=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('confirm_new_password');?>
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" required title="<?php echo get_phrase('value_required');?>" name="confirm_new_password" value=""/>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-primary">
									<?php echo get_phrase('change_password');?>
								</button>
							</div>
						</div>

						</form>
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