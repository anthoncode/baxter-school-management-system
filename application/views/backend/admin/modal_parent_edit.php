<?php
$edit_data = $this->db->get_where( 'parent', array( 'parent_id' => $param2 ) )->result_array();
foreach ( $edit_data as $row ):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open(base_url() . 'index.php?admin/parent/edit/' . $row['parent_id'] , array('class' => 'form-horizontal form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>
			
			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('update');?>
            	</h4>
			</div>

			<div class="panel-body">

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('name');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>" value="<?php echo $row['name'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo get_phrase('email');?>
					</label>
					<div class="col-md-7">
						<input type="email" required class="form-control" name="email" value="<?php echo $row['email'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						<?php echo get_phrase('phone');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						<?php echo get_phrase('address');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						<?php echo get_phrase('profession');?>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="profession" value="<?php echo $row['profession'];?>">
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