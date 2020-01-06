
					<section class="content-with-menu mailbox">
						<div class="content-with-menu-container" data-mailbox data-mailbox-view="email">
							<div class="inner-menu-toggle">
								<a href="#" class="inner-menu-expand" data-open="inner-menu">
									Show Menu <i class="fa fa-chevron-right"></i>
								</a>
							</div>
							
							<menu id="content-menu" class="inner-menu" role="menu">
								<div class="nano">
									<div class="nano-content">
							
										<div class="inner-menu-toggle-inside">
											<a href="#" class="inner-menu-collapse">
												<i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Menu
											</a>
							
											<a href="#" class="inner-menu-expand" data-open="inner-menu">
												Show Menu <i class="fa fa-chevron-down"></i>
											</a>
										</div>
										<!-- compose new email button -->
										<div class="inner-menu-content">
											<a href="<?php echo base_url(); ?>index.php?admin/message/message_new" class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md">
												<i class="fa fa-envelope mr-xs"></i>
												<?php echo get_phrase('new_message'); ?>
											</a>
											
							
											<!-- message user inbox list -->							
											 <ul class="list-unstyled mt-xl pt-md">							
												<?php
												$current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

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
													?>

														<li>
															<a href="<?php echo base_url(); ?>index.php?admin/message/message_read/<?php echo $row['message_thread_code']; ?>" class="menu-item <?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code']) echo 'active'; ?>">
																<?php echo $this->db->get_where($user_to_show_type, array($user_to_show_type . '_id' => $user_to_show_id))->row()->name; ?>
																<span class="label label-primary text-weight-normal pull-right"> <?php echo $user_to_show_type; ?> </span>
																<?php if ($unread_message_number > 0): ?>
																	<span class="label label-primary text-weight-normal pull-right" style="margin-right: 8px ; background-color: #5A942B">
																		<?php echo $unread_message_number; ?>
																	</span>
																<?php endif; ?>
															 </a>
														</li>
												<?php endforeach; ?>
											</ul>
									
		
										</div>
									</div>
								</div>
							</menu>
							<div class="inner-body mailbox-email ">
							
							 <?php include $message_inner_page_name . '.php'; ?>
							
							</div>
						</div>
					</section>

    