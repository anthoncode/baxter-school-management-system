<div class="col-md-4">
	<div class="form-group">
	<label class="control-label"><?php echo get_phrase('section');?> <span class="required">*</span></label>
		<select name="section_id" id="section_id" required title="<?php echo get_phrase('value_required');?>" class="form-control mb-sm" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%">
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