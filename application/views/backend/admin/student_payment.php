<div class="row">
	<div class="col-md-12">
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#unpaid" data-toggle="tab">
						<span class="visible-xs"><i class="fa fa-user"></i></span>
						<span class="hidden-xs"><?php echo get_phrase('create_single_invoice');?></span>
					</a>
				</li>
				<li>
					<a href="#paid" data-toggle="tab">
						<span class="visible-xs"><i class="fa fa-users"></i></span>
						<span class="hidden-xs"><?php echo get_phrase('create_mass_invoice');?></span>
					</a>
				</li>
			</ul>
			
			<div class="tab-content">
            <br>
				<div class="tab-pane active" id="unpaid">

				<!-- creation of single invoice -->
				<?php echo form_open(base_url() . 'index.php?admin/invoice/create' , array('class' => 'form-horizontal form-bordered validate'));?>
				<div class="row">
					<div class="col-md-12 ">
	                        <section class="panel panel-border">
	                            <div class="panel-heading">
	                                <h4 class="panel-title"><?php echo get_phrase('invoice_informations');?></h4>
	                            </div>
	                            <div class="panel-body">
	                                
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php echo get_phrase('class');?> <span class="required">*</span></label>
	                                    <div class="col-sm-6">
	                                        <select name="class_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>"
	                                        	onchange="return get_class_students(this.value)">
	                                        	<option value=""><?php echo get_phrase('select_class');?></option>
	                                        	<?php 
	                                        		$classes = $this->db->get('class')->result_array();
	                                        		foreach ($classes as $row):
	                                        	?>
	                                        	<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
	                                        	<?php endforeach;?>
	                                            
	                                        </select>
	                                    </div>
	                                </div>

	                                <div class="form-group">
		                                <label class="col-sm-3 control-label"><?php echo get_phrase('student');?> <span class="required">*</span></label>
		                                <div class="col-sm-6">
		                                    <select name="student_id" class="form-control" id="student_selection_holder" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>">
		                                        <option value=""><?php echo get_phrase('select_class_first');?></option>
		                                    	
		                                    </select>
		                                </div>
		                            </div>

	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php echo get_phrase('title');?> <span class="required">*</span></label>
	                                    <div class="col-sm-6">
	                                        <input type="text" class="form-control" name="title"
                                                required title="<?php echo get_phrase('value_required');?>"/>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
	                                    <div class="col-sm-6">
	                                        <input type="text" class="form-control" name="description"/>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?> <span class="required">*</span></label>
	                                    <div class="col-sm-6">
	                                        <input type="text" class="form-control" data-plugin-datepicker name="date"
                                                required title="<?php echo get_phrase('value_required');?>"/>
	                                    </div>
	                                </div>

                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('total');?> <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="amount"
                                            placeholder="<?php echo get_phrase('enter_total_amount');?>"
                                                required title="<?php echo get_phrase('value_required');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('payment');?> <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="amount_paid"
                                            placeholder="<?php echo get_phrase('enter_payment_amount');?>"
                                                required title="<?php echo get_phrase('value_required');?>"/>
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
									<div class="col-sm-offset-3 col-sm-5">
									  <button type="submit" class="btn btn-primary"><?php echo get_phrase('add_invoice');?></button>
									</div>
								</div>
                        
	                        </div>
	                    </section>
                    </div>


	                </div>
	              	<?php echo form_close();?>

				<!-- creation of single invoice -->
					
				</div>
				
				<div class="tab-pane" id="paid">

				<!-- creation of multi invoice -->
				<?php echo form_open(base_url() . 'index.php?admin/invoice/create_mass_invoice' , array('class' => 'form-horizontal form-bordered validate', 'id'=> 'mass' ,'target'=>'_top'));?>
			
				<div class="row">
				
				<div class="col-md-6">
					
					<section class="panel panel-border">
					<div class="panel-heading">
						<h4 class="panel-title"><?php echo get_phrase('invoice_informations');?></h4>
					</div>
					<div class="panel-body">

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('class');?> <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select name="class_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>"
                            	onchange="return get_class_students_mass(this.value)">
                            	<option value=""><?php echo get_phrase('select_class');?></option>
                            	<?php 
                            		$classes = $this->db->get('class')->result_array();
                            		foreach ($classes as $row):
                            	?>
                            	<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                            	<?php endforeach;?>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('title');?> <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title"
                                required title="<?php echo get_phrase('value_required');?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('total');?> <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="amount"
                                placeholder="<?php echo get_phrase('enter_total_amount');?>"
                                    required title="<?php echo get_phrase('value_required');?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('payment');?> <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="amount_paid"
                                placeholder="<?php echo get_phrase('enter_payment_amount');?>"
                                    required title="<?php echo get_phrase('value_required');?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="paid"><?php echo get_phrase('paid');?></option>
                                <option value="unpaid"><?php echo get_phrase('unpaid');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
                        <div class="col-sm-9">
                            <select name="method" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="1"><?php echo get_phrase('cash');?></option>
                                <option value="2"><?php echo get_phrase('check');?></option>
                                <option value="3"><?php echo get_phrase('card');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('date');?> <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" data-plugin-datepicker name="date"
                                required title="<?php echo get_phrase('value_required');?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary"><?php echo get_phrase('add_invoice');?></button>
                        </div>
                    </div>
                    
				</div>
				</section>

				</div>
				<div class="col-md-6">
					<div id="student_selection_holder_mass"></div>
				</div>
				</div>
				<?php echo form_close();?>

				<!-- creation of mass invoice -->

				</div>
				
			</div>
			
		</div>	
	</div>
</div>

<script type="text/javascript">
	// function check() {
 //    	$("#selectall").click(function () {
 //    		$("input:checkbox").prop('checked', $(this).prop("checked"));
	// 	});
	// }

	function select() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = true ;
			}

		//alert('asasas');
	}
	function unselect() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = false ;
			}
	}
</script>

<script type="text/javascript">
    function get_class_students(class_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_students/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    function get_class_students_mass(class_id) {
    	
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_students_mass/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder_mass').html(response);
            }
        });

        
    }
</script>