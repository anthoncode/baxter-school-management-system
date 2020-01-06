<?php 
$edit_data	=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
        <section class="panel">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo get_phrase('payment_history');?></h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none">
                	<thead>
                		<tr>
                			<td>#</td>
                			<td><?php echo get_phrase('amount');?></td>
                			<td><?php echo get_phrase('method');?></td>
                			<td><?php echo get_phrase('date');?></td>
                		</tr>
                	</thead>
                	<tbody>
                	<?php 
                		$count = 1;
                		$payments = $this->db->get_where('payment' , array(
                			'invoice_id' => $row['invoice_id']
                		))->result_array();
                		foreach ($payments as $row2):
                	?>
                		<tr>
                			<td><?php echo $count++;?></td>
                			<td><?php echo $row2['amount'];?></td>
                			<td>
                				<?php 
                					if ($row2['method'] == 1)
                						echo get_phrase('cash');
                					if ($row2['method'] == 2)
                						echo get_phrase('check');
                					if ($row2['method'] == 3)
                						echo get_phrase('card');
                                    if ($row2['method'] == 'paypal')
                                        echo 'paypal';
                				?>
                			</td>
                			<td><?php echo date('d M,Y', $row2['timestamp']);?></td>
                		</tr>
                	<?php endforeach;?>
                	</tbody>
                </table>
               </div>
            </div>
        </section>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			
				<?php echo form_open(base_url() . 'index.php?admin/invoice/take_payment/'.$row['invoice_id'], array(
					'class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
					
			<div class="panel-heading">
                <h4 class="panel-title"><?php echo get_phrase('take_payment');?></h4>
            </div>
            <div class="panel-body">

					<div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo get_phrase('total_amount');?></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" value="<?php echo $row['amount'];?>" disabled=""/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo get_phrase('amount_paid');?></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" name="amount_paid" value="<?php echo $row['amount_paid'];?>" disabled=""/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo get_phrase('due');?></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" value="<?php echo $row['due'];?>" disabled=""/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo get_phrase('payment');?> <span class="required">*</span></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" name="amount" value="" title="<?php echo get_phrase('value_required');?>" required
		                    	placeholder="<?php echo get_phrase('enter_payment_amount');?>"/>
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
                        <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                        <div class="col-sm-6">
                            <select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="paid"><?php echo get_phrase('paid');?></option>
                                <option value="unpaid"><?php echo get_phrase('unpaid');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
	                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?> <span class="required">*</span></label>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control" required title="<?php echo get_phrase('value_required');?>" data-plugin-datepicker name="timestamp" value=""/>
	                    </div>
					</div>

                    <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'];?>">
                    <input type="hidden" name="student_id" value="<?php echo $row['student_id'];?>">
                    <input type="hidden" name="title" value="<?php echo $row['title'];?>">
                    <input type="hidden" name="description" value="<?php echo $row['description'];?>">

			</div>
				<footer class="panel-footer">
				<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary"><?php echo get_phrase('take_payment');?></button>
				</div>
				</div>
				</footer>
				<?php echo form_close();?>
		</section>
	</div>
</div>


<?php endforeach;?>