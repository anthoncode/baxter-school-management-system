<div class="row">
	<div class="col-md-12">

		<!--CONTROL TABS START-->
		<div class="tabs">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					<?php echo get_phrase('book_list');?>
				</a>
			</li>
			<li>
				<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_book');?>
				</a>
			</li>
		</ul>
		<!--CONTROL TABS END-->

		<div class="tab-content">
		<br>
			<!--TABLE LISTING STARTS-->
			<div class="tab-pane box active" id="list">

			   <table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
					<thead>
						<tr>
							<th><div>#</div></th>
							<th><div><?php echo get_phrase('book_name');?></div></th>
							<th><div><?php echo get_phrase('author');?></div></th>
							<th><div><?php echo get_phrase('description');?></div></th>
							<th><div><?php echo get_phrase('price');?></div></th>
							<th><div><?php echo get_phrase('class');?></div></th>
							<th><div><?php echo get_phrase('status');?></div></th>
							<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;foreach($books as $row):?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['author'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['price'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></td>
							<td><span class="label label-<?php if($row['status']=='available')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span></td>
							<td>

								<!-- EDITING LINK -->
								<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_book/<?php echo $row['book_id'];?>');">
								<i class="fa fa-pencil"></i>
								</a>

								<!-- DELETION LINK -->
								<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/book/delete/<?php echo $row['book_id'];?>');">
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
					<?php echo form_open(base_url() . 'index.php?admin/book/create' , array('class' => 'form-horizontal form-bordered','id'=>'form'));?>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('name');?> <span class="required">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="name"
									   required title="<?php echo get_phrase('value_required');?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('author');?></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="author"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="description"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('price');?></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="price"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('class');?> <span class="required">*</span></label>
								<div class="col-sm-5">
									<select name="class_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
										<?php 
										$classes = $this->db->get('class')->result_array();
										foreach($classes as $row):
										?>
											<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
										<?php
										endforeach;
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
								<div class="col-sm-5">
									<select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
										<option value="available"><?php echo get_phrase('available');?></option>
										<option value="unavailable"><?php echo get_phrase('unavailable');?></option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
							  <div class="col-sm-offset-3 col-sm-5">
								  <button type="submit" class="btn btn-primary"><?php echo get_phrase('add_book');?></button>
							  </div>
							</div>
					</form>                
				</div>                
			</div>
			<!---CREATION FORM ENDS-->

		</div>
	</div>
</div>
</div>