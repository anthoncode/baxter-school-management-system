<?php 
	$edit_data	=	$this->db->get_where('payment' , array(
		'payment_id' => $param2
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
		<?php echo form_open(base_url() . 'index.php?admin/expense/edit/' . $row['payment_id'] , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('edit_expense');?>
            	</h4>
            </div>
			<div class="panel-body">
				
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="title" required title="<?php echo get_phrase('value_required');?>" 
							value="<?php echo $row['title'];?>" >
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('category');?></label>
                        <div class="col-sm-6">
                            <select name="expense_category_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value=""><?php echo get_phrase('select_expense_category');?></option>
                                <?php 
                                	$categories = $this->db->get('expense_category')->result_array();
                                	foreach ($categories as $row2):
                                ?>
                                <option value="<?php echo $row2['expense_category_id'];?>"
                                	<?php if ($row['expense_category_id'] == $row2['expense_category_id'])
                                		echo 'selected';?>>
                                			<?php echo $row2['name'];?>
                                				</option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('amount');?></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>" 
                                required title="<?php echo get_phrase('value_required');?>">
						</div> 
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
                        <div class="col-sm-6">
                            <select name="method" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="1" <?php if ($row['method'] == 1) echo 'selected';?>><?php echo get_phrase('cash');?></option>
                                <option value="2" <?php if ($row['method'] == 2) echo 'selected';?>><?php echo get_phrase('check');?></option>
                                <option value="3" <?php if ($row['method'] == 3) echo 'selected';?>><?php echo get_phrase('card');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-plugin-datepicker name="timestamp"
                            value="<?php echo date('d M,Y', $row['timestamp']);?>"
                                required title="<?php echo get_phrase('value_required');?>" />
                        </div>
                    </div>
            </div>
            
			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary"><?php echo get_phrase('update');?></button>
					</div>
				</div>
			</footer>
			
			<?php echo form_close();?>         
            
        </section>
    </div>
</div>

<?php endforeach;?>