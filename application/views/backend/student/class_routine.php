<?php
    $section_id = $this->db->get_where('enroll' , array(
        'student_id' => $student_id,
            'class_id' => $class_id,
                'year' => $running_year
    ))->row()->section_id;
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url();?>index.php?student/class_routine_print_view/<?php echo $class_id;?>/<?php echo $section_id;?>" class="btn btn-primary btn-xs pull-right" target="_blank">
                            <i class="glyphicon glyphicon-print"></i> <?php echo get_phrase('print');?>
                </a>
				<h2 class="panel-title text-center">
					<?php echo get_phrase('class');?> -
					<?php echo $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;?> :
					<?php echo get_phrase('section');?> -
					<?php echo $this->db->get_where('section' , array('section_id' => $section_id))->row()->name;?>
				</h2>
			</header>

			<div class="panel-body">
				<table class="table table-bordered">
					<tbody>
						<?php 
                        for($d=1;$d<=7;$d++):
                        if($d==1)$day='sunday';
                        else if($d==2)$day='monday';
                        else if($d==3)$day='tuesday';
                        else if($d==4)$day='wednesday';
                        else if($d==5)$day='thursday';
                        else if($d==6)$day='friday';
                        else if($d==7)$day='saturday';
                        ?>
						<tr class="gradeA">
							<td width="100">
								<?php echo strtoupper($day);?>
							</td>
							<td>
								<?php
								$this->db->order_by( "time_start", "asc" );
								$this->db->where( 'day', $day );
								$this->db->where( 'class_id', $class_id );
								$this->db->where( 'section_id', $section_id );
								$this->db->where( 'year', $running_year );
								$routines = $this->db->get( 'class_routine' )->result_array();
								foreach ( $routines as $row2 ):
									?>
									<button class="mb-xs mt-xs mr-xs btn btn-primary btn-sm" >
										<?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?>
											<?php
											  echo '(' . $row2[ 'time_start' ] . '-' . $row2[ 'time_end' ] . ')';
											?>
									</button>
								<?php endforeach;?>

							</td>
						</tr>
						<?php endfor;?>

					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>