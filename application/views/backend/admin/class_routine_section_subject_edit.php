	<?php
		$query = $this->db->get_where('section' , array('class_id' => $class_id));
		if($query->num_rows() > 0): 
			$section_id = $this->db->get_where('class_routine' , array('class_routine_id' => $class_routine_id))->row()->section_id;
			$sections   = $query->result_array();
	?>

	<div class="form-group">
		<label class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
		<div class="col-sm-6">
			<select name="section_id" data-plugin-selectTwo required class="form-control populate">
				<option value=""><?php echo get_phrase('select_section');?></option>
				<?php foreach($sections as $section):?>
				<option value="<?php echo $section['section_id'];?>"
					<?php if($section['section_id'] == $section_id) echo 'selected';?>>
						<?php echo $section['name'];?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<?php endif;?>

	<?php
		$subject_id = $this->db->get_where('class_routine' , array('class_routine_id' => $class_routine_id))->row()->subject_id;
	?>
	<div class="form-group">
		<label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
		<div class="col-sm-6">
			<select name="subject_id" data-plugin-selectTwo required class="form-control populate">
				<option value=""><?php echo get_phrase('select_subject');?></option>
				<?php 
					$subjects = $this->db->get_where('subject' , array('class_id' => $class_id))->result_array();
					foreach($subjects as $subject):
				?>
				<option value="<?php echo $subject['subject_id'];?>"
					<?php if($subject['subject_id'] == $subject_id) echo 'selected';?>>
						<?php echo $subject['name'];?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="form-group"> </div>

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

