<div class="row">
	<div class="col-md-12">
		<section class="panel">
       	<?php echo form_open(base_url() . 'index.php?admin/expense/create/' , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('add_expense');?>
            	</h4>
            </div>
			<div class="panel-body">
				
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('title');?> <span class="required">*</span></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="title" value="" autofocus required title="<?php echo get_phrase('value_required');?>" >
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('category');?> <span class="required">*</span></label>
                        <div class="col-sm-6">
                            <select name="expense_category_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" title="<?php echo get_phrase('value_required');?>">
                                <option value=""><?php echo get_phrase('select_expense_category');?></option>
                                <?php 
                                	$categories = $this->db->get('expense_category')->result_array();
                                	foreach ($categories as $row):
                                ?>
                                <option value="<?php echo $row['expense_category_id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="description" value="" >
						</div> 
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('amount');?> <span class="required">*</span></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="amount" value="" required title="<?php echo get_phrase('value_required');?>" >
						</div> 
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
                        
                        <div class="col-sm-6">
                            <select name="method" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="1"><?php echo get_phrase('cash');?></option>
                                <option value="2"><?php echo get_phrase('check');?></option>
                                <option value="3"><?php echo get_phrase('card');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('date');?> <span class="required">*</span></label>
                        
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-plugin-datepicker name="timestamp" required title="<?php echo get_phrase('value_required');?>" />
                        </div>
                    </div>

            </div>
				<footer class="panel-footer">
				<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary"><?php echo get_phrase('add_expense');?></button>
				</div>
				</div>
				</footer>
				<?php echo form_close();?>
        </section>
    </div>
</div>