<section class="panel">
  <div class="panel-body">
	 <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">    <thead>
			<tr>
				<th>#</th>
				<th><?php echo get_phrase('date');?></th>
				<th><?php echo get_phrase('title');?></th>
				<th><?php echo get_phrase('description');?></th>
				<th><?php echo get_phrase('class');?></th>
				<th><?php echo get_phrase('subject');?></th>
				<th><?php echo get_phrase('download');?></th>
			</tr>
		</thead>

		<tbody>
			<?php 
			$count = 1;
			foreach ($study_material_info as $row) { ?>   
				<tr>
					<td><?php echo $count++; ?></td>
					<td><?php echo date("d M, Y", $row['timestamp']); ?></td>
					<td><?php echo $row['title']?></td>
					<td><?php echo $row['description']?></td>
					<td>
						<?php $name = $this->db->get_where('class' , array('class_id' => $row['class_id'] ))->row()->name;
							echo $name;?>
					</td>
					<td>
						<?php $name = $this->db->get_where('subject' , array('subject_id' => $row['subject_id'] ))->row()->name;
							echo $name;?>
					</td>
					<td>
						<a href="<?php echo base_url().'uploads/document/'.$row['file_name']; ?>" class="btn btn-info btn-xs">
							<i class="fa fa-download"></i>
							Download
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
  </div>
</section>

