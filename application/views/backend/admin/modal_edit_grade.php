<?php 
$edit_data		=	$this->db->get_where('grade' , array('grade_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('edit_student');?>
            	</h4>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/grade/do_update/'.$row['grade_id'] , array('class' => 'form-horizontal form-bordered validate'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="name" required value="<?php echo $row['name'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('grade_point');?></label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="grade_point" required value="<?php echo $row['grade_point'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('mark_from');?></label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="mark_from" required value="<?php echo $row['mark_from'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('mark_upto');?></label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="mark_upto" required value="<?php echo $row['mark_upto'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="comment" value="<?php echo $row['comment'];?>"/>
                    </div>
                </div>
                  <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-primary"><?php echo get_phrase('edit_grade');?></button>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>



