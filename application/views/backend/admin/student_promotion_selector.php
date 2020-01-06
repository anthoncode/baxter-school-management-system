<div class="row" style="text-align: center;">
	<div class="col-sm-4"></div>
		<div class="col-sm-4 mb-lg mt-lg">
			<div class="tile-box tile-pvs-color">
			<div class="icon"><i class="fa fa-users"></i></div>
			<h3><?php echo get_phrase('students_of_class');?> <?php echo $this->db->get_where('class' , array('class_id' => $class_id_from))->row()->name;?></h3>                              
			</div>
		</div>
	<div class="col-sm-4"></div>
</div>

<div class="row">
	<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-condensed mb-none">
			<thead align="center">
				<tr>
					<td align="center"><?php echo get_phrase('name');?></td >
					<td align="center"><?php echo get_phrase('section');?></td >
					<td align="center"><?php echo get_phrase('roll');?></td >
					<td class="hidden-xs hidden-sm" align="center"><?php echo get_phrase('info');?></td >
					<td align="center"><?php echo get_phrase('options');?></td >
				</tr>
			</thead>
			<tbody>
			<?php 
				$students = $this->db->get_where('enroll' , array(
					'class_id' => $class_id_from , 'year' => $running_year
				))->result_array();
				foreach($students as $row):
					$query = $this->db->get_where('enroll' , array(
						'student_id' => $row['student_id'],
							'year' => $promotion_year
						));
			?>
				<tr>
					
					<td align="center">
						<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
					</td>
					<td align="center">
						<?php if($row['section_id'] != '' && $row['section_id'] != 0)
								echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;
						?>
					</td>
					<td align="center"><?php echo $row['roll'];?></td>
					<td class="hidden-xs hidden-sm" align="center">
					<button type="button" class="mr-xs btn btn-default"
						onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/student_promotion_performance/<?php echo $row['student_id'];?>/<?php echo $class_id_from;?>');">
						<i class="fa fa-eye"></i> <?php echo get_phrase('view_academic_performance');?>
					</button>	
					</td>
					<td align="center">
						<?php if($query->num_rows() < 1):?>
							<select class="form-control" name="promotion_status_<?php echo $row['student_id'];?>" id="promotion_status" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
								<option value="<?php echo $class_id_to;?>"><?php echo get_phrase('enroll_to_class') ." - ". $this->crud_model->get_class_name($class_id_to);?></option>
								<option value="<?php echo $class_id_from;?>"><?php echo get_phrase('enroll_to_class') ." - ". $this->crud_model->get_class_name($class_id_from);?></option>
							</select>
						<?php endif;?>
						<?php if($query->num_rows() > 0):?>
							<a class="btn btn-info btn-sm">
								<i class="fa fa-check"></i> <?php echo get_phrase('student_already_enrolled');?>
							</a>
						<?php endif;?>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
	</div>
</div>
<br>
<div class="row">
	<center>
		<button type="submit" class="btn btn-success">
			<i class="fa fa-check"></i> <?php echo get_phrase('promote_slelected_students');?>
		</button>
	</center>
</div>

<script type="text/javascript">
    $(document).ready(function() {

	if ( $.isFunction($.fn[ 'select2' ]) ) {

		$(function() {
			$('[data-plugin-selectTwo]').each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginSelect2(opts);
			});
		});

	}
   
    });
    
</script>