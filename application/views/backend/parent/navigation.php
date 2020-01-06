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
				<a href="<?php echo base_url(); ?>index.php?parents/dashboard">
					<i class="fa fa-tachometer"></i>
					<span><?php echo get_phrase('dashboard'); ?></span>
				</a>
			</li>


			<!-- TEACHER -->
			<li class="<?php if ($page_name == 'teacher') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?parents/teacher_list">
					<i class="fa fa-users"></i>
					<span><?php echo get_phrase('teacher'); ?></span>
				</a>
			</li>

			<!-- ACADEMIC SYLLABUS -->
			<li class="nav-parent <?php if ($page_name == 'academic_syllabus') echo 'nav-expanded nav-active';?> ">
				<a href="#">
					<i class="fa fa-users"></i>
					<span><?php echo get_phrase('academic_syllabus'); ?></span>
				</a>
				<ul class="nav nav-children">
				<?php 
					$children_of_parent = $this->db->get_where('student' , array(
						'parent_id' => $this->session->userdata('parent_id')
					))->result_array();
					foreach ($children_of_parent as $row):
				?>
					<li class="<?php if ($page_name == 'academic_syllabus' && $student_id == $row['student_id']) echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?parents/academic_syllabus/<?php echo $row['student_id'];?>">
							<span><i class="fa fa-circle-o"></i> <?php echo $row['name'];?></span>
						</a>
					</li>
				<?php endforeach;?>
				</ul>
			</li>

			<!-- CLASS ROUTINE -->
			<li class="nav-parent <?php if ($page_name == 'class_routine') echo 'nav-expanded nav-active';?> ">
				<a href="#">
					<i class="fa fa-clock-o"></i>
					<span><?php echo get_phrase('class_routine'); ?></span>
				</a>
				<ul class="nav nav-children">
				<?php 
					$children_of_parent = $this->db->get_where('student' , array(
						'parent_id' => $this->session->userdata('parent_id')
					))->result_array();
					foreach ($children_of_parent as $row):
				?>
					<li class="<?php if ($page_name == 'class_routine' && $student_id == $row['student_id']) echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?parents/class_routine/<?php echo $row['student_id'];?>">
							<span><i class="fa fa-circle-o"></i> <?php echo $row['name'];?></span>
						</a>
					</li>
				<?php endforeach;?>
				</ul>
			</li>

			<!-- EXAMS -->
			<li class="nav-parent <?php
			if ($page_name == 'marks') echo 'nav-expanded nav-active';?> ">
				<a href="#">
					<i class="fa fa-graduation-cap"></i>
					<span><?php echo get_phrase('exam_marks'); ?></span>
				</a>
				<ul class="nav nav-children">
				<?php 
					foreach ($children_of_parent as $row):
				?>
					<li class="<?php if ($page_name == 'marks' && $student_id == $row['student_id']) echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?parents/marks/<?php echo $row['student_id'];?>">
							<span><i class="fa fa-circle-o"></i> <?php echo $row['name'];?></span>
						</a>
					</li>
				<?php endforeach;?>
				</ul>
			</li>

			<!-- DAILY ATTENDANCE -->
			<li class="nav-parent <?php
			if ($page_name == 'attendance_info') echo 'nav-expanded nav-active';?> ">
				<a href="#">
					 <i class="fa fa-line-chart"></i>
					<span><?php echo get_phrase('daily_attendance'); ?></span>
				</a>
				<ul class="nav nav-children">
				<?php 
					foreach ($children_of_parent as $row):
				?>
					<li class="<?php if ($page_name == 'attendance_info' && $student_id == $row['student_id']) echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?parents/attendance_info/<?php echo $row['student_id'];?>/<?php echo date('m'); ?>">
							<span><i class="fa fa-circle-o"></i> <?php echo $row['name'];?></span>
						</a>
					</li>
				<?php endforeach;?>
				</ul>
			</li>

			<!-- PAYMENT -->
			<li class="nav-parent <?php if ($page_name == 'invoice') echo 'nav-expanded nav-active';?> ">
				<a href="#">
					<i class="fa fa-cc-visa"></i>
					<span><?php echo get_phrase('payment'); ?></span>
				</a>
				<ul class="nav nav-children">
				<?php 
					foreach ($children_of_parent as $row):
				?>
					<li class="<?php if ($page_name == 'invoice' && $student_id == $row['student_id']) echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?parents/invoice/<?php echo $row['student_id'];?>">
							<span><i class="fa fa-circle-o"></i> <?php echo $row['name'];?></span>
						</a>
					</li>
				<?php endforeach;?>
				</ul>
			</li>


			<!-- LIBRARY -->
			<li class="<?php if ($page_name == 'book') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?parents/book">
					<i class="fa fa-fax"></i>
					<span><?php echo get_phrase('library'); ?></span>
				</a>
			</li>

			<!-- TRANSPORT -->
			<li class="<?php if ($page_name == 'transport') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?parents/transport">
					<i class="fa fa-bus"></i>
					<span><?php echo get_phrase('transport'); ?></span>
				</a>
			</li>

			<!-- NOTICEBOARD -->
			<li class="<?php if ($page_name == 'noticeboard') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?parents/noticeboard">
					<i class="fa fa-file-text-o"></i>
					<span><?php echo get_phrase('noticeboard'); ?></span>
				</a>
			</li>

			<!-- MESSAGE -->
			<li class="<?php if ($page_name == 'message') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?parents/message">
					<i class="fa fa-envelope-o"></i>
					<span><?php echo get_phrase('message'); ?></span>
				</a>
			</li>

			<!-- MY PROFILE -->
			<li class="<?php if ($page_name == 'manage_profile') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?parents/manage_profile">
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
