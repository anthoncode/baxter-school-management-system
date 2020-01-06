<?php
	$edit_data = $this->db->get_where( 'teacher', array( 'teacher_id' => $param2 ) )->result_array();
	foreach ( $edit_data as $row ):
?>
	<div class="row">
		<div class="col-md-12">
			<div class="tabs">
				<ul class="nav nav-tabs">

					<li class="active">
						<a href="#list" data-toggle="tab"><i class="fa fa-lock"></i> 
                    <?php echo get_phrase('change_password');?>
                        </a>
					</li>
				</ul>

				<div class="tab-content">
					<br>

					<div class="tab-pane box active" id="list" style="padding: 5px">
						<div class="box-content padded">
							<?php echo form_open(base_url() . 'index.php?admin/teacher/change_password/'.$row['teacher_id'] , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									<?php echo get_phrase('new_password');?>
								</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="new_password"  required title = "<?php echo get_phrase('value_required');?>" value=""/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									<?php echo get_phrase('confirm_new_password');?>
								</label>
								<div class="col-sm-5">
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
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
endforeach;
?>