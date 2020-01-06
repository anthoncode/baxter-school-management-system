<?php 
$edit_data		=	$this->db->get_where('transport' , array('transport_id' => $param2) )->result_array();
?>

<section class="panel">
	<?php foreach($edit_data as $row):?>
	<?php echo form_open(base_url() . 'index.php?admin/transport/do_update/'.$row['transport_id'] , array('class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
	<div class="panel-heading">
		<h4 class="panel-title" >
			<i class="fa fa-pencil-square"></i>
			<?php echo get_phrase('edit_transport');?>
		</h4>
	</div>
	
		<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('route_name');?></label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="route_name" value="<?php echo $row['route_name'];?>"
							required title="<?php echo get_phrase('value_required');?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('number_of_vehicle');?></label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="number_of_vehicle" value="<?php echo $row['number_of_vehicle'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo get_phrase('route_fare');?></label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="route_fare" value="<?php echo $row['route_fare'];?>"/>
					</div>
				</div>
		</div>
	
		<footer class="panel-footer">
			<div class="row">
			<div class="col-sm-9 col-sm-offset-3">
			 <button type="submit" class="btn btn-primary"><?php echo get_phrase('edit_transport');?></button>
			</div>
			</div>
		</footer>
		
 </form>
 <?php endforeach;?>
</section> 
        
        