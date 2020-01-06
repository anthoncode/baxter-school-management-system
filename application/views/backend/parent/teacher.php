
<section class="panel">
	<div class="panel-body">
		<table class="table table-bordered table-striped mb-none" id="datatable-default">
			<thead>
				<tr>
					<th width="80"><div><?php echo get_phrase('photo');?></div></th>
					<th><div><?php echo get_phrase('name');?></div></th>
					<th><div><?php echo get_phrase('email');?></div></th>
				</tr>
			</thead>
			<tbody>
				<?php 
						$teachers	=	$this->db->get('teacher' )->result_array();
						foreach($teachers as $row):?>
				<tr>
					<td><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" class="img-circle" width="30" /></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['email'];?></td>

				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</section>





