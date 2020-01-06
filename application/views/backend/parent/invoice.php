<?php 
    $child_of_parent = $this->db->get_where('student' , array(
        'student_id' => $student_id
    ))->result_array();
    foreach ($child_of_parent as $row):
?>
<section class="panel">			
	<header class="panel-heading">
	<div class="text-right">
		<div class="label label-primary" style="font-size: 14px;">
		<i class="fa fa-user"></i> <?php echo $row['name'];?>
		</div>
	</div>	
	</header>

	<div class="panel-body">
		<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
    	<div class="tabs">
		<ul class="nav nav-tabs">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					<?php echo get_phrase('invoice/payment_list');?>
                </a>
			</li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('student');?></div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('amount');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php 
                            $invoices = $this->db->get_where('invoice' , array(
                                'student_id' => $row['student_id']
                            ))->result_array();
                            foreach($invoices as $row2):
                        ?>
                        <tr>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row2['student_id']);?></td>
							<td><?php echo $row2['title'];?></td>
							<td><?php echo $row2['description'];?></td>
							<td><?php echo $row2['amount'];?></td>
							<td>
								<span class="label label-<?php if($row2['status']=='paid')echo 'success';else echo 'danger';?>"><?php echo $row2['status'];?></span>
							</td>
							<td><?php echo date('d M,Y', $row2['creation_timestamp']);?></td>
							<td>
                            <?php echo form_open(base_url() . 'index.php?parents/invoice/' . $row['student_id'] . '/make_payment');?>
                                	<input type="hidden" name="invoice_id" value="<?php echo $row2['invoice_id'];?>" />
                                		<button type="submit" class="btn btn-info" <?php if($row2['status'] == 'paid'):?> disabled="disabled"<?php endif;?>>
                                            <i class="fa fa-paypal"></i> Pay with paypal
                                        </button>
                                </form>
                                
                            
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			    
           </div>
            <!----TABLE LISTING ENDS-->
		</div>
	</div>
		
	</div>
</div>
	</div>
</section>

<?php endforeach;?>
