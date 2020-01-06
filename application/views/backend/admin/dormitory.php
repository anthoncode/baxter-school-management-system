 <div class="row">
	<div class="col-md-12">
    
    	<!--CONTROL TABS START-->
    	<div class="tabs">
		<ul class="nav nav-tabs">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					<?php echo get_phrase('dormitory_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_dormitory');?>
                    	</a></li>
		</ul>
    	<!--CONTROL TABS END-->
	
		<div class="tab-content">
        <br>
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane box <?php if(!isset($edit_data))echo 'active';?>" id="list">
                <table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('dormitory_name');?></div></th>
                    		<th><div><?php echo get_phrase('number_of_room');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($dormitories as $row):?>
                        <tr>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['number_of_room'];?></td>
							<td><?php echo $row['description'];?></td>
							<td width="90px">
                           
									<!-- STUDENTS IN THE TRANSPORT -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('students');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_dormitory_student/<?php echo $row['dormitory_id'];?>');">
									<i class="fa fa-user"></i>
									</a>

									<!-- EDITING LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_dormitory/<?php echo $row['dormitory_id'];?>');">
									<i class="fa fa-pencil"></i>
									</a>

									<!-- DELETION LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/dormitory/delete/<?php echo $row['dormitory_id'];?>');">
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
                	<?php echo form_open(base_url() . 'index.php?admin/dormitory/create' , array('class' => 'form-horizontal form-bordered','id'=>'form'));?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('dormitory_name');?> <span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name"
                                        required title="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('number_of_room');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="number_of_room"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="description"/>
                                </div>
                            </div>
							<div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-primary"><?php echo get_phrase('add_dormitory');?></button>
                              </div>
							</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
		</div>
	</div>
</div>
