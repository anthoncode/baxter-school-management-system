<?php 
	$edit_data	=	$this->db->get_where('expense_category' , array(
		'expense_category_id' => $param2
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
          <?php echo form_open(base_url() . 'index.php?admin/expense_category/edit/' . $row['expense_category_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('edit_expense');?>
            	</h4>
            </div>
			<div class="panel-body">
				
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="name" required title="<?php echo get_phrase('value_required');?>" value="<?php echo $row['name'];?>">
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