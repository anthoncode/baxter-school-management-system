<?php echo form_open(base_url() . 'index.php?admin/change_session' , array('id' => 'session_change'));?>

	<div class="form-group">
		<select name="running_year" class="form-control" onchange="submit()" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
		  	<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
		  	<option value=""><?php echo get_phrase('select_running_session');?></option>
		  	<?php for($i = 0; $i < 10; $i++):?>
		      	<option value="<?php echo (2017+$i);?>-<?php echo (2017+$i+1);?>"<?php if($running_year == (2017+$i).'-'.(2017+$i+1)) echo 'selected';?>><?php echo (2017+$i);?>-<?php echo (2017+$i+1);?></option>
		  <?php endfor;?>
		</select>
	</div>
	
<?php echo form_close();?>

<script type="text/javascript">

    function submit()
    {
    	$('#session_change').submit();
    }
	
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