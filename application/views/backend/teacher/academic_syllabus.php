<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/academic_syllabus_add/');" class="btn btn-sm btn-primary">
    	<i class="fa fa-plus-circle"></i>
			<?php echo get_phrase('add_teacher_suggestion');?>
        </a>
	</header>

	<div class="panel-body">

		<div class="row">
			<div class="col-md-12">

				<div class="tabs tabs-success">

					<ul class="nav nav-tabs text-right">
						<?php 
				            $classes = $this->db->get('class')->result_array();
				            foreach ($classes as $row):
			            ?>
						<li class="<?php if ($row['class_id'] == $class_id) echo 'active';?>">
							<a href="<?php echo base_url();?>index.php?teacher/academic_syllabus/<?php echo $row['class_id'];?>">
						      <?php echo get_phrase('class');?> <?php echo $row['name'];?>
					        </a>
						
						</li>
						<?php endforeach;?>
					</ul>

					<div class="tab-content">

						<div class="tab-pane active">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none">
									<thead>
										<tr>
											<th class="hidden-xs">#</th>
											<th>
												<?php echo get_phrase('title');?>
											</th>
											<th class="hidden-xs hidden-sm">
												<?php echo get_phrase('description');?>
											</th>
											<th>
												<?php echo get_phrase('subject');?>
											</th>
											<th>
												<?php echo get_phrase('uploader');?>
											</th>
											<th>
												<?php echo get_phrase('date');?>
											</th>
											<th>
												<?php echo get_phrase('file');?>
											</th>
											<th></th>
										</tr>
									</thead>
									<tbody>

										<?php
										$count = 1;
										$syllabus = $this->db->get_where( 'academic_syllabus', array(
											'class_id' => $class_id, 'year' => $running_year
										) )->result_array();
										foreach ( $syllabus as $row ):
											?>
										<tr>
											<td class="hidden-xs">
												<?php echo $count++;?>
											</td>
											<td>
												<?php echo $row['title'];?>
											</td>
											<td class="hidden-xs hidden-sm">
												<?php echo $row['description'];?>
											</td>
											<td>
												<?php 
										           echo $this->db->get_where('subject' , array(
											           'subject_id' => $row['subject_id']
										           ))->row()->name;
									           ?>
											</td>
											<td>
												<?php 
										            echo $this->db->get_where($row['uploader_type'] , array(
											            $row['uploader_type'].'_id' => $row['uploader_id']
										            ))->row()->name;
									            ?>
											</td>
											<td>
												<?php echo date("d/m/Y" , $row['timestamp']);?>
											</td>
											<td>
												<?php echo substr($row['file_name'], 0, 20);?>
												<?php if(strlen($row['file_name']) > 20) echo '...';?>
											</td>
											<td align="center" width="100" >
												<!-- SYLLABUS DOWNLOAD LINK -->
												<a class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('download');?>" href="<?php echo base_url();?>index.php?teacher/download_academic_syllabus/<?php echo $row['academic_syllabus_code'];?>">
										            <i class="fa fa-download"></i>
									            </a>
									            
												<!-- ACADEMIC DELETE LINK -->
												<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?teacher/academic_syllabus_delete/<?php echo $row['academic_syllabus_code'].'/'.$row['class_id'] ;?>');">
												<i class="fa fa-trash"></i>
												</a>

											</td>
										</tr>
										<?php endforeach;?>

									</tbody>
								</table>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>
</section>