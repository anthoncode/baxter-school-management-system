<div class="table-responsive">

	<table  class="table table-bordered table-striped table-condensed mb-none">
	<thead>
		<tr>
		<th><div>#</div></th>
		<th><div><?php echo get_phrase('title'); ?></div></th>
		<th><div><?php echo get_phrase('notice'); ?></div></th>
		<th><div><?php echo get_phrase('date'); ?></div></th>
		<th><div><?php echo get_phrase('options'); ?></div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$count = 1;
		$notices = $this->db->get_where('noticeboard', array('status' => 0))->result_array();
		foreach ($notices as $row):
			?>
			<tr>
				<td><?php echo $count++; ?></td>
				<td><?php echo $row['notice_title']; ?></td>
				<td class="span5"><?php echo $row['notice']; ?></td>
				<td><?php echo date('d M,Y', $row['create_timestamp']); ?></td>
				<td>
				
				
					<!-- PRINT VIEW NOTICE -->
					<a href="#" class="btn btn-success btn-xs" data-placement="top" data-toggle="tooltip" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_view_notice/<?php echo $row['notice_id']; ?>');" data-original-title="<?php echo get_phrase('print/view_notice');?>">
					<i class="glyphicon glyphicon-print"></i>
					</a>


					<!-- REMOVE ARCHIVED -->
					<a href="<?php echo base_url() ?>index.php?admin/noticeboard/remove_from_archived/<?php echo $row['notice_id'] ?>" class="btn btn-warning btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('remove_from_archive');?>" >
					<i class="fa fa-remove"></i>
					</a>


					<!-- EDITING LINK -->
					<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_notice/<?php echo $row['notice_id']; ?>');">
					<i class="fa fa-pencil"></i>
					</a>


					<!-- DELETION LINK -->
					<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/noticeboard/delete/<?php echo $row['notice_id']; ?>');">
					<i class="fa fa-trash"></i>
					</a>
					
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	</table>

</div>