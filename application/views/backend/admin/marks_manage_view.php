<?php echo form_open(base_url() . 'index.php?admin/marks_selector');?>
<section class="panel">
	<div class="panel-body">
		<div class="row">

			<div class="col-md-3 mb-sm">
				<div class="form-group">
					<label class="control-label">
						<?php echo get_phrase('exam');?> <span class="required">*</span>
					</label>
					<select name="exam_id" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
						<?php
						$exams = $this->db->get_where( 'exam', array( 'year' => $running_year ) )->result_array();
						foreach ( $exams as $row ):
							?>
						<option value="<?php echo $row['exam_id'];?>" <?php if($exam_id == $row[ 'exam_id']) echo 'selected';?>><?php echo $row['name'];?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="col-md-3 mb-sm">
				<div class="form-group">
					<label class="control-label">
						<?php echo get_phrase('class');?> <span class="required">*</span>
					</label>
					<select name="class_id" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity" onchange="get_class_subject(this.value)">
						<option value="">
							<?php echo get_phrase('select_class');?>
						</option>
						<?php
						$classes = $this->db->get( 'class' )->result_array();
						foreach ( $classes as $row ):
							?>
						<option value="<?php echo $row['class_id'];?>" <?php if($class_id == $row[ 'class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div id="subject_holder">
				<div class="col-md-3 mb-sm">
					<div class="form-group">
						<label class="control-label">
							<?php echo get_phrase('section');?> <span class="required">*</span>
						</label>
						<select name="section_id" id="section_id" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
							<?php 
						$sections = $this->db->get_where('section' , array(
							'class_id' => $class_id 
						))->result_array();
						foreach($sections as $row):
							?>
							<option value="<?php echo $row['section_id'];?>" <?php if($section_id == $row[ 'section_id']) echo 'selected';?>><?php echo $row['name'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="col-md-3 mb-sm">
					<div class="form-group">
						<label class="control-label">
							<?php echo get_phrase('subject');?> <span class="required">*</span>
						</label>
						<select name="subject_id" id="subject_id" class="form-control" data-plugin-selectTwo required title="<?php echo get_phrase('value_required');?>" data-width="100%" data-minimum-results-for-search="Infinity">
							<?php 
								$subjects = $this->db->get_where('subject' , array(
									'class_id' => $class_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
								))->result_array();
								foreach($subjects as $row):
							?>
							<option value="<?php echo $row['subject_id'];?>" <?php if($subject_id == $row[ 'subject_id']) echo 'selected';?>><?php echo $row['name'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

			</div>

		</div>

		<center>
			<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">
				<?php echo get_phrase('manage_marks');?>
			</button>
		</center>


		<?php echo form_close();?>

		<hr class="dotted short mb-lg ">

		<div class="col-md-6 col-md-offset-3">
			<section class="panel">
				<div class="panel-body" style="background-color: #483747">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-area-chart"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title" style="color: #FFF">
									<?php echo get_phrase('marks_for');?>
									<?php echo $this->db->get_where('exam' , array('exam_id' => $exam_id))->row()->name;?>
								</h4>
								<hr class="solid short">
								<span>
									<?php echo get_phrase('class');?>
									<?php echo $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;?> :
									<?php echo get_phrase('section');?>
									<?php echo $this->db->get_where('section' , array('section_id' => $section_id))->row()->name;?>
								</span><br>
								<span>
									<?php echo get_phrase('subject');?> :
									<?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->name;?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="row">

			<div class="col-md-12 mb-sm">

				<?php echo form_open(base_url() . 'index.php?admin/marks_update/'.$exam_id.'/'.$class_id.'/'.$section_id.'/'.$subject_id);?>
				<div class="table-responsive">
					<table class="table table-bordered table-condensed mb-none">
						<thead>
							<tr>
								<th>#</th>
								<th>
									<?php echo get_phrase('roll');?>
								</th>
								<th>
									<?php echo get_phrase('name');?>
								</th>
								<th>
									<?php echo get_phrase('marks_obtained');?>
								</th>
								<th>
									<?php echo get_phrase('comment');?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							$marks_of_students = $this->db->get_where( 'mark', array(
								'class_id' => $class_id,
								'section_id' => $section_id,
								'year' => $running_year,
								'subject_id' => $subject_id,
								'exam_id' => $exam_id
							) )->result_array();
							foreach ( $marks_of_students as $row ):
								?>
							<tr>
								<td>
									<?php echo $count++;?>
								</td>
								<td>
									<?php echo $this->db->get_where('enroll', array('student_id'=>$row['student_id']))->row()->roll;?>
								</td>
								<td>
									<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
								</td>
								<td>
									<input type="text" class="form-control" name="marks_obtained_<?php echo $row['mark_id'];?>" value="<?php echo $row['mark_obtained'];?>">
								</td>
								<td>
									<input type="text" class="form-control" name="comment_<?php echo $row['mark_id'];?>" value="<?php echo $row['comment'];?>">
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>

			</div>
		</div>

	</div>
	<footer class="panel-footer">
		<center>
			<button type="submit" class="btn btn-success" id="submit_button">
				<i class="fa fa-check"></i> <?php echo get_phrase('save_changes');?>
			</button>
		
		</center>
		</div>
		<?php echo form_close();?>
</section>


<script type="text/javascript">
	function get_class_subject( class_id ) {

		$.ajax( {
			url: '<?php echo base_url();?>index.php?admin/marks_get_subject/' + class_id,
			success: function ( response ) {
				jQuery( '#subject_holder' ).html( response );
			}
		} );

	}
</script>