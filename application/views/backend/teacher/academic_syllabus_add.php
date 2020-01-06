
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title" >
                    <i class="fa fa-plus-circle"></i>
                    <?php echo get_phrase('upload_teacher_suggestion'); ?>
                </h4>
            </div>
            <div class="panel-body">

                <?php
                echo form_open(base_url() . 'index.php?teacher/upload_academic_syllabus', array(
                    'class' => 'form-horizontal form-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data'
                ));
                ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?> <span class="required">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="title"
                               required title="<?php echo get_phrase('value_required');?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('class'); ?> <span class="required">*</span></label>
                    <div class="col-sm-7">
                        <select class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="class_id" id="class_id" required title="<?php echo get_phrase('value_required');?>" onchange="return get_class_subject(this.value)">
                            <option value=""><?php echo get_phrase('select'); ?></option>
                            <?php
                            $classes = $this->db->get('class')->result_array();
                            foreach ($classes as $row):
                                ?>

                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('subject'); ?> <span class="required">*</span></label>
                    <div class="col-sm-7">
                        <select name="subject_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>" id="subject_selector_holder">
                            <option value=""><?php echo get_phrase('select_class_first'); ?></option>

                        </select>
                    </div>
                </div>
                
				<div class="form-group">
					<label class="col-md-3 control-label">File Upload <span class="required">*</span></label>
					<div class="col-md-7">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input" style="width: 45%">
									<i class="fa fa-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-default btn-file">
									<span class="fileupload-exists">Change</span>

								<span class="fileupload-new">Select file</span>
								<input type="file" required title=" " name="file_name"/>
								</span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
				</div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">
                            <i class="entypo-upload"></i> <?php echo get_phrase('upload_suggestion'); ?>
                        </button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function get_class_subject(class_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?teacher/get_class_subject/' + class_id,
            success: function (response)
            {
                jQuery('#subject_selector_holder').html(response);
            }
        });

    }

</script>