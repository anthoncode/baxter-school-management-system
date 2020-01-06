<?php 
$edit_data = $this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
?>
    <section class="panel" id="edit">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/invoice/do_update/'.$row['invoice_id'], array('class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
        <div class="panel-heading">
         <h4 class="panel-title" >
          <i class="fa fa-pencil-square"></i>
          <?php echo get_phrase('edit_invoice');?>
         </h4>
        </div>
		<div class="panel-body">

			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>
				<div class="col-sm-7">
					<select name="student_id" class="form-control" data-plugin-selectTwo data-width="100%" required>
						<?php 
						//$this->db->order_by('class_id','asc');
						$students = $this->db->get('student')->result_array();
						foreach($students as $row2):
						?>
							<option value="<?php echo $row2['student_id'];?>"
								<?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
								<?php
									echo $this->crud_model->get_type_name_by_id('student' , $row2['student_id']);
									$class_id = $this->db->get_where('enroll' , array(
										'student_id' => $row2['student_id'],
											'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
									))->row()->class_id;
								?> - 
								 <?php echo $this->crud_model->get_class_name($class_id);?>
							</option>
						<?php
						endforeach;
						?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('total_amount');?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
				<div class="col-sm-7">
					<select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
						<option value="paid" <?php if($row['status']=='paid')echo 'selected';?>><?php echo get_phrase('paid');?></option>
						<option value="unpaid" <?php if($row['status']=='unpaid')echo 'selected';?>><?php echo get_phrase('unpaid');?></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" data-plugin-datepicker name="date" 
						value="<?php echo date('m/d/Y', $row['creation_timestamp']);?>"/>
				</div>

			</div>
			
    </div>
		<footer class="panel-footer">
		<div class="row">
		<div class="col-sm-9 col-sm-offset-3">
		<button type="submit" class="btn btn-primary"><?php echo get_phrase('edit_invoice');?></button>
		</div>
		</div>
		</footer>
		</form>
		<?php endforeach;?> 
</section>