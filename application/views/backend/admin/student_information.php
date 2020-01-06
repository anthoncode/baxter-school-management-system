<?php
   $query = $this->db->get( 'class' );
   $class = $query->result_array();
?>

<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
	
	<a href="<?php echo base_url();?>index.php?admin/student_add" class="mr-xs btn btn-primary btn-sm">
       <i class="fa fa-plus-circle"></i>
       <?php echo get_phrase('admit_student'); ?>
    </a>
	
	<a href="<?php echo base_url(); ?>index.php?admin/student_bulk_add" class="btn btn-primary btn-sm hidden-xs">
       <i class="fa fa-plus-circle"></i>
       <?php echo get_phrase('admit_bulk_student'); ?>
    </a>

	</header>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align: center;">
				<?php echo get_phrase('class'); ?>
			</label>
			<div class="col-sm-6 col-sm-offset-3">
				<select data-plugin-selectTwo class="form-control populate" name="class_id" onchange="class_section(this.value)" style="width: 100%">
					<option value=""><?php echo get_phrase('select_class'); ?></option>
					<?php foreach ($class as $row): ?>
					<option value="<?php echo $row['class_id']; ?>" <?php if ($class_id == $row[ 'class_id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<?php 
         $query = $this->db->get_where('section' , array('class_id' => $class_id));
             if ($query->num_rows() > 0 && $class_id != ''):
                       $sections = $query->result_array();
        ?>

		<div class="tabs tabs-primary">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#home" data-toggle="tab">
                    <span class="visible-xs"><i class="fa fa-users"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('all_students');?></span>
					</a>
				</li>

				<?php 
                  foreach ($sections as $row):
                ?>
				<li>
					<a href="#<?php echo $row['section_id'];?>" data-toggle="tab">
                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('section');?> <?php echo $row['name'];?> ( <?php echo $row['nick_name'];?> )</span>
					</a>
				</li>
				<?php endforeach;?>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane active">
					<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" >
						<thead>
							<tr>
								<th width="80">
									<div>
										<?php echo get_phrase('roll');?>
									</div>
								</th>
								<th width="80">
									<div>
										<?php echo get_phrase('photo');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('name');?>
									</div>
								</th>
								<th class="hidden-xs hidden-sm">
									<div>
										<?php echo get_phrase('address');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('email');?>
									</div>
								</th>
								<th class="no">
									<div>
										<?php echo get_phrase('options');?>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $students   =   $this->db->get_where('enroll' , array(
                                    'class_id' => $class_id , 'year' => $running_year
                                ))->result_array();
                                foreach($students as $row):?>
							<tr>
								<td>
									<?php echo $row['roll'];?>
								</td>
								<td class="center"><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" width="30"/>
								</td>
								<td>
									<?php 
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->name;
                                ?>
								</td>
								<td class="hidden-xs hidden-sm">
									<?php 
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->address;
                                ?>
								</td>
								<td>
									<?php 
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->email;
                                ?>
								</td>
								<td>

									<!-- STUDENT MARKSHEET LINK  -->
									<a href="<?php echo base_url();?>index.php?admin/student_marksheet/<?php echo $row['student_id'];?>" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('mark_sheet');?>">
                                    <i class="fa fa-signal"></i>
                                    </a>

									<!-- STUDENT EDITING LINK -->
									<a href="<?php echo base_url();?>index.php?admin/student_profile/<?php echo $row['student_id'];?>" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>">
                                    <i class="fa fa-pencil"></i>
                                    </a>
                                    
									<!-- STUDENT DELETE LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
								
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>

				<?php 
                    $query = $this->db->get_where('section' , array('class_id' => $class_id));
                    if ($query->num_rows() > 0):
                        $sections = $query->result_array();
                        foreach ($sections as $row):
                ?>

				<div id="<?php echo $row['section_id'];?>" class="tab-pane">
					<table class="table table-bordered table-striped table-condensed mb-none">
						<thead>
							<tr>
								<th width="80">
									<div>
										<?php echo get_phrase('roll');?>
									</div>
								</th>
								<th width="80">
									<div>
										<?php echo get_phrase('photo');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('name');?>
									</div>
								</th>
								<th class="hidden-xs hidden-sm">
									<div>
										<?php echo get_phrase('address');?>
									</div>
								</th>
								<th class="hidden-xs hidden-sm">
									<div>
										<?php echo get_phrase('email');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('options');?>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $students   =   $this->db->get_where('enroll' , array(
                                    'class_id'=>$class_id , 'section_id' => $row['section_id'] , 'year' => $running_year
                                ))->result_array();
                                foreach($students as $row):?>
							<tr>
								<td>
									<?php echo $row['roll'];?>
								</td>
								<td class="center"><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" width="30"/>
								</td>
								<td>
									<?php 
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->name;
                                ?>
								</td>
								<td class="hidden-xs hidden-sm">
									<?php 
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->address;
                                ?>
								</td>
								<td class="hidden-xs hidden-sm">
									<?php 
                                    echo $this->db->get_where('student' , array(
                                        'student_id' => $row['student_id']
                                    ))->row()->email;
                                ?>
								</td>
								<td>

									<!-- STUDENT EDITING LINK -->
									<a href="<?php echo base_url();?>index.php?admin/student_profile/<?php echo $row['student_id'];?>" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('profile');?>">
                                    <i class="fa fa-user"></i>
                                    </a>
								

									<!-- STUDENT DELETE LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
								
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>

				<?php endforeach;?>
				<?php endif;?>

			</div>
		</div>
		<?php endif;?>
	</div>
</section>

<script type="text/javascript">
	function class_section( class_id ) {
		window.location.href = '<?php echo base_url(); ?>index.php?admin/student_information/' + class_id;
	}
</script>