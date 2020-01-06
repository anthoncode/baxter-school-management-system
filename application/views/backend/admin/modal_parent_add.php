<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open(base_url() . 'index.php?admin/parent/create/' , array('class' => 'form-horizontal form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>

			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_parent');?>
            	</h4>
			
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('name');?> <span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>" autofocus value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('email');?> <span class="required">*</span>
					</label>
					<div class="col-md-7">
						<input type="email" class="form-control" name="email" required title="<?php echo get_phrase('value_required');?>" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						<?php echo get_phrase('password');?> <span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="password" class="form-control" name="password" required title="<?php echo get_phrase('value_required');?>" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						<?php echo get_phrase('phone');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="phone" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						<?php echo get_phrase('address');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="address" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						<?php echo get_phrase('profession');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="profession" value="">
					</div>
				</div>

			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							<?php echo get_phrase('add_parent');?>
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>