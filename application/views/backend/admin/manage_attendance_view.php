<?php echo form_open(base_url() . 'index.php?admin/attendance_selector/'); ?>

<section class="panel">
	<div class="panel-body">
		<div class="row">

			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">
						<?php echo get_phrase('class'); ?>
					</label>
					<select name="class_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" class="form-control mb-sm" onchange="select_section(this.value)">
						<option value="">
							<?php echo get_phrase('select_class'); ?>
						</option>
						<?php
							$classes = $this->db->get('class')->result_array();
							foreach ( $classes as $row ):
						?>
						<option value="<?php echo $row['class_id']; ?>" <?php if ($class_id == $row['class_id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div id="section_holder">
				<div class="col-md-4">

					<div class="form-group">
						<label class="control-label">
							<?php echo get_phrase('section'); ?>
						</label>
						<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="section_id" id="section_id" class="form-control mb-sm">
							<?php
								$sections = $this->db->get_where( 'section', array('class_id' => $class_id) )->result_array();
								foreach ( $sections as $row ):
							?>
							<option value="<?php echo $row['section_id']; ?>" <?php if ($section_id == $row[ 'section_id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">
						<?php echo get_phrase('date'); ?>
					</label>
					<input type="text" class="form-control mb-sm" data-plugin-datepicker name="timestamp" data-plugin-options='{"format": "dd-mm-yyyy"}' value="<?php echo date("d-m-Y", $timestamp); ?>"/>
				</div>
			</div>

			<input type="hidden" name="year" value="<?php echo $running_year; ?>">


			<center>
				<button type="submit" class="mb-xs mt-xs mr-xs btn btn btn-primary">
					<?php echo get_phrase('manage_attendance');?>
				</button>
			</center>
		</div>


		<?php echo form_close(); ?>

		<hr class="dotted short mb-lg">

		<div class="col-md-6 col-md-offset-3">
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
									<?php echo get_phrase('attendance_for_class'); ?> :
									<?php echo $this->db->get_where('class', array('class_id' => $class_id))->row()->name; ?>
								</h4>
								<hr class="solid short">
								<span>
									<?php echo get_phrase('section'); ?>
									<?php echo $this->db->get_where('section', array('section_id' => $section_id))->row()->name; ?>
								</span><br>
								<span>
									<?php echo date("d M Y", $timestamp); ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<style>
			thead {
				background-color: #362a32 !important;
			}
		</style>

		<div class="col-md-12">
			<?php echo form_open(base_url() . 'index.php?admin/attendance_update/' . $class_id . '/' . $section_id . '/' . $timestamp); ?>
			<div id="attendance_update">
				<div class="table-responsive">

				<table class="table table-bordered ">
					<thead>
						<tr>
							<th>#</th>
							<th>
								<?php echo get_phrase('roll'); ?>
							</th>
							<th>
								<?php echo get_phrase('name'); ?>
							</th>
							<th>
								<?php echo get_phrase('status'); ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						$attendance_of_students = $this->db->get_where( 'attendance', array('class_id' => $class_id, 'section_id' => $section_id, 'year' => $running_year, 'timestamp' => $timestamp) )->result_array();
						foreach ( $attendance_of_students as $row ):
						?>
						<tr>
						    <td><?php echo $count++; ?></td>
							<td>
								<?php echo $this->db->get_where('enroll', array('student_id' => $row['student_id']))->row()->roll; ?>
							</td>
							<td>
								<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?>
							</td>
							<td>
								<select class="form-control " data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="status_<?php echo $row['attendance_id']; ?>" style="width: 100%">
									<option value="0" <?php if ($row[ 'status']==0 ) echo 'selected'; ?>><?php echo get_phrase('undefined'); ?></option>
									<option value="1" <?php if ($row[ 'status']==1 ) echo 'selected'; ?>><?php echo get_phrase('present'); ?></option>
									<option value="2" <?php if ($row[ 'status']==2 ) echo 'selected'; ?>><?php echo get_phrase('absent'); ?></option>
								</select>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="panel-footer">
		<center>
			<button type="submit" class="btn btn-success" id="submit_button">
                <i class="fa fa-check"></i> <?php echo get_phrase('save_changes'); ?>
            </button>
		
		</center>
	</div>
	<?php echo form_close(); ?>
</section>
	
<script type="text/javascript">
    function select_section(class_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_section/' + class_id,
            success:function (response)
            {
                jQuery('#section_holder').html(response);
            }
        });
    }
</script>