<section class="panel">

	<header class="panel-heading">
		<a href="<?php echo base_url();?>index.php?admin/class_routine_add" class="btn btn-primary btn-sm">
        <i class="fa fa-plus-circle"></i>
        <?php echo get_phrase('add_class_routine');?>
		</a>
	</header>
	
	<div class="panel-body">
		<?php
		$query = $this->db->get( 'class' );
		$class = $query->result_array();
		?>

		<div class="form-group">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align: center;">
				<?php echo get_phrase('class'); ?>
			</label>
			<div class="col-sm-6 col-sm-offset-3">
				<select data-plugin-selectTwo class="form-control populate" name="class_id" onchange="class_section(this.value)" style="width: 100%">
					<option value=""><?php echo get_phrase('select_class'); ?></option>
					<?php foreach ($class as $row): ?>
					<option value="<?php echo $row['class_id']; ?>" <?php if ($class_id == $row[ 'class_id']) echo 'selected'; ?> ><?php echo $row['name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br>

		<?php
		$query = $this->db->get_where( 'section', array( 'class_id' => $class_id ) );
		if ( $query->num_rows() > 0 && $class_id != '' ):
			$sections = $query->result_array();
		foreach ( $sections as $row ):
			?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-border panel-primary">
					<header class="panel-heading">
						<a href="<?php echo base_url();?>index.php?admin/class_routine_print_view/<?php echo $class_id;?>/<?php echo $row['section_id'];?>" class="btn btn-danger btn-xs pull-right" target="_blank">
						  <i class="glyphicon glyphicon-print"></i> <?php echo get_phrase('print');?>
						 </a>
						<div style="font-size: 16px; text-align: center;">
							<?php echo get_phrase('section');?> -
							<?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?>
						</div>
					</header>
					<div class="panel-body">

						<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
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
										$this->db->where( 'section_id', $row[ 'section_id' ] );
										$this->db->where( 'year', $running_year );
										$routines = $this->db->get( 'class_routine' )->result_array();
										foreach ( $routines as $row2 ):
										?>
										<div class="btn-group">
											<button class="mb-xs mt-xs mr-xs btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
												<?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?>
												<?php
												  echo '(' . $row2[ 'time_start' ] . '-' . $row2[ 'time_end' ] . ')';
												?>
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li>
													<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row2['class_routine_id'];?>');">
														<i class="fa fa-pencil"></i>
														<?php echo get_phrase('edit');?>
                                                    </a>
												
												</li>

												<li>
													<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $row2['class_routine_id'];?>');">
														<i class="fa fa-trash"></i>
														<?php echo get_phrase('delete');?>
													</a>
												
												</li>
											</ul>
										</div>
										<?php endforeach;?>
									</td>
								</tr>
								<?php endfor;?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<?php endif;?>
	</div>
</section>

<script type="text/javascript">
	function class_section( class_id ) {
		window.location.href = '<?php echo base_url(); ?>index.php?admin/class_routine_view/' + class_id;
	}
</script>