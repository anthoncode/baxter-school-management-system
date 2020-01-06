	<div class="mailbox-email-header mb-lg">
		<h3 class="mailbox-email-subject m-none text-weight-light">
			<?php echo get_phrase('messages'); ?>
		</h3>
	</div>

	<?php
	$messages = $this->db->get_where('message', array('message_thread_code' => $current_message_thread_code))->result_array();
	foreach ($messages as $row):

	$sender = explode('-', $row['sender']);
	$sender_account_type = $sender[0];
	$sender_id = $sender[1];
	?>	
			<div class="mailbox-email-container">
				<div class="mailbox-email-screen">
					<div class="panel">
						<div class="panel-heading">
							<div class="panel-actions">
								<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
							</div>

							<p class="panel-title"> 
								<img src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>" class="img-box-boder" width="30">
								<?php echo $this->db->get_where($sender_account_type, array($sender_account_type . '_id' => $sender_id))->row()->name; ?>
							</p>

						</div>
						<div class="panel-body">
							<p> <?php echo $row['message']; ?></p>
						</div>
						<div class="panel-footer">
							<p class="m-none"><small><?php echo date("d M, Y", $row['timestamp']); ?> </small></p>
						</div>
					</div>
				</div>
			</div>

	<?php endforeach; ?>

	<div class="panel">
	 <?php echo form_open(base_url() . 'index.php?admin/message/send_reply/' . $current_message_thread_code, array('enctype' => 'multipart/form-data', 'id' => 'form')); ?>
		<div class="panel-heading">
			<h4 class="panel-title"> 
			 <i class="fa fa-envelope-o mr-xs"></i>
				<?php echo get_phrase('reply_message'); ?>
			</h4>
		</div>

		<div class="panel-body">
			<div class="compose">
				<textarea name="message" class="form-control" placeholder="<?php echo get_phrase('reply_message'); ?>" required title="<?php echo get_phrase('value_required');?>" aria-required="true" rows="10" style="height: 200px;"></textarea>
			</div>
		</div>

		<div class="panel-footer">
			<div class="text-right">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-send mr-xs"></i>
					<span><?php echo get_phrase('send'); ?></span>
				</button>
			</div>
		</div>
	 </form>
	</div>