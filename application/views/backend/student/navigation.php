<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
				
	 <div class="sidebar-header">
		<div class="sidebar-title">
			Navigation
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">

			<!-- DASHBOARD -->
			<li class="<?php if ($page_name == 'dashboard') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/dashboard">
					<i class="fa fa-tachometer"></i>
					<span><?php echo get_phrase('dashboard'); ?></span>
				</a>
			</li>


			<!-- TEACHER -->
			<li class="<?php if ($page_name == 'teacher') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/teacher_list">
					<i class="fa fa-users"></i>
					<span><?php echo get_phrase('teacher'); ?></span>
				</a>
			</li>


			<!-- SUBJECT -->
			<li class="<?php if ($page_name == 'subject') echo ' nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/subject">
					<i class="fa fa-book"></i>
					<span><?php echo get_phrase('subject'); ?></span>
				</a>
			</li>

			<!-- CLASS ROUTINE -->
			<li class="<?php if ($page_name == 'class_routine') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/class_routine">
					<i class="fa fa-clock-o"></i>
					<span><?php echo get_phrase('class_routine'); ?></span>
				</a>
			</li>

			<!-- STUDY MATERIAL -->
			<li class="<?php if ($page_name == 'study_material') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/study_material">
					<i class="glyphicon glyphicon-screenshot"></i>
					<span><?php echo get_phrase('study_material'); ?></span>
				</a>
			</li>

			<!-- ACADEMIC SYLLABUS -->
			<li class="<?php if ($page_name == 'academic_syllabus') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?student/academic_syllabus/<?php echo $this->session->userdata('login_user_id');?>">
					<i class="fa fa-download"></i>
					<span><?php echo get_phrase('academic_syllabus'); ?></span>
				</a>
			</li>

			<!-- Exam marks -->
			<li class="<?php if ($page_name == 'student_marksheet') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/student_marksheet/<?php echo $this->session->userdata('login_user_id');?>">
					<i class="fa fa-graduation-cap"></i>
					<span><?php echo get_phrase('exam_marks'); ?></span>
				</a>
			</li>

			<!-- PAYMENT -->
			<li class="<?php if ($page_name == 'invoice') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/invoice">
					<i class="fa fa-cc-visa"></i>
					<span><?php echo get_phrase('payment'); ?></span>
				</a>
			</li>


			<!-- LIBRARY -->
			<li class="<?php if ($page_name == 'book') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/book">
					<i class="fa fa-fax"></i>
					<span><?php echo get_phrase('library'); ?></span>
				</a>
			</li>

			<!-- TRANSPORT -->
			<li class="<?php if ($page_name == 'transport') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/transport">
					<i class="fa fa-bus"></i>
					<span><?php echo get_phrase('transport'); ?></span>
				</a>
			</li>

			<!-- NOTICEBOARD -->
			<li class="<?php if ($page_name == 'noticeboard') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/noticeboard">
					<i class="fa fa-file-text-o"></i>
					<span><?php echo get_phrase('noticeboard'); ?></span>
				</a>
			</li>

			<!-- MESSAGE -->
			<li class="<?php if ($page_name == 'message') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/message">
					<i class="fa fa-envelope-o"></i>
					<span><?php echo get_phrase('message'); ?></span>
				</a>
			</li>

			<!-- ACCOUNT -->
			<li class="<?php if ($page_name == 'manage_profile') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/manage_profile">
					<i class="fa fa-lock"></i>
					<span><?php echo get_phrase('my_profile'); ?></span>
				</a>
			</li>

		</ul>
	 </nav>

	</div>

		<script>
			// Maintain Scroll Position
			if (typeof localStorage !== 'undefined') {
				if (localStorage.getItem('sidebar-left-position') !== null) {
					var initialPosition = localStorage.getItem('sidebar-left-position'),
						sidebarLeft = document.querySelector('#sidebar-left .nano-content');

					sidebarLeft.scrollTop = initialPosition;
				}
			}
		</script>

	</div>		
</aside>
<!-- end: sidebar -->