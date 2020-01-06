<section class="panel">
	<header class="panel-heading">

		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_parent_add/');" class="btn btn-primary btn-sm">
                <i class="fa fa-plus-circle"></i>
                <?php echo get_phrase('add_new_parent');?>
            </a>
	
	</header>

	<div class="panel-body">
		<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
			<thead>
				<tr>
					<th>#</th>
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
							<?php echo get_phrase('phone');?>
						</div>
					</th>
					<th>
						<div>
							<?php echo get_phrase('profession');?>
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
				$count = 1;
				$parents = $this->db->get( 'parent' )->result_array();
				foreach ( $parents as $row ): ?>
				<tr>
					<td>
						<?php echo $count++;?>
					</td>
					<td>
						<?php echo $row['name'];?>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
					<td>
						<?php echo $row['phone'];?>
					</td>
					<td>
						<?php echo $row['profession'];?>
					</td>
					<td>
					    <!-- PARENT EDITING LINK -->
						<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_parent_edit/<?php echo $row['parent_id'];?>');">
								<i class="fa fa-pencil"></i>
								</a>
                                    
					    <!-- PARENT RESET PASSWORD LINK -->
						<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('reset_password');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_parent_password/<?php echo $row['parent_id'];?>');">
                                    <i class="fa fa-unlock-alt"></i>
                                    </a>

					    <!-- PARENT DELETE LINK -->
						<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/parent/delete/<?php echo $row['parent_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
					
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</section>