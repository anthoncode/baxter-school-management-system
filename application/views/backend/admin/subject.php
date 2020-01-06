<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_subject_add/');" class="btn btn-primary btn-sm">
        <i class="fa fa-plus-circle"></i>
        <?php echo get_phrase('add_subject');?>
        </a>
	</header>
	<div class="panel-body">
	
		<?php
		$query = $this->db->get( 'class' );
		$class = $query->result_array();
		?>

		<div class="form-group">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align:  center;">
				<?php echo get_phrase('class'); ?>
			</label>
			<div class="col-sm-6 col-sm-offset-3">
				<select data-plugin-selectTwo class="form-control populate" name="class_id" onchange="class_section(this.value)" style="width: 100%">
					<option value="">
						<?php echo get_phrase('select_class'); ?>
					</option>
					<?php foreach ($class as $row): ?>
					<option value="<?php echo $row['class_id']; ?>" <?php if ($class_id == $row[ 'class_id']) echo 'selected'; ?> >
						<?php echo $row['name']; ?>
					</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>


		<?php 
        $query = $this->db->get_where('section' , array('class_id' => $class_id));
            if ($query->num_rows() > 0 && $class_id != ''):
                $sections = $query->result_array();
        ?>

		<div class="tabs tabs-primary">
			<!------CONTROL TABS START------>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('subject_list');?>
                    	</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane box active" id="list">
					<table class="table table-bordered table-striped mb-none" id="datatable-tabletools">
						<thead>
							<tr>
								<th>
									<div>
										<?php echo get_phrase('class');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('subject_name');?>
									</div>
								</th>
								<th>
									<div>
										<?php echo get_phrase('teacher');?>
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
							<?php $count = 1;foreach($subjects as $row):?>
							<tr>
								<td>
									<?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?>
								</td>
								<td>
									<?php echo $row['name'];?>
								</td>
								<td>
									<?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?>
								</td>
								<td>

									<!-- EDITING LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('edit');?>" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_subject/<?php echo $row['subject_id'];?>');">
                                      <i class="fa fa-pencil"></i>
                                    </a>
								
									<!-- DELETION LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo get_phrase('delete');?>" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subject/delete/<?php echo $row['subject_id'];?>/<?php echo $class_id;?>');">
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
		<?php endif;?>
	</div>
</section>
                     
<script type="text/javascript">
    function class_section(class_id) {

      window.location.href = '<?php echo base_url(); ?>index.php?admin/subject/' + class_id;

    }
</script>