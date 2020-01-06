<div class="row">
	<div class="col-md-12">
    <div class="tabs">
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					<?php echo get_phrase('invoice/payment_list');?>
                    	</a></li>
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
                    		<th class="no-sorting"><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php foreach($invoices as $row):?>
                        <tr>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['amount'];?></td>
							<td>
								<span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span>
							</td>
							<td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
							<td>
                            <?php echo form_open('student/invoice/make_payment');?>
                                	<input type="hidden" name="invoice_id" 		value="<?php echo $row['invoice_id'];?>" />
                                		<button type="submit" class="btn btn-info" <?php if($row['status'] == 'paid'):?> disabled="disabled"<?php endif;?>>
                                            <i class="fa fa-paypal"></i> Pay with paypal
                                        </button>
                                </form>
                                
                            
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			
            
		</div>
	  </div>
	</div>
</div>

