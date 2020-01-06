<?php $class_info = $this->db->get('class')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?php echo get_phrase('add_study_material'); ?>
                </h4>
            </div>

            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?teacher/study_material/create', array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?> <span class="required">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" name="timestamp" class="form-control" data-plugin-datepicker data-plugin-options='{ "format": "D, dd MM yyyy"}' required title="<?php echo get_phrase('value_required');?>"
                               placeholder="<?php echo get_phrase('select_date'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?> <span class="required">*</span></label>

                    <div class="col-sm-7">
                        <input type="text" name="title" class="form-control" id="field-1" required title="<?php echo get_phrase('value_required');?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                    <div class="col-sm-7">
                        <textarea name="description" class="form-control" id="field-ta" ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('class'); ?> <span class="required">*</span></label>

                    <div class="col-sm-7">
                        <select name="class_id" class="form-control" id="class_id" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" onchange="return get_class_subject(this.value)" required title="<?php echo get_phrase('value_required');?>">
                            <option value=""><?php echo get_phrase('select'); ?></option>
                            <?php foreach ($class_info as $row) { ?>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('subject'); ?> <span class="required">*</span></label>
                    <div class="col-sm-7">
                        <select name="subject_id" class="form-control" id="subject_selector_holder" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>">
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
                    <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('file_type'); ?> <span class="required">*</span></label>

                    <div class="col-sm-7">
                        <select name="file_type" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="<?php echo get_phrase('value_required');?>">
                            <option value=""><?php echo get_phrase('select_file_type'); ?></option>
                            <option value="image"><?php echo get_phrase('image'); ?></option>
                            <option value="doc"><?php echo get_phrase('doc'); ?></option>
                            <option value="pdf"><?php echo get_phrase('pdf'); ?></option>
                            <option value="excel"><?php echo get_phrase('excel'); ?></option>
                            <option value="other"><?php echo get_phrase('other'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3 control-label col-sm-offset-2">
                    <button type="submit" class="btn btn-success"><?php echo get_phrase('upload'); ?></button>
                </div>
                </form>

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