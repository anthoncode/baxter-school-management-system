<section class="panel">
	<?php echo form_open(base_url() . 'index.php?admin/student_bulk_add/add_bulk_student' , 
				array('class' => 'form-inline', 'id' => 'summary-form', 'style' => 'text-align:center;'));?>
<div class="panel-body">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3">
			<div class="form_group">
				<label class="control-label mb-xs"><?php echo get_phrase('class');?> <span class="required">*</span></label>
				<select name="class_id" id="class_id" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'
					onchange="get_sections(this.value)">
					<option value=""><?php echo get_phrase('select_class');?></option>
					<?php
						$classes = $this->db->get('class')->result_array();
						foreach($classes as $row):
					?>
					<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>

		 <div class="col-md-3">
		  <div class="form_group">
		  <label class="control-label mb-xs"><?php echo get_phrase('section');?> <span class="required">*</span></label>
			<select name="section_id" id="section_id" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
				<option value=""><?php echo get_phrase('select_class_first') ?></option>
			</select>
		  </div>
		 </div>


	</div>
	<br><br>


	<div id="bulk_add_form">
	<div id="student_entry">
	<div class="row mb-sm">

		<div class="form-group mr-xs">
			<input type="text" name="name[]" id="name" class="form-control" style="width: 140px"
				placeholder="<?php echo get_phrase('name');?>" required>
		</div>

		<div class="form-group mr-xs">
			<input type="email" name="email[]" id="email" class="form-control" style="width: 160px"
				placeholder="<?php echo get_phrase('email');?>" required>
		</div>

		<div class="form-group mr-xs">
			<input type="password" name="password[]" id="password" class="form-control" style="width: 120px"
				placeholder="<?php echo get_phrase('password');?>" required>
		</div>

		<div class="form-group mr-xs">
			<input type="text" name="roll[]" id="roll" class="form-control" style="width: 60px"
				placeholder="<?php echo get_phrase('roll');?>">
		</div>
	
		<div class="form-group mr-xs">
			<input type="text" name="phone[]" id="phone" class="form-control" style="width: 140px"
				placeholder="<?php echo get_phrase('phone');?>">
		</div>

		<div class="form-group mr-xs">
			<input type="text" name="address[]" id="address" class="form-control" style="width: 170px"
				placeholder="<?php echo get_phrase('address');?>">
		</div>

		<div class="form-group mr-xs">
			<select name="sex[]" id="sex" class="form-control">
				<option value=""><?php echo get_phrase('gender');?></option>
				<option value="male"><?php echo get_phrase('male');?></option>
				<option value="female"><?php echo get_phrase('female');?></option>
			</select>
		</div>

		<div class="form-group">
			<button type="button" class="mr-xs btn btn-default" title="<?php echo get_phrase('remove');?>"
					onclick="deleteParentElement(this)" >
        		<i class="fa fa-trash" style="color: #696969;"></i>
        	</button>
		</div>
	</div>
</div>

    <div id="student_entry_append"></div>

</div>
</div>

	<footer class="panel-footer">
		<button type="button" class="mr-xs btn btn-warning" onclick="append_student_entry()">
			<i class="fa fa-plus"></i> <?php echo get_phrase('add_a_row');?>
		</button>
				<button type="submit" class="btn btn-primary" id="submit_button">
			<i class="fa fa-check"></i> <?php echo get_phrase('save_students');?>
		</button>							
	</footer>
<?php echo form_close();?>
</section>	



<script type="text/javascript">

	var blank_student_entry ='';
	$(document).ready(function() {
		//$('#bulk_add_form').hide(); 
		blank_student_entry = $('#student_entry').html();

		for ($i = 0; $i<7;$i++) {
			$("#student_entry").append(blank_student_entry);
		}
		
	});

	function get_sections(class_id) {
		$.ajax( {
			url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id,
			success: function ( response ) {
				jQuery( '#section_id' ).html( response );
			}
		} );
	}


	function append_student_entry()
	{
		$("#student_entry_append").append(blank_student_entry);
	}

	// REMOVING INVOICE ENTRY
	function deleteParentElement(n)
	{
		n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
	}

    // CLASS SELECT REQUIRED CHECK
    $( "form" ).submit(function( event ) {

        var receiver = $('#class_id').val();
        if(receiver == ''){

	new PNotify({
		title: 'Error',
		text: '<?php echo get_phrase('select_class_first'); ?>',
		shadow: true,
		type: 'error',
		buttons: {
		sticker: false
		}
		});
        event.preventDefault();
        } else {
            return true;
        }  
      
    });

</script>

