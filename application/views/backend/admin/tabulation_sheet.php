<section class="panel">
<?php echo form_open(base_url() . 'index.php?admin/tabulation_sheet',array('id' => 'form'));?>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 mb-sm">
					<div class="form-group">
						<label class="control-label"><?php echo get_phrase('class');?> <span class="required">*</span></label>
						<select name="class_id" class="form-control" required title="<?php echo get_phrase('value_required');?>" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
							<option value=""><?php echo get_phrase('select_a_class');?></option>
							<?php 
							$classes = $this->db->get('class')->result_array();
							foreach($classes as $row):
							?>
								<option value="<?php echo $row['class_id'];?>"<?php if ($class_id == $row['class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>
				<div class="col-md-6 mb-lg">
					<div class="form-group">
					<label class="control-label"><?php echo get_phrase('exam');?> <span class="required">*</span></label>
						<select name="exam_id" class="form-control" required title="<?php echo get_phrase('value_required');?>" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
							<option value=""><?php echo get_phrase('select_an_exam');?></option>
							<?php 
							$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
							foreach($exams as $row):
							?>
								<option value="<?php echo $row['exam_id'];?>"<?php if ($exam_id == $row['exam_id']) echo 'selected';?>><?php echo $row['name'];?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>
				<input type="hidden" name="operation" value="selection">
			</div>
		</div>

		<center>
			<button type="submit" class="btn btn-primary"><?php echo get_phrase('view_tabulation_sheet');?></button>
		</center>
		
	<?php echo form_close();?>

<?php if ($class_id != '' && $exam_id != ''):?>

	<hr class="dotted short mb-sm mt-sm">
	
		<div class="col-md-6 col-md-offset-3">
			<section class="panel">
				<div class="panel-body" style="background-color: #483747">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa fa-clone"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title" style="color: #FFF">
									<?php echo get_phrase('tabulation_sheet');?>
								</h4>
								<hr class="solid short">
								<span>
								<?php
									$exam_name  = $this->db->get_where('exam' , array('exam_id' => $exam_id))->row()->name; 
									$class_name = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name; 
									echo get_phrase('class') . ' ' . $class_name;?> : <?php echo $exam_name;
								?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>


<div class="col-md-12 mb-sm">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-condensed mb-none">
			<thead>
				<tr>
				<td style="text-align: center;">
					<?php echo get_phrase('students');?> <i class="fa fa-hand-o-down"></i> | <?php echo get_phrase('subjects');?> <i class="fa fa-hand-o-right"></i>
				</td>
				<?php 
					$subjects = $this->db->get_where('subject' , array('class_id' => $class_id , 'year' => $running_year))->result_array();
					foreach($subjects as $row):
				?>
					<td style="text-align: center;"><?php echo $row['name'];?></td>
				<?php endforeach;?>
				<td style="text-align: center;"><?php echo get_phrase('total');?></td>
				<td style="text-align: center;"><?php echo get_phrase('average_grade_point');?></td>
				</tr>
			</thead>
			<tbody>
			<?php
				
				$students = $this->db->get_where('enroll' , array('class_id' => $class_id , 'year' => $running_year))->result_array();
				foreach($students as $row):
			?>
				<tr>
					<td style="text-align: center;">
						<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
					</td>
				<?php
					$total_marks = 0;
					$total_grade_point = 0;  
					foreach($subjects as $row2):
				?>
					<td style="text-align: center;">
						<?php 
							$obtained_mark_query = 	$this->db->get_where('mark' , array(
													'class_id' => $class_id , 
														'exam_id' => $exam_id , 
															'subject_id' => $row2['subject_id'] , 
																'student_id' => $row['student_id'],
																	'year' => $running_year
												));
							if ( $obtained_mark_query->num_rows() > 0) {
								$obtained_marks = $obtained_mark_query->row()->mark_obtained;
								echo $obtained_marks;
								if ($obtained_marks >= 0 && $obtained_marks != '') {
									$grade = $this->crud_model->get_grade($obtained_marks);
									$total_grade_point += $grade['grade_point'];
								}
								$total_marks += $obtained_marks;
							}			

						?>
					</td>
				<?php endforeach;?>
				<td style="text-align: center;"><?php echo $total_marks;?></td>
				<td style="text-align: center;">
					<?php 
						$this->db->where('class_id' , $class_id);
						$this->db->where('year' , $running_year);
						$this->db->from('subject');
						$number_of_subjects = $this->db->count_all_results();
						echo ($total_grade_point / $number_of_subjects);
					?>
				</td>
				</tr>

			<?php endforeach;?>

			</tbody>
		</table>

	</div>
</div>

</div>

	<footer class="panel-footer">
	<center>
		<a href="<?php echo base_url();?>index.php?admin/tabulation_sheet_print_view/<?php echo $class_id;?>/<?php echo $exam_id;?>" 
			class="btn btn-primary" target="_blank">
			<i class="glyphicon glyphicon-print"></i> <?php echo get_phrase('print_tabulation_sheet');?>
		</a>
	</center>
	</footer>
		
</section>
<?php endif;?>