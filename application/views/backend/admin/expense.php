
<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/expense_add/');" 
		class="mr-xs btn btn-primary btn-sm">
		<i class="fa fa-plus-circle"></i>
		<?php echo get_phrase('add_new_expense');?>
		</a> 
	</header>
	<div class="panel-body">
	
		<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
			<thead>
				<tr>
					<th><div>#</div></th>
					<th><div><?php echo get_phrase('title');?></div></th>
					<th><div><?php echo get_phrase('category');?></div></th>
					<th><div><?php echo get_phrase('method');?></div></th>
					<th><div><?php echo get_phrase('amount');?></div></th>
					<th><div><?php echo get_phrase('date');?></div></th>
					<th class="no-sorting"><div><?php echo get_phrase('options');?></div></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 1;
					$this->db->where('payment_type' , 'expense');
					$this->db->where('year' , $running_year);
					$this->db->order_by('timestamp' , 'desc');
					$expenses = $this->db->get('payment')->result_array();
					foreach ($expenses as $row):
				?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['title'];?></td>
					<td>
						<?php 
							if ($row['expense_category_id'] != 0 || $row['expense_category_id'] != '')
								echo $this->db->get_where('expense_category' , array('expense_category_id' => $row['expense_category_id']))->row()->name;
						?>
					</td>
					<td>
						<?php 
							if ($row['method'] == 1)
								echo get_phrase('cash');
							if ($row['method'] == 2)
								echo get_phrase('check');
							if ($row['method'] == 3)
								echo get_phrase('card');
						?>
					</td>
					<td><?php echo $row['amount'];?></td>
					<td><?php echo date('d M,Y', $row['timestamp']);?></td>
					<td>

							<!-- EDITING LINK -->
							<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/expense_edit/<?php echo $row['payment_id'];?>');">
							<i class="fa fa-pencil"></i>
							</a>

							<!-- DELETION LINK -->
							<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/expense/delete/<?php echo $row['payment_id'];?>');">
							<i class="fa fa-trash"></i>
							</a>

					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</section>

