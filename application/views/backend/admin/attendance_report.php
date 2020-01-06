<section class="panel">
<?php echo form_open(base_url() . 'index.php?admin/attendance_report_selector/', array('id' => 'form')); ?>
<div class="panel-body">
<div class="row">

    <?php
    $query = $this->db->get('class');
        $class = $query->result_array();
    ?>

        <div class="col-md-4 mb-sm">
            <div class="form-group">
                <label class="control-label"><?php echo get_phrase('class'); ?> <span class="required">*</span></label>
                <select class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="class_id" onchange="select_section(this.value)">
                    <option value=""><?php echo get_phrase('select_class'); ?></option>
                    <?php foreach ($class as $row): ?>
                    <option value="<?php echo $row['class_id']; ?>" ><?php echo $row['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
 
    <div id="section_holder">
        <div class="col-md-4 mb-sm">
            <div class="form-group">
                <label class="control-label"><?php echo get_phrase('section'); ?> <span class="required">*</span></label>
                <select class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="section_id">
                    <option value=""><?php echo get_phrase('select_class_first') ?></option>

                </select>
            </div>
        </div>
    </div>
	
    <div class="col-md-4 mb-sm">
         <div class="form-group">
                <label class="control-label"><?php echo get_phrase('section'); ?> <span class="required">*</span></label>
        <select name="month" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" id="month" >
            <?php
            for ($i = 1; $i <= 12; $i++):
                if ($i == 1)
                    $m = 'January';
                else if ($i == 2)
                    $m = 'February';
                else if ($i == 3)
                    $m = 'March';
                else if ($i == 4)
                    $m = 'April';
                else if ($i == 5)
                    $m = 'May';
                else if ($i == 6)
                    $m = 'June';
                else if ($i == 7)
                    $m = 'July';
                else if ($i == 8)
                    $m = 'August';
                else if ($i == 9)
                    $m = 'September';
                else if ($i == 10)
                    $m = 'October';
                else if ($i == 11)
                    $m = 'November';
                else if ($i == 12)
                    $m = 'December';
                ?>
                <option value="<?php echo $i; ?>" <?php if($month == $i) echo 'selected'; ?>  ><?php echo $m; ?></option>
                <?php
            endfor;
            ?>
        </select>
         </div>
    </div>
	
    <input type="hidden" name="operation" value="selection">
    <input type="hidden" name="year" value="<?php echo $running_year;?>">

</div>

</div>
    <div class="panel-footer">
        <center>
        <button type="submit" class="btn btn-primary"><?php echo get_phrase('show_report');?></button>
        </center>
    </div>
    <?php echo form_close(); ?>
</section>

<script type="text/javascript">
    function select_section(class_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_section/' + class_id,
            success: function (response)
            {

                jQuery('#section_holder').html(response);
            }
        });
    }
</script>