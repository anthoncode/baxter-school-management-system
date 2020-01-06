<!-- start: header -->
<header class="header">
	<div class="logo-container">
		<a href="<?php echo base_url();?>index.php?admin/dashboard" class="logo">
			<img src="uploads/logo.png" height="40" />
		</a>
		<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<!-- start: search & user box -->
	<div class="header-right">
		<!--SESSION CHANGER-->
		<form action="pages-search-results.html" class="search nav-form">
			<div class="input-group input-search">
				<div id="session_static">
					<a href="#" style="color: #696969;"
						<?php if($account_type == 'admin'):?> onclick="get_session_changer()" <?php endif;?>>
						<?php echo get_phrase('running_session');?> : <?php echo $running_year;?>
					</a>
				</div>
			</div>
		</form>

		<span class="separator"></span>

		<ul class="notifications">

			<!-- Message Notifications -->
			<?php
			 $total_unread_message_number = 0;
			 $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

			 $this->db->where('sender', $current_user);
			 $this->db->or_where('reciever', $current_user);
			 $message_threads = $this->db->get('message_thread')->result_array();
			 foreach ($message_threads as $row){
				$unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']); 
				$total_unread_message_number += $unread_message_number;
			 }
			 ?>

			<li>
				<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
					<i class="fa fa-envelope"></i>
					<?php if ($total_unread_message_number > 0): ?>
					<span class="badge"><?php echo $total_unread_message_number; ?></span>
					<?php endif; ?>
				</a>

				<div class="dropdown-menu notification-menu" style="min-width: 290px;">
					<div class="notification-title">
						Messages
					</div>

					<div class="content">

						<ul>

							<?php
							$current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

							if($account_type  == 'parent'){
								$loger_message = 'parents';
							} else {
								$loger_message = $this->session->userdata('login_type');												
							}

							$this->db->where('sender', $current_user);
							$this->db->or_where('reciever', $current_user);
							$message_threads = $this->db->get('message_thread')->result_array();
							foreach ($message_threads as $row):

								// defining the user to show
								if ($row['sender'] == $current_user)
									$user_to_show = explode('-', $row['reciever']);
								if ($row['reciever'] == $current_user)
									$user_to_show = explode('-', $row['sender']);
								$user_to_show_type = $user_to_show[0];
								$user_to_show_id = $user_to_show[1];
								$unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
								if ($unread_message_number == 0)
									continue;

								// the last sent message from the opponent user
								$this->db->order_by('timestamp', 'desc');
								$last_message_row = $this->db->get_where('message', array('message_thread_code' => $row['message_thread_code']))->row();
								$last_unread_message = $last_message_row->message;
								$last_message_timestamp = $last_message_row->timestamp;
								?>

							<li>
								<a href="<?php echo base_url(); ?>index.php?<?php echo $loger_message; ?>/message/message_read/<?php echo $row['message_thread_code']; ?>" class="clearfix">
									<!-- preview of sender image -->
									<figure class="image">
										<img src="<?php echo $this->crud_model->get_image_url($user_to_show_type, $user_to_show_id); ?>" height="30" class="img-box-boder" />
									</figure>

									<!-- preview of sender name and date -->
									<span class="title line"><strong><?php echo $this->db->get_where($user_to_show_type, array($user_to_show_type . '_id' => $user_to_show_id))->row()->name; ?></strong>
									<small>- <?php echo date("d M, Y", $last_message_timestamp); ?></small>  </span>

									 <!-- preview of the last unread message substring -->
									<span class="message"><?php echo substr($last_unread_message, 0, 50); ?></span>
								</a>
							</li>
							<?php endforeach; ?>
						</ul>

						<hr />

						<div class="text-right">
							<a href="<?php echo base_url(); ?>index.php?<?php echo $loger_message; ?>/message" class="view-more">View All</a>
						</div>
					</div>
				</div>
			</li>
		</ul>

		<span class="separator"></span>

		<div id="userbox" class="userbox">
			<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
					<img src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type') , $this->session->userdata($account_type.'_id'));?>" alt="user-image" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
				</figure>
				<div class="profile-info" data-lock-name="<?php echo $this->session->userdata('name');?>" data-lock-email="info@pvssystem.com">
					<span class="name"><?php echo $this->session->userdata('name');?></span>
					<span class="role"><?php echo ucfirst($this->session->userdata('login_type'));?></span>
				</div>

				<i class="fa custom-caret"></i>
			</a>

			<div class="dropdown-menu">
				<ul class="list-unstyled">
					<li class="divider"></li>
					<!-- goto setting -->
					<?php if($account_type == 'admin'):?>
					<li>
						<a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/system_settings"><i class="fa fa-wrench"></i> <?php echo get_phrase('setting');?></a>
					</li>
					<?php endif;?>
					<!-- goto profile -->
					<li>
						<a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile"><i class="fa fa-user"></i> <?php echo get_phrase('edit_profile');?></a>
					</li>
					<li>
						<a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php?login/logout"><i class="fa fa-power-off"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
</header>
<!-- end: header -->

<script type="text/javascript">
	function get_session_changer()
	{
		$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_session_changer/',
            success: function(response)
            {
                jQuery('#session_static').html(response);
            }
        });
	}
</script>
