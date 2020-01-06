<?php echo form_open(base_url() . 'index.php?admin/attendance_report_selector/' , array('id' => 'form')); ?>
<section class="panel">
	<div class="panel-body">
		<div class="row">

			<?php
			$query = $this->db->get( 'class' );
			if ( $query->num_rows() > 0 ):
				$class = $query->result_array();
			?>

			<div class="col-md-4 mb-sm">
				<div class="form-group">
					<label class="control-label">
						<?php echo get_phrase('class'); ?> <span class="required">*</span>
					</label>
					<select class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required name="class_id" onchange="select_section(this.value)">
						<option value=""><?php echo get_phrase('select_class'); ?></option>
						<?php foreach ($class as $row): ?>
						<option value="<?php echo $row['class_id']; ?>" <?php if ($class_id == $row[ 'class_id']) echo 'selected'; ?> ><?php echo $row['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<?php endif; ?>

			<?php
			$query = $this->db->get_where( 'section', array( 'class_id' => $class_id ) );
			if ( $query->num_rows() > 0 ):
				$sections = $query->result_array();
			?>
			<div id="section_holder">
				<div class="col-md-4 mb-sm">
					<div class="form-group">
						<label class="control-label">
							<?php echo get_phrase('section'); ?>
						</label>
						<select class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required name="section_id">
							<?php foreach ($sections as $row): ?>
							<option value="<?php echo $row['section_id']; ?>" <?php if ($section_id == $row[ 'section_id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="col-md-4 mb-sm">
				<div class="form-group">
					<label class="control-label">
						<?php echo get_phrase('month'); ?>
					</label>
					<select name="month" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required id="month-">
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
						<option value="<?php echo $i; ?>" <?php if ($month == $i) echo 'selected'; ?>><?php echo $m; ?></option>
						<?php
						endfor;
						?>
					</select>
				</div>
			</div>

			<input type="hidden" name="year" value="<?php echo $running_year;?>">
			</div>
			
		<center>
			<button type="submit" class="mb-xs mt-xs mr-xs btn btn btn-primary">
				<?php echo get_phrase('show_report'); ?>
			</button>
		</center>
		<?php echo form_close(); ?>

		

		<?php if ($class_id != '' && $section_id != '' && $month != ''): ?>

		<hr class="dotted short mb-lg">

		<div class="row">

			<div class="col-md-6 col-md-offset-3">
				<section class="panel">
					<div class="panel-body bg-attend">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-signal"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<?php
									$section_name = $this->db->get_where( 'section', array( 'section_id' => $section_id ) )->row()->name;
									$class_name = $this->db->get_where( 'class', array( 'class_id' => $class_id ) )->row()->name;
									if ( $month == 1 )
										$m = 'January';
									else if ( $month == 2 )
										$m = 'February';
									else if ( $month == 3 )
										$m = 'March';
									else if ( $month == 4 )
										$m = 'April';
									else if ( $month == 5 )
										$m = 'May';
									else if ( $month == 6 )
										$m = 'June';
									else if ( $month == 7 )
										$m = 'July';
									else if ( $month == 8 )
										$m = 'August';
									else if ( $month == 9 )
										$m = 'Sepetember';
									else if ( $month == 10 )
										$m = 'October';
									else if ( $month == 11 )
										$m = 'November';
									else if ( $month == 12 )
										$m = 'December';
									?>

									<h4 class="title"> 
										<?php echo get_phrase('attendance_sheet'); ?>
									</h4>
										<hr class="solid short">
										<span>
											<?php echo get_phrase('class') . ' ' . $class_name; ?> :
											<?php echo get_phrase('section');?>
											<?php echo $section_name; ?>
										</span><br>
										<span>
											<?php echo $m;?>
										</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-condensed  mb-none" id="my_table">
					<thead>
						<tr>
							<td style="text-align: center;">
								<?php echo get_phrase('students'); ?> <i class="fa fa-hand-o-down"></i> |
								<?php echo get_phrase('date'); ?> <i class="fa fa-hand-o-right"></i>
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

						$students = $this->db->get_where( 'enroll', array( 'class_id' => $class_id, 'year' => $running_year, 'section_id' => $section_id ) )->result_array();

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

					</tbody>
				</table>

			</div>
		</div>

		<?php endif; ?>
	</div>

	<div class="panel-footer">
		<center>
			<a href="<?php echo base_url(); ?>index.php?admin/attendance_report_print_view/<?php echo $class_id; ?>/<?php echo $section_id; ?>/<?php echo $month; ?>" class="btn btn-sm btn-primary " target="_blank">
				<i class="glyphicon glyphicon-print"></i> <?php echo get_phrase('print_attendance_sheet'); ?>
			</a>
		</center>
	</div>
	
</section>

<script type="text/javascript">
	function select_section( class_id ) {

		$.ajax( {
			url: '<?php echo base_url(); ?>index.php?admin/get_section/' + class_id,
			success: function ( response ) {
				jQuery( '#section_holder' ).html( response );
			}
		} );
	}
</script>