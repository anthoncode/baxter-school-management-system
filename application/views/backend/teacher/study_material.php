
<section class="panel">
	<header class="panel-heading">
		<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_study_material_add');" class="btn btn-primary btn-sm">
			<i class="fa fa-plus-circle"></i>
		    <?php echo get_phrase('add_study_material'); ?>
		</button>
	</header>
	<div class="panel-body">

		<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" >
		<thead>
			<tr>
				<th>#</th>
				<th><?php echo get_phrase('date');?></th>
				<th><?php echo get_phrase('title');?></th>
				<th><?php echo get_phrase('description');?></th>
				<th><?php echo get_phrase('class');?></th>
				<th><?php echo get_phrase('subject');?></th>
				<th><?php echo get_phrase('download');?></th>
				<th><?php echo get_phrase('options');?></th>
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
							<span> <?php echo get_phrase('download');?> </span>
						</a>
					</td>
					<td>
						<a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_study_material_edit/<?php echo $row['document_id']?>');" 
							class="btn btn-primary btn-xs">
								<i class="fa fa-pencil"></i>
								<span><?php echo get_phrase('edit');?></span>
						</a>
						<a href="<?php echo base_url();?>index.php?teacher/study_material/delete/<?php echo $row['document_id']?>" 
							class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?');">
								<i class="fa fa-trash"></i>
								<span><?php echo get_phrase('delete');?></span>
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	</div>
</section>
