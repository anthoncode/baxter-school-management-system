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
				<a href="<?php echo base_url(); ?>index.php?admin/dashboard">
					<i class="fa fa-tachometer"></i>
					<span><?php echo get_phrase('dashboard'); ?></span>
				</a>
			</li>

			<!-- STUDENT -->
			<li class="<?php if ($page_name == 'student_information' || $page_name == 'student_marksheet' || $page_name == 'student_bulk_add' || $page_name == 'student_add' ) echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/student_information">
					 <i class="fa fa-slideshare"></i>
					<span><?php echo get_phrase('student'); ?></span>
				</a>
			</li>

			<!-- STUDENT PROMOTION -->
			<li class="<?php if ( $page_name == 'student_promotion') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/student_promotion">
					 <i class="fa fa-random"></i>
					<span><?php echo get_phrase('student_promotion'); ?></span>
				</a>
			</li>

			<!-- TEACHER -->
			<li class="<?php if ($page_name == 'teacher') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/teacher">
					<i class="fa fa-users"></i>
					<span><?php echo get_phrase('teacher'); ?></span>
				</a>
			</li>

			<!-- PARENTS -->
			<li class="<?php if ($page_name == 'parent') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/parent">
					<i class="fa fa-user"></i>
					<span><?php echo get_phrase('parents'); ?></span>
				</a>
			</li>

			<!-- CLASS -->
			<li class="nav-parent <?php
			if ($page_name == 'class' ||
					$page_name == 'section')
				echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-university"></i>
					<span><?php echo get_phrase('class'); ?></span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'class') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/classes">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('manage_classes'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'section') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/section">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('manage_sections'); ?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- TEACHER SUGGESTION -->
			<li class="<?php if ($page_name == 'teacher_suggestion') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?admin/teacher_suggestion">
					 <i class="fa fa-download"></i>
					 <span><?php echo get_phrase('teacher_suggestion'); ?></span>
				 </a>
			</li>

		   <!-- SUBJECT -->
			<li class="<?php if ($page_name == 'subject') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?admin/subject">
					  <i class="fa fa-book"></i>
					 <span><?php echo get_phrase('subject'); ?></span>
				 </a>
			</li>

			<!-- CLASS ROUTINE -->
			<li class="<?php if ($page_name == 'class_routine_view' || $page_name == 'class_routine_add') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?admin/class_routine_view">
					<i class="fa fa-clock-o"></i>
					<span><?php echo get_phrase('class_routine'); ?></span>
				 </a>
			</li>

			<!-- DAILY ATTENDANCE -->
			<li class="nav-parent <?php if ($page_name == 'manage_attendance' ||
									$page_name == 'manage_attendance_view' || $page_name == 'attendance_report' || $page_name == 'attendance_report_view') 
										echo 'nav-expanded nav-active'; ?> ">
				<a href="#">
					<i class="fa fa-line-chart"></i>
					<span><?php echo get_phrase('daily_attendance'); ?></span>
				</a>
				<ul class="nav nav-children">

						<li class="<?php if (($page_name == 'manage_attendance' || $page_name == 'manage_attendance_view')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/manage_attendance">
								<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('daily_atendance'); ?></span>
							</a>
						</li>

						<li class="<?php if (( $page_name == 'attendance_report' || $page_name == 'attendance_report_view')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/attendance_report">
								<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('attendance_report'); ?></span>
							</a>
						</li>

				</ul>
			</li>

			<!-- EXAMS -->
			<li class="nav-parent <?php
			if ($page_name == 'exam' ||
					$page_name == 'grade' ||
					$page_name == 'marks_manage' ||
						$page_name == 'exam_marks_sms' ||
							$page_name == 'tabulation_sheet' ||
								$page_name == 'marks_manage_view')
									echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-graduation-cap"></i>
					<span><?php echo get_phrase('exam'); ?></span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'exam') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/exam">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('exam_list'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'grade') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/grade">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('exam_grades'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'marks_manage' || $page_name == 'marks_manage_view') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/marks_manage">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('manage_marks'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'exam_marks_sms') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/exam_marks_sms">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('send_marks_by_sms'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'tabulation_sheet') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/tabulation_sheet">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('tabulation_sheet'); ?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- LIBRARY -->
			<li class="<?php if ($page_name == 'book') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/book">
					<i class="fa fa-fax"></i>
					<span><?php echo get_phrase('library'); ?></span>
				</a>
			</li>

			<!-- TRANSPORT -->
			<li class="<?php if ($page_name == 'transport') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/transport">
					<i class="fa fa-bus"></i>
					<span><?php echo get_phrase('transport'); ?></span>
				</a>
			</li>

			<!-- DORMITORY -->
			<li class="<?php if ($page_name == 'dormitory') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/dormitory">
					<i class="fa fa-sitemap"></i>
					<span><?php echo get_phrase('dormitory'); ?></span>
				</a>
			</li>

		   <!-- ACCOUNTING -->
			<li class="nav-parent <?php
			if ($page_name == 'income' ||
					$page_name == 'expense' ||
						$page_name == 'expense_category' ||
							$page_name == 'student_payment')
								echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-cc-visa"></i>
					<span><?php echo get_phrase('accounting'); ?></span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'student_payment') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/student_payment">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('create_student_payment'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'income') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/income">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('student_payments'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'expense') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/expense">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('expense'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'expense_category') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/expense_category">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('expense_category'); ?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- NOTICEBOARD -->
			<li class="<?php if ($page_name == 'noticeboard') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/noticeboard">
					<i class="fa fa-file-text-o"></i>
					<span><?php echo get_phrase('noticeboard'); ?></span>
				</a>
			</li>

			<!-- MESSAGE -->
			<li class="<?php if ($page_name == 'message') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/message">
					<i class="fa fa-envelope-o"></i>
					<span><?php echo get_phrase('message'); ?></span>
				</a>
			</li>

			<!-- SETTINGS -->
			<li class="nav-parent <?php
			if ($page_name == 'system_settings' ||
					$page_name == 'manage_language' ||
						$page_name == 'sms_settings')
							echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-suitcase"></i>
					<span><?php echo get_phrase('settings'); ?></span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'system_settings') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/system_settings">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('general_settings'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'sms_settings') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/sms_settings">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('sms_settings'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'manage_language') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/manage_language">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('language_settings'); ?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- ACCOUNT -->
			<li class="<?php if ($page_name == 'manage_profile') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/manage_profile">
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


