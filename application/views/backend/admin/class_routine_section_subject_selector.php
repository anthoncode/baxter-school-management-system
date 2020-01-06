<?php
$query = $this->db->get_where( 'section', array( 'class_id' => $class_id ) );
if ( $query->num_rows() > 0 ):
	$sections = $query->result_array();
?>

<div class="form-group">
	<label class="col-sm-3 control-label">
		<?php echo get_phrase('section');?> <span class="required">*</span>
	</label>
	<div class="col-sm-5">
		<select name="section_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required class="form-control populate">
			<?php
			foreach ( $sections as $row ):
				?>
			<option value="<?php echo $row['section_id'];?>"><?php echo $row['name'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">
		<?php echo get_phrase('subject');?> <span class="required">*</span>
	</label>
	<div class="col-sm-5">
		<select name="subject_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required class="form-control populate">
			<?php
			$subjects = $this->db->get_where( 'subject', array( 'class_id' => $class_id ) )->result_array();
			foreach ( $subjects as $row ):
				?>
			<option value="<?php echo $row['subject_id'];?>"><?php echo $row['name'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>
<?php endif;?>

<div class="form-group"></div>

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