<section class="panel">
	<header class="panel-heading">

		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_teacher_add/');" class="btn btn-primary btn-sm">
                <i class="fa fa-plus-circle"></i>
            	<?php echo get_phrase('add_new_teacher');?>
            </a>
            
	</header>

	<div class="panel-body">
		<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
			<thead>
				<tr>
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
					<th>
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
				$teachers = $this->db->get( 'teacher' )->result_array();
				foreach ( $teachers as $row ): ?>
				<tr>
					<td class="center"><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" width="30"/>
					</td>
					<td>
						<?php echo $row['name'];?>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
					<td>

						<!-- TEACHER EDITING LINK -->

						<a href="#" class="btn btn-xs btn-primary" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_teacher_edit/<?php echo $row['teacher_id'];?>');">
                        <i class="fa fa-pencil"></i>
                        </a>

						<!-- TEACHER PASSWORD RESET LINK -->
						<a href="#" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('reset_password');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_teacher_password/<?php echo $row['teacher_id'];?>');">
                        <i class="fa fa-unlock-alt"></i>
                        </a>

						<!-- TEACHER DELETION LINK -->
						<a href="#" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/teacher/delete/<?php echo $row['teacher_id'];?>');">
                        <i class="fa fa-trash"></i>
                        </a>			

					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</section>