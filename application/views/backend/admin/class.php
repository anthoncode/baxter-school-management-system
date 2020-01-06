<section class="panel">
	<div class="panel-body">
		<div class="tabs">

			<!---CONTROL TABS START-->
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					<?php echo get_phrase('class_list');?>
                    </a>
				</li>
				<li>
					<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_class');?>
                    </a>
				</li>
			</ul>
			
			<!--CONTROL TABS END-->
			<div class="tab-content">
			
				<!--TABLE LISTING STARTS-->
				<div class="tab-pane box active" id="list">

					<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
						<thead>
							<tr>
								<th>
									<div>#</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('class_name');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('numeric_name');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('teacher');?>
									</div>
								</th>
								<th class="no-sorting">
									<div>
										<?php echo get_phrase('options');?>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1;foreach($classes as $row):?>
							<tr>
								<td>
									<?php echo $count++;?>
								</td>
								<td>
									<?php echo $row['name'];?>
								</td>
								<td>
									<?php echo $row['name_numeric'];?>
								</td>
								<td>
									<?php
									if ( $row[ 'teacher_id' ] != '' || $row[ 'teacher_id' ] != 0 )
										echo $this->crud_model->get_type_name_by_id( 'teacher', $row[ 'teacher_id' ] );
									?>
								</td>
								<td>
									<!-- PARENT EDITING LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class/<?php echo $row['class_id'];?>');">
                                    <i class="fa fa-pencil"></i>
								    </a>
								
									<!-- DELETION LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/classes/delete/<?php echo $row['class_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
								

								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<!----TABLE LISTING ENDS--->


				<!----CREATION FORM STARTS---->
				<div class="tab-pane box" id="add" style="padding: 5px">
					<div class="box-content">
						<?php echo form_open(base_url() . 'index.php?admin/classes/create' , array('class' => 'form-horizontal ','id' => 'form','target'=>'_top'));?>
						<div class="padded">
							<div class="form-group">
								<label class="col-sm-3 control-label">
									<?php echo get_phrase('name');?> <span class="required">*</span>
								</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									<?php echo get_phrase('name_numeric');?> <span class="required">*</span>
								</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="name_numeric" required title="<?php echo get_phrase('value_required');?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									<?php echo get_phrase('teacher');?>
								</label>
								<div class="col-sm-5">
									<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="teacher_id" class="form-control populate">
										<option value=""><?php echo get_phrase('select_teacher');?></option>
										<?php $teachers = $this->db->get('teacher')->result_array();
										 foreach($teachers as $row):
										?>
										<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<br/>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">
									<?php echo get_phrase('add_class');?>
								</button>
							</div>
						</div>
						</form>
					</div>
				</div>
				<!--CREATION FORM ENDS-->
			</div>
		</div>
	</div>
</section>

