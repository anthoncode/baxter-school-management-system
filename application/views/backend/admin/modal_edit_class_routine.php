<?php 
$edit_data = $this->db->get_where('class_routine' , array('class_routine_id' => $param2) )->result_array();
?>
<section class="panel">

 <?php foreach($edit_data as $row):?>
   <?php echo form_open(base_url() . 'index.php?admin/class_routine/do_update/'.$row['class_routine_id'] , array('class' => 'form-horizontal form-bordered', 'id' => 'form'));?>

 <header class="panel-heading">
   <h4 class="panel-title">
   <i class="fa fa-pencil-square"></i>
   <?php echo get_phrase('edit_class_routine');?>
   </h4>
 </header>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
				<div class="col-md-6">
					<select data-plugin-selectTwo id="class_id" name="class_id" class="form-control populate" onchange="section_subject_select(this.value , <?php echo $param2;?>)" style="width: 100%">
						<?php 
						$classes = $this->db->get('class')->result_array();
						foreach($classes as $row2):
						?>
							<option value="<?php echo $row2['class_id'];?>" <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
			</div>
			<div id="section_subject_edit_holder"></div>
			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
				<div class="col-md-6">
					<select name="day" data-plugin-selectTwo class="form-control populate" style="width: 100%">
						<option value="saturday" 	<?php if($row['day']=='saturday')echo 'selected="selected"';?>>Saturday</option>
						<option value="sunday" 		<?php if($row['day']=='sunday')echo 'selected="selected"';?>>Sunday</option>
						<option value="monday" 		<?php if($row['day']=='monday')echo 'selected="selected"';?>>Monday</option>
						<option value="tuesday" 	<?php if($row['day']=='tuesday')echo 'selected="selected"';?>>Tuesday</option>
						<option value="wednesday" 	<?php if($row['day']=='wednesday')echo 'selected="selected"';?>>Wednesday</option>
						<option value="thursday" 	<?php if($row['day']=='thursday')echo 'selected="selected"';?>>Thursday</option>
						<option value="friday" 		<?php if($row['day']=='friday')echo 'selected="selected"';?>>Friday</option>
					</select>
				</div>
			</div>
                
			<div class="form-group">
				<label class="col-md-3 control-label">
					<?php echo get_phrase('starting_time');?>
				</label>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_start" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }' value = <?php echo $row['time_start'] ?>>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-3 control-label">
					<?php echo get_phrase('ending_time');?>
				</label>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_end" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }' value = <?php echo $row['time_end'] ?>>
					</div>
				</div>
			</div>
		</div>

    <footer class="panel-footer">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary"><?php echo get_phrase('edit_class_routine');?></button>
			</div>
		</div>
    </footer>
    
  </form>
<?php endforeach;?>

</section>

<script type="text/javascript">
    function section_subject_select(class_id , class_routine_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/section_subject_edit/' + class_id + '/' + class_routine_id ,
            success: function(response)
            {
                jQuery('#section_subject_edit_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var class_id = $('#class_id').val();
        var class_routine_id = '<?php echo $param2;?>';
        section_subject_select(class_id,class_routine_id);
        
    }); 
</script>

