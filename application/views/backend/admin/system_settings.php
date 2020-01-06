<div class="row" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
    <?php echo form_open(base_url() . 'index.php?admin/system_settings/do_update' , 
      array('class' => 'form-horizontal form-bordered validate'));?>
        <div class="col-md-6">
            
            <div class="panel" >
            
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <?php echo get_phrase('system_settings');?>
                    </h4>
                </div>
                
                <div class="panel-body">
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('system_name');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="system_name" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('system_title');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="system_title" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_title'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="address" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'address'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="phone" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'phone'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('paypal_email');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="paypal_email" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'paypal_email'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('currency');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="currency" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'currency'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label">Footer Text</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="footer_text" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'footer_text'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('system_email');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="system_email" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_email'))->row()->description;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('running_session');?></label>
                      <div class="col-sm-9">
                          <select name="running_year" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
                          <?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
                          <option value=""><?php echo get_phrase('select_running_session');?></option>
                          <?php for($i = 0; $i < 10; $i++):?>
                              <option value="<?php echo (2017+$i);?>-<?php echo (2017+$i+1);?>"
                                <?php if($running_year == (2017+$i).'-'.(2017+$i+1)) echo 'selected';?>>
                                  <?php echo (2017+$i);?>-<?php echo (2017+$i+1);?>
                              </option>
                          <?php endfor;?>
                          </select>
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('language');?></label>
                      <div class="col-sm-9">
                          <select name="language" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
							<?php
								$fields = $this->db->list_fields('language');
								foreach ($fields as $field)
								{
									if ($field == 'phrase_id' || $field == 'phrase')continue;

									$current_default_language	=	$this->db->get_where('settings' , array('type'=>'language'))->row()->description;
									?>
									<option value="<?php echo $field;?>"
										<?php if ($current_default_language == $field)echo 'selected';?>> <?php echo ucfirst($field);?> </option>
								<?php
								}
								?>
                           </select>
                      </div>
                  </div>
                </div>
                
				<footer class="panel-footer">
					<div class="row">
						<div class="col-sm-9 col-sm-offset-3">
						 <button type="submit" class="btn btn-primary"><?php echo get_phrase('save');?></button>
						</div>
					</div>	
				</footer>
                <?php echo form_close();?>
            </div>
        </div>
        

      <?php 
        $skin = $this->db->get_where('settings' , array(
          'type' => 'skin_colour'
        ))->row()->description;
	
        $borders = $this->db->get_where('settings' , array(
          'type' => 'borders_style'
        ))->row()->description;
	
        $header = $this->db->get_where('settings' , array(
          'type' => 'header_colour'
        ))->row()->description;

        $sidebar_colour = $this->db->get_where('settings' , array(
          'type' => 'sidebar_colour'
        ))->row()->description;	
	
        $sidebar_size = $this->db->get_where('settings' , array(
          'type' => 'sidebar_size'
        ))->row()->description;
      ?>
    
   <div class="col-md-6">
            
	   <section class="panel">
		   <?php echo form_open(base_url() . 'index.php?admin/system_settings/change_skin');?>

			<div class="panel-heading">
			   <h4 class="panel-title">
				<?php echo get_phrase('theme_settings');?>
				</h4>
			</div>

			 <div class="panel-body">

				<div class="form-group">
					<div class="row">
						<label class="col-xs-12 control-label" for="zoomcontrol">Background Color</label>
						<div class="col-xs-12">
							<select name="skin_colour" class="form-control mb-md" data-plugin-selectTwo data-plugin-options='{ "minimumResultsForSearch": -1 }' onchange="return get_hidden_on_dark(this.value)">
								<option value="light" <?php if($skin == 'light')echo 'selected';?>>Light</option>
								<option value="dark" <?php if($skin == 'dark')echo 'selected';?>>Dark</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<label class="col-xs-12 control-label" for="zoomcontrol">Borders Style</label>
						<div class="col-xs-12">
							<select name="borders_style" class="form-control mb-md" data-plugin-selectTwo data-plugin-options='{ "minimumResultsForSearch": -1 }'>
								<option value="true" <?php if($borders == 'true')echo 'selected';?>>Rounded</option>
								<option value="false" <?php if($borders == 'false')echo 'selected';?>>Square</option>
							</select>
						</div>
					</div>
				</div>

				<div id="hidden-on-dark">

					<div class="form-group mb-md">
						<div class="row">
							<label class="col-xs-12 control-label" for="zoomcontrol">Header Color</label>
							<div class="col-xs-12">
								<select name="header_colour" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
									<option value="header-light" <?php if($header == 'header-light')echo 'selected';?>>Light</option>
									<option value="header-dark" <?php if($header == 'header-dark')echo 'selected';?>>Dark</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group  mb-md">
						<div class="row">
							<label class="col-xs-12 control-label" for="zoomcontrol">Sidebar Color</label>
							<div class="col-xs-12">
								<select name="sidebar_colour" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
									<option value="sidebar-light" <?php if($sidebar_colour == 'sidebar-light')echo 'selected';?>>Light</option>
									<option value="sidebar-dark" <?php if($sidebar_colour == 'sidebar-dark')echo 'selected';?>>Dark</option>
								</select>
							</div>
						</div>
					</div> 
				</div> 

				<div class="form-group">
					<div class="row">
						<label class="col-xs-12 control-label" for="zoomcontrol">Sidebar Size</label>
						<div class="col-xs-12">
							<select name="sidebar_size" class="form-control mb-md" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
								<option value="sidebar-left-xs" <?php if($sidebar_size == 'sidebar-left-xs')echo 'selected';?>>Small</option>
								<option value="sidebar-left-sm" <?php if($sidebar_size == 'sidebar-left-sm')echo 'selected';?>>Medium</option>
								<option value="sidebar-left-md" <?php if($sidebar_size == 'sidebar-left-md')echo 'selected';?>>Normal</option>
							</select>
						</div>
					</div>
				</div>    
			</div>

				<footer class="panel-footer">
					<center>
					 <button type="submit" class="btn btn-primary"><?php echo get_phrase('update');?></button>
					</center>
				</footer>
			<?php echo form_close();?>   
	   </section>

		  <div class="panel" >
			<?php echo form_open(base_url() . 'index.php?admin/system_settings/upload_logo' , array(
			'class' => 'form-horizontal form-bordered','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

			  <div class="panel-heading">
				  <h4 class="panel-title">
					  <?php echo get_phrase('upload_logo');?>
				  </h4>
			  </div>

			  <div class="panel-body">

				  <div class="form-group">
					  <label class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
					  <div class="col-sm-9">
						  <div class="fileinput fileinput-new" data-provides="fileinput">
							  <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								  <img src="<?php echo base_url();?>uploads/logo.png" alt="...">
							  </div>
							  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							  <div>
								  <span class="btn btn-xs btn-default btn-file">
									  <span class="fileinput-new">Select image</span>
									  <span class="fileinput-exists">Change</span>
									  <input type="file" name="userfile" accept="image/*">
								  </span>
								  <a href="#" class="btn btn-xs btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>

				<footer class="panel-footer">
					<div class="row">
						<div class="col-sm-9 col-sm-offset-3">
						 <button type="submit" class="btn btn-primary"><?php echo get_phrase('upload');?></button>
						</div>
					</div>	
				</footer>
		   <?php echo form_close();?>
		  </div>

        </div>
    </div>
    
    <!--DARK MODE ON HIDDEN-->
	<script type="text/javascript">
		var div = document.getElementById('hidden-on-dark');
		
		if( '<?php echo $skin ?>' == 'dark'){
			div.style.display = 'none';
		} else {
			div.style.display = 'block';
		}
		
		function get_hidden_on_dark( mode_id ) {
		if(mode_id == 'dark'){
				div.style.display = 'none';
			} else {
				div.style.display = 'block';
			}
		}
	</script>
     