
<section class="panel">


<header class="panel-heading">
	<div class="text-right">
		<div class="label label-primary" style="font-size: 14px; font-weight: 100;">
			<i class="fa fa-user"></i>
			<?php echo $this->db->get_where('student', array('student_id' => $student_id))->row()->name; ?>
		</div>
	</div>
</header>

<div class="panel-body">

	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label class="control-label" style="margin-bottom: 5px; margin-left: 45%">
						<?php echo get_phrase('month'); ?>
					</label>
					<select name="month" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" id="month" onchange="select_month(this.value)">
						<?php
						for ( $i = 1; $i <= 12; $i++ ):
							if ( $i == 1 )
								$m = 'January';
							else if ( $i == 2 )
							$m = 'February';
						else if ( $i == 3 )
							$m = 'March';
						else if ( $i == 4 )
							$m = 'April';
						else if ( $i == 5 )
							$m = 'May';
						else if ( $i == 6 )
							$m = 'June';
						else if ( $i == 7 )
							$m = 'July';
						else if ( $i == 8 )
							$m = 'August';
						else if ( $i == 9 )
							$m = 'September';
						else if ( $i == 10 )
							$m = 'October';
						else if ( $i == 11 )
							$m = 'November';
						else if ( $i == 12 )
							$m = 'December';
						?>
						<option value="<?php echo $i; ?>" <?php if($month == $i) echo 'selected'; ?> >
							<?php echo $m; ?>
						</option>
						<?php
						endfor;
						?>
					</select>
				</div>
			</div>

			<?php if ($class_id != '' && $section_id != '' && $month != '' && $student_id != ''): ?>

			<div class="col-md-4 col-md-offset-4 mt-lg">
				<section class="panel">
					<div class="panel-body bg-attend">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-area-chart"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">
										<?php
										$section_name = $this->db->get_where( 'section', array( 'section_id' => $section_id ) )->row()->name;
										$class_name = $this->db->get_where( 'class', array( 'class_id' => $class_id ) )->row()->name;
										echo get_phrase( 'attendance_sheet' );
										?>
									</h4>
									<hr class="solid short">
									<span>
										<?php echo get_phrase('class') . ' ' . $class_name; ?> :
										<?php echo get_phrase('section');?>
										<?php echo $section_name; ?><br>
									</span>
									<span><strong><?php echo $m;?></strong></span>

								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-condensed mb-none">
						<thead>
							<tr>
								<td style="text-align: center;">
									<?php echo get_phrase('students'); ?> <i class="fa fa-hand-o-down"></i> | <?php echo get_phrase('date'); ?> <i class="fa fa-hand-o-right"></i>
								</td>
								<?php
								$year = explode( '-', $running_year );
								$days = cal_days_in_month( CAL_GREGORIAN, $month, $year[ 0 ] );

								for ( $i = 1; $i <= $days; $i++ ) {
									?>
								<td style="text-align: center;">
									<?php echo $i; ?>
								</td>
								<?php } ?>

							</tr>
						</thead>
						<tbody>
							<?php
							$data = array();
							$students = $this->crud_model->get_student_info( $student_id );
							foreach ( $students as $row ):
								?>
							<tr>
								<td style="text-align: center;">
									<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?>
								</td>
								<?php
								$status = 0;
								for ( $i = 1; $i <= $days; $i++ ) {
									$timestamp = strtotime( $i . '-' . $month . '-' . $year[ 0 ] );
									$this->db->group_by( 'timestamp' );
									$attendance = $this->db->get_where( 'attendance', array( 'section_id' => $section_id, 'class_id' => $class_id, 'year' => $running_year, 'timestamp' => $timestamp, 'student_id' => $row[ 'student_id' ] ) )->result_array();

									foreach ( $attendance as $row1 ):
										$month_dummy = date( 'd', $row1[ 'timestamp' ] );

									if ( $i == $month_dummy )
										$status = $row1[ 'status' ];

									endforeach;
									?>
								<td style="text-align: center;">
									<?php if ($status == 1) { ?>
									<i class="fa fa-circle" style="color: #00a651;"></i>
									<?php  } if($status == 2)  { ?>
									<i class="fa fa-circle" style="color: #ee4749;"></i>
									<?php  } $status =0;?>

								</td>

								<?php } ?>
								<?php endforeach; ?>
							</tr>

							<?php ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
</section>

<script type="text/javascript">
	function select_month( month ) {

		$.ajax( {
			success: function ( response ) {
				window.location.href = '<?php echo base_url(); ?>index.php?parents/attendance_info/<?php echo $student_id; ?>/' + month;
			}
		} );
	}
</script>