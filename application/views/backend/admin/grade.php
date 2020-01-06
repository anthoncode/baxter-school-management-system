<div class="row">
	<div class="col-md-12">

		<!--CONTROL TABS START-->
		<div class="tabs">
		<ul class="nav nav-tabs bordered">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					<?php echo get_phrase('grade_list');?>
				</a>
			</li>
			<li>
				<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_grade');?>
				</a>
			</li>
		</ul>
		<!--CONTROL TABS END-->
		<div class="tab-content">
		<br>
			<!----TABLE LISTING STARTS-->
			<div class="tab-pane box active" id="list">

				<table class="table table-bordered table-striped mb-none" id="table_default">
					<thead>
						<tr>
							<th><div>#</div></th>
							<th><div><?php echo get_phrase('grade_name');?></div></th>
							<th><div><?php echo get_phrase('grade_point');?></div></th>
							<th><div><?php echo get_phrase('mark_from');?></div></th>
							<th><div><?php echo get_phrase('mark_upto');?></div></th>
							<th><div><?php echo get_phrase('comment');?></div></th>
							<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;foreach($grades as $row):?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['grade_point'];?></td>
							<td><?php echo $row['mark_from'];?></td>
							<td><?php echo $row['mark_upto'];?></td>
							<td><?php echo $row['comment'];?></td>
							<td>

							<!-- EDITING LINK -->
							<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_grade/<?php echo $row['grade_id'];?>');">
							<i class="fa fa-pencil"></i>
							</a>

							<!-- DELETION LINK -->
							<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/grade/delete/<?php echo $row['grade_id'];?>');">
							<i class="fa fa-trash"></i>
							</a>

							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<!--TABLE LISTING ENDS-->

			<!--CREATION FORM STARTS-->
			<div class="tab-pane box" id="add" style="padding: 5px">
				<div class="box-content">
					<?php echo form_open(base_url() . 'index.php?admin/grade/create' , array('class' => 'form-horizontal form-bordered','id' => 'form'));?>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('name');?> <span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="name"
									  required title="<?php echo get_phrase('value_required');?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('grade_point');?> <span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="grade_point"
									  required title="<?php echo get_phrase('value_required');?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('mark_from');?> <span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="mark_from"
									  required title="<?php echo get_phrase('value_required');?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('mark_upto');?> <span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="mark_upto"
									  required title="<?php echo get_phrase('value_required');?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="comment"/>
								</div>
							</div>
							<div class="form-group">
							  <div class="col-sm-offset-3 col-sm-5">
								  <button type="submit" class="btn btn-primary"><?php echo get_phrase('add_grade');?></button>
							  </div>
							</div>
					</form>                
				</div>                
			</div>
			<!--CREATION FORM ENDS-->

		</div>
	</div>
	</div>
</div>


<!--  DATA TABLE CONFIGURATIONS -->   
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
	var $table = $('#table_default');
	
	 $table.dataTable({ 
	 	aoColumnDefs: [{ bSortable: false, aTargets: [1,2,3,4,5,6] }]
	 });

	});
		
</script>
