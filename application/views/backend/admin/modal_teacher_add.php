<div class="row">
	<div class="col-md-12">
		<section class="panel">
		
			<?php echo form_open(base_url() . 'index.php?admin/teacher/create/' , array('class' => 'form-horizontal form-bordered', 'id' => 'form', 'enctype' => 'multipart/form-data'));?>
			
			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_teacher');?>
            	</h4>
			</div>
					
			<div class="panel-body">

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('name');?> <span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>" value="" autofocus>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('birthday');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="birthday" value="" data-plugin-datepicker data-plugin-options='{ "startView": 2 }'>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('gender');?>
					</label>

					<div class="col-md-7">
						<select name="sex" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" class="form-control populate">
							<option value=""><?php echo get_phrase('select');?></option>
							<option value="male"><?php echo get_phrase('male');?></option>
							<option value="female"><?php echo get_phrase('female');?></option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('address');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="address" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('phone');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="phone" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('email');?> <span class="required">*</span>
					</label>
					<div class="col-md-7">
						<input type="email" class="form-control" name="email" required value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('password');?> <span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="password" class="form-control" name="password" required title="<?php echo get_phrase('value_required');?>" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('photo');?>
					</label>

					<div class="col-md-7">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								<img src="http://placehold.it/200x200" alt="...">
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

			</div>
			<footer class="panel-footer">
					<div class="col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							<?php echo get_phrase('add_teacher');?>
						</button>
					</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>