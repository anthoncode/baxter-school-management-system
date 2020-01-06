<?php
$child_of_parent = $this->db->get_where( 'enroll', array(
	'student_id' => $student_id, 'year' => $running_year
) )->result_array();
foreach ( $child_of_parent as $row ):
	?>


<section class="panel">
<header class="panel-heading">
	<div class="text-right">
		<div class="label label-primary" style="font-size: 14px; font-weight: 100;">
			<i class="fa fa-user"></i>
			<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
		</div>
	</div>
</header>

<div class="panel-body">
<div class="row">
	<div class="col-md-12 mt-lg">

		<div class="tabs">
			<ul class="nav nav-tabs text-right tabs-primary">
				<?php 
				$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
				foreach ($exams as $row2):
			?>
				<li>
					<a href="#<?php echo $row2['exam_id'];?>" data-toggle="tab">
					<span class="visible-xs"><i class="fa fa-graduation-cap"></i></span>
                    <span class="hidden-xs"><?php echo $row2['name'];?> <small>( <?php echo $row2['date'];?> )</small></span>

					</a>
				</li>
				<?php endforeach;?>
			</ul>
			<div class="tab-content">

				<?php 
					foreach ($exams as $exam):
					$this->db->where('exam_id' , $exam['exam_id']);
					$this->db->where('student_id' , $student_id);
					$this->db->where('year' , $running_year);
					$marks = $this->db->get('mark')->result_array();
				?>
				<div class="tab-pane" id="<?php echo $exam['exam_id'];?>">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>
								<tr>
									<th width="15%">
										<?php echo get_phrase('class');?>
									</th>
									<th>
										<?php echo get_phrase('subject');?>
									</th>
									<th>
										<?php echo get_phrase('total_mark');?>
									</th>
									<th>
										<?php echo get_phrase('mark_obtained');?>
									</th>
									<th width="33%">
										<?php echo get_phrase('comment');?>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($marks as $mark):?>
								<tr>
									<td>
										<?php echo $this->db->get_where('class' , array('class_id' => $mark['class_id']))->row()->name;?>
									</td>
									<td>
										<?php echo $this->db->get_where('subject' , array('subject_id' => $mark['subject_id']))->row()->name;?>
									</td>
									<td>
										<?php echo $mark['mark_total'];?>
									</td>
									<td>
										<?php echo $mark['mark_obtained'];?>
									</td>
									<td>
										<?php echo $mark['comment'];?>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>

					<div class="panel-footer">
						<a href="<?php echo base_url();?>index.php?parents/student_marksheet_print_view/<?php echo $student_id;?>/<?php echo $exam['exam_id'];?>" class="btn btn-primary" target="_blank">
							<?php echo get_phrase('print_marksheet');?>
						</a>
					</div>

				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>

</div>
</section>
<?php endforeach;?>