<?php
   $edit_data = $this->db->get_where( 'subject', array( 'subject_id' => $param2 ) )->result_array();
   foreach ( $edit_data as $row ):
?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<?php echo form_open(base_url() . 'index.php?admin/subject/do_update/'.$row['subject_id'] , array('class' => 'form-horizontal form-bordered', 'id' => 'form', 'target'=>'_top'));?>
				<div class="panel-heading">
					<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					<?php echo get_phrase('edit_subject');?>
            	</h4>
				
				</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('name');?>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" required name="name" value="<?php echo $row['name'];?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('class');?>
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo name="class_id" required class="form-control populate" style="width: 100%">
							<?php $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
								<option value="<?php echo $row2['class_id'];?>" <?php if($row[ 'class_id'] == $row2[ 'class_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?php echo get_phrase('teacher');?>
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo name="teacher_id" class="form-control populate" style="width: 100%">
								<option value=""></option>
							<?php $teachers = $this->db->get('teacher')->result_array();
                            foreach($teachers as $row2):
                            ?>
								<option value="<?php echo $row2['teacher_id'];?>" <?php if($row[ 'teacher_id'] == $row2[ 'teacher_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>

				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary">
								<?php echo get_phrase('edit_subject');?>
							</button>
						</div>
					</div>
				</footer>
				</form>
			</section>
		</div>
	</div>

<?php
  endforeach;
?>