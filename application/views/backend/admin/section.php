<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/section_add/');" class="btn btn-sm btn-primary">
    	<i class="fa fa-plus-circle"></i>
			<?php echo get_phrase('add_new_section');?>
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
							<a href="<?php echo base_url();?>index.php?admin/section/<?php echo $row['class_id'];?>">
						<i class="fa fa-star"></i>
						<?php echo get_phrase('class');?> <?php echo $row['name'];?>
					</a>
						
						</li>
						<?php endforeach;?>
					</ul>

					<div class="tab-content">

						<div class="tab-pane active">
							<table class="table table-bordered table-striped table-condensed mb-none">
								<thead>
									<tr>
										<th>#</th>
										<th>
											<?php echo get_phrase('section_name');?>
										</th>
										<th class="hidden-xs hidden-sm">
											<?php echo get_phrase('nick_name');?>
										</th>
										<th class="hidden-xs hidden-sm">
											<?php echo get_phrase('teacher');?>
										</th>
										<th>
											<?php echo get_phrase('options');?>
										</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$count = 1;
									$sections = $this->db->get_where( 'section', array(
										'class_id' => $class_id
									) )->result_array();
									foreach ( $sections as $row ):
										?>
									<tr>
										<td>
											<?php echo $count++;?>
										</td>
										<td class="hidden-xs hidden-sm">
											<?php echo $row['name'];?>
										</td>
										<td class="hidden-xs hidden-sm">
											<?php echo $row['nick_name'];?>
										</td>
										<td>
											<?php if ($row['teacher_id'] != '' || $row['teacher_id'] != 0)
											echo $this->db->get_where('teacher' , array('teacher_id' => $row['teacher_id']))->row()->name;
										?>
										</td>
										<td>
										
										
										<!-- EDITING LINK -->
										<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/section_edit/<?php echo $row['section_id'];?>');">
										<i class="fa fa-pencil"></i>
										</a>

										<!-- DELETION LINK -->
										<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/sections/delete/<?php echo $row['section_id'];?>');">
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
</section>