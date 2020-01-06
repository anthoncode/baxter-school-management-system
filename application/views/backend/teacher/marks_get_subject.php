<div class="col-md-3 mb-sm">
	<div class="form-group">
	<label class="control-label" ><?php echo get_phrase('section');?> <span class="required">*</span></label>
		<select name="section_id" id="section_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
			<?php 
				$sections = $this->db->get_where('section' , array(
					'class_id' => $class_id 
				))->result_array();
				foreach($sections as $row):
			?>
			<option value="<?php echo $row['section_id'];?>"><?php echo $row['name'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>

<div class="col-md-3 mb-sm">
	<div class="form-group">
	<label class="control-label"><?php echo get_phrase('subject');?> <span class="required">*</span></label>
		<select name="subject_id" id="subject_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
			<?php 
				$subjects = $this->db->get_where('subject' , array(
					'class_id' => $class_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
				))->result_array();
				foreach($subjects as $row):
			?>
			<option value="<?php echo $row['subject_id'];?>"><?php echo $row['name'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

	if ( $.isFunction($.fn[ 'select2' ]) ) {

		$(function() {
			$('[data-plugin-selectTwo]').each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginSelect2(opts);
			});
		});

	}
   
    });
    
</script>