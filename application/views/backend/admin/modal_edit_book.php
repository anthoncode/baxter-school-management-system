<?php 
$edit_data		=	$this->db->get_where('book' , array('book_id' => $param2) )->result_array();
?>

 <div class="col-md-12">
        <section class="panel">
           <?php echo form_open(base_url() . 'index.php?admin/book/do_update/'.$row['book_id'] , array('class' => 'form-horizontal form-bordered validate'));?>
            <div class="panel-heading">
                <h4 class="panel-title" >
                    <i class="fa fa-pencil-square"></i>
                    <?php echo get_phrase('edit_book');?>
                </h4>
            </div>
       <div class="panel-body">

        <?php foreach($edit_data as $row):?>
        
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"
                            required  title="<?php echo get_phrase('value_required');?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('author');?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="author" value="<?php echo $row['author'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('price');?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-7">
                        <select name="class_id" class="form-control" required  title="<?php echo get_phrase('value_required');?>" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>"<?php if($row['class_id']==$row2['class_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-7">
                        <select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                            <option value="available" <?php if($row['status']=='available')echo 'selected';?>><?php echo get_phrase('available');?></option>
                            <option value="unavailable" <?php if($row['status']=='unavailable')echo 'selected';?>><?php echo get_phrase('unavailable');?></option>
                        </select>
                    </div>
                </div>
       
        <?php endforeach;?>
    </div>
    
		<footer class="panel-footer">
			<div class="row">
			<div class="col-sm-9 col-sm-offset-3">
			<button type="submit" class="btn btn-primary"><?php echo get_phrase('edit_book');?></button>
			</div>
			</div>
		</footer>
   
    </form>
    
   </section>
</div>
