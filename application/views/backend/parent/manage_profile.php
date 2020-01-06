<div class="row appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
	<?php 
		foreach($edit_data as $row):
	?>

	<div class="col-md-12">

		<div class="tabs">
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#edit" data-toggle="tab"><i class="fa fa-user"></i> <?php echo get_phrase('manage_profile');?></a>
				</li>
			</ul>
			<div class="tab-content">

				<div id="edit" class="tab-pane active">

					<?php echo form_open(base_url() . 'index.php?parents/manage_profile/update_profile_info' , array('class' => 'form-horizontal form-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
					<h4 class="mb-xlg">Personal Information</h4>
					<fieldset class="mb-xl">

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
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('phone');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" required name="phone" value="<?php echo $row['phone'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('address');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" required name="address" value="<?php echo $row['address'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								<?php echo get_phrase('profession');?>
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" required name="profession" value="<?php echo $row['profession'];?>"/>
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


					 <?php echo form_open(base_url() . 'index.php?parents/manage_profile/change_password' , array('class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
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