<div class="row">
	<!-- CALENDAR-->
	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">
					<?php echo get_phrase('event_schedule');?>
				</h2>
			</header>

			<div class="panel-body">
				<div id="notice_calendar"></div>
			</div>
		</section>
	</div>

	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">
										<?php echo get_phrase('teacher');?>
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $this->db->count_all('teacher');?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted">Total teachers</span>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="panel panel-featured-left panel-featured-secondary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-secondary">
									<i class="fa fa-users"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">
										<?php echo get_phrase('student');?>
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $this->db->count_all('student'); ?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted">Total students</span>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="panel panel-featured-left panel-featured-tertiary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-tertiary">
									<i class="glyphicon glyphicon-user"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">
										<?php echo get_phrase('parent');?>
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $this->db->count_all('parent');?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted">Total parents</span>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="panel panel-featured-left panel-featured-quartenary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-quartenary">
									<i class="fa fa-signal"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<?php 
									$check	=	array(	'timestamp' => strtotime(date('Y-m-d')) , 'status' => '1' );
									$query = $this->db->get_where('attendance' , $check);
									$present_today		=	$query->num_rows();
								?>
								<div class="summary">
									<h4 class="title">
										<?php echo get_phrase('attendance');?>
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $present_today;?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted">Total present student today</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

<script>
	$( document ).ready( function () {
		var calendar = $( '#notice_calendar' );
		$( '#notice_calendar' ).fullCalendar( {
			header: {
				left: 'title',
				right: 'prev,today,next'
			},

			//defaultView: 'basicWeek',
			displayEventTime: false,
			editable: false,
			firstDay: 1,
			height: 480,
			droppable: false,

			events: [
				<?php 
					$notices	=	$this->db->get('noticeboard')->result_array();
					foreach($notices as $row):
				?> {
					title: "<?php echo $row['notice_title'];?>",
					start: new Date( <?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?> ),
					end: new Date( <?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?> )
					},
				<?php  endforeach ?>
				]
		} );
	} );
</script>