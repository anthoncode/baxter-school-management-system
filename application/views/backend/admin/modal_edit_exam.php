<?php 
$edit_data		=	$this->db->get_where('exam' , array('exam_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
       	 <?php echo form_open(base_url() . 'index.php?admin/exam/edit/do_update/'.$row['exam_id'] , array('class' => 'form-horizontal form-bordered validate'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					<?php echo get_phrase('edit_student');?>
            	</h4>
            </div>
			<div class="panel-body">
               
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" required title="<?php echo get_phrase('value_required');?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" data-plugin-datepicker name="date" required title="<?php echo get_phrase('value_required');?>" value="<?php echo $row['date'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="comment" value="<?php echo $row['comment'];?>"/>
                    </div>
                </div>
           
        </div>

		<footer class="panel-footer">
		<div class="row">
		<div class="col-sm-9 col-sm-offset-3">
		<button type="submit" class="btn btn-primary"><?php echo get_phrase('edit_exam');?></button>
		</div>
		</div>
		</footer>
		</form>        
        
    </section>
</div>

<?php
endforeach;
?>





