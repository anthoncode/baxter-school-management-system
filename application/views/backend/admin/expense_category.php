<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/expense_category_add/');" 
		class="mr-xs btn btn-primary btn-sm">
		<i class="fa fa-plus-circle"></i>
		<?php echo get_phrase('add_new_expense_category');?>
		</a> 
	</header>
	<div class="panel-body">

		<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
			<thead>
				<tr>
					<th><div>#</div></th>
					<th><div><?php echo get_phrase('name');?></div></th>
					<th class="no-sorting"><div><?php echo get_phrase('options');?></div></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 1;
					$expenses = $this->db->get('expense_category')->result_array();
					foreach ($expenses as $row):
				?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['name'];?></td>
					<td>

						<!-- EDITING LINK -->
						<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/expense_category_edit/<?php echo $row['expense_category_id'];?>');">
						<i class="fa fa-pencil"></i>
						</a>

						<!-- DELETION LINK -->
						<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/expense_category/delete/<?php echo $row['expense_category_id'];?>');">
						<i class="fa fa-trash"></i>
						</a>

					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</section>



