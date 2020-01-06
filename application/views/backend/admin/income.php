<div class="row">
	<div class="col-md-12">
		<div class="tabs">
		
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#unpaid" data-toggle="tab">
						<span><?php echo get_phrase('invoices');?></span>
					</a>
				</li>
				<li>
					<a href="#paid" data-toggle="tab">
						<span><?php echo get_phrase('payment_history');?></span>
					</a>
				</li>
			</ul>
			
			<div class="tab-content">
			<br>
				<div class="tab-pane active" id="unpaid">
					
				<table class="table table-bordered table-striped mb-none" id="table_default">
                	<thead>
                		<tr>
                			<th>#</th>
                    		<th><div><?php echo get_phrase('student');?></div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                            <th><div><?php echo get_phrase('total');?></div></th>
                            <th><div><?php echo get_phrase('paid');?></div></th>
                            <th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                    		<th class="no-sorting"><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php
                    		$count = 1;
                    		$this->db->where('year' , $running_year);
                    		$this->db->order_by('creation_timestamp' , 'desc');
                    		$invoices = $this->db->get('invoice')->result_array();
                    		foreach($invoices as $row):
                    	?>
                        <tr>
                        	<td><?php echo $count++;?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['amount_paid'];?></td>
                            <?php if($row['due'] == 0):?>
                            	<td>
                            		<button class="btn btn-success btn-xs"><?php echo get_phrase('paid');?></button>
                            	</td>
                            <?php endif;?>
                            <?php if($row['due'] > 0):?>
                            	<td>
                            		<button class="btn btn-danger btn-xs"><?php echo get_phrase('unpaid');?></button>
                            	</td>
                            <?php endif;?>
							<td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
							<td width="120px">
									<!-- PAYMENT LINK  -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('take_payment');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_take_payment/<?php echo $row['invoice_id'];?>');">
                                    <i class="fa fa-money"></i>
                                    </a>
								

									<!-- VIEWING LINK -->
									<a href="<?php echo base_url();?>index.php?admin/invoice_view/<?php echo $row['invoice_id'];?>" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('view_invoice');?>" >
                                    <i class="fa fa-newspaper-o"></i>
                                    </a>
								

									<!-- EDITING LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_invoice/<?php echo $row['invoice_id'];?>');">
                                    <i class="fa fa-pencil"></i>
                                    </a>
								

									<!-- STUDENT DELETE LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/invoice/delete/<?php echo $row['invoice_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
	
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
					
				</div>
				<div class="tab-pane" id="paid">
					
					<table class="table table-bordered table-striped mb-none" id="table_history">
					    <thead>
					        <tr>
					            <th><div>#</div></th>
					            <th><div><?php echo get_phrase('title');?></div></th>
					            <th><div><?php echo get_phrase('description');?></div></th>
					            <th><div><?php echo get_phrase('method');?></div></th>
					            <th><div><?php echo get_phrase('amount');?></div></th>
					            <th><div><?php echo get_phrase('date');?></div></th>
					            <th class="no-sorting"></th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php 
					        	$count = 1;
					        	$this->db->where('payment_type' , 'income');
					        	$this->db->order_by('timestamp' , 'desc');
					        	$payments = $this->db->get('payment')->result_array();
					        	foreach ($payments as $row):
					        ?>
					        <tr>
					            <td><?php echo $count++;?></td>
					            <td><?php echo $row['title'];?></td>
					            <td><?php echo $row['description'];?></td>
					            <td>
					            	<?php 
					            		if ($row['method'] == 1)
					            			echo get_phrase('cash');
					            		if ($row['method'] == 2)
					            			echo get_phrase('check');
					            		if ($row['method'] == 3)
					            			echo get_phrase('card');
					                    if ($row['method'] == 'paypal')
					                    	echo 'paypal';
					            	?>
					            </td>
					            <td><?php echo $row['amount'];?></td>
					            <td><?php echo date('d M,Y', $row['timestamp']);?></td>
					            <td align="center">
					            	<a href="<?php echo base_url();?>index.php?admin/invoice_view/<?php echo $row['invoice_id'];?>"
					            		class="btn btn-sm btn-default">
					            			<?php echo get_phrase('view_invoice');?>
					            	</a>
					            </td>
					        </tr>
					        <?php endforeach;?>
					    </tbody>
					</table>
				</div>
			</div>	
	
			
		</div>			
	</div>
</div>

<!--  DATA TABLE CONFIGURATIONS -->   
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
	
	$('#table_default').dataTable({ 
	 	aoColumnDefs: [{ bSortable: false, aTargets: [1,2,3,4,5,6,7] }]
	 });
		
	$('#table_history').dataTable({ 
	 	aoColumnDefs: [{ bSortable: false, aTargets: [1,2,3,4,5,6] }]
	 });

	});
		
</script>
