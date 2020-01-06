<div class="row">
	<div class="col-md-6 col-lg-12 col-xl-6">
		<section class="panel">
		
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
					<h6 style="margin-top: 0"><strong><?php echo get_phrase('earning_graph');?></strong></h6>
						<div class="chart chart-sm" id="flotDashSales1" style="height: 215px;"></div>

						<!-- Flot: Earning Graph -->
						<script>
							var flotDashSales1Data = [{
								data: [
									<?php
									$year = explode( '-', $running_year );
									for ( $month = 1; $month <= 12; $month++ ):
									$totalincome = 0;
									$days = cal_days_in_month( CAL_GREGORIAN, $month, $year[ 0 ] );
									
									for ( $i = 1; $i <= $days; $i++ ) {
										$timestamp = strtotime( $i . '-' . $month . '-' . $year[ 0 ] );
										$this->db->group_by( 'timestamp' );
										$income = $this->db->get_where( 'payment', array('year' => $running_year, 'timestamp' => $timestamp ) )->result_array();

										foreach ( $income as $row ):
										$totalincome = $totalincome + $row[ 'amount' ] ;
										endforeach;
									 } 

									if ( $month == 1 )
										$m = 'Jan';
									else if ( $month == 2 )
										$m = 'Feb';
									else if ( $month == 3 )
										$m = 'Mar';
									else if ( $month == 4 )
										$m = 'Apr';
									else if ( $month == 5 )
										$m = 'May';
									else if ( $month == 6 )
										$m = 'Jun';
									else if ( $month == 7 )
										$m = 'Jul';
									else if ( $month == 8 )
										$m = 'Aug';
									else if ( $month == 9 )
										$m = 'Sep';
									else if ( $month == 10 )
										$m = 'Oct';
									else if ( $month == 11 )
										$m = 'Nov';
									else if ( $month == 12 )
										$m = 'Dec';
									?>

									 ["<?php echo $m ?>", <?php echo $totalincome ?>],

									<?php endfor; ?>
							],
							 color: "#2baab1"
							}];
						 // See: assets/javascripts/dashboard/custom_dashboard.js for more settings.
						</script>

					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-md-6 col-lg-12 col-xl-6">
		<div class="row">
			<div class="col-md-12 col-lg-6 col-xl-6">
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
									<span class="text-muted text-uppercase">Total teachers</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
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
									<span class="text-muted text-uppercase">Total students</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
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
									<span class="text-muted text-uppercase">Total parents</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
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
									<span class="text-muted text-uppercase">Total present student today</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

<div class="row">

    <!-- CALENDAR-->
	<div class="col-md-9">
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
	
	<!--PAID AND DUE CALCULATON-->
	<?php
		$paid = 0;
		$totalpaid = 0;
		$paid = $this->db->get_where( 'payment', array('year' => $running_year) )->result_array();
		foreach ( $paid as $row ):
		$totalpaid = $totalpaid + $row[ 'amount' ] ;
		endforeach;

		$amount = 0;
		$totalamount = 0;
		$amount = $this->db->get_where( 'invoice', array('year' => $running_year) )->result_array();
		foreach ( $amount as $row ):
		$totalamount = $totalamount + $row[ 'amount' ] ;
		endforeach;

		$viewpaid = 0;
		$viewdue = 0;
		if ($totalpaid !== 0 && $totalamount !== 0){
		$viewpaid= ($totalpaid / $totalamount) * 100;
		}
		if ($viewpaid < 1){
			$viewdue = 0;
		}else{
			$viewdue = 100 - $viewpaid;
			if ($viewdue == 0) {$viewdue = .5;}
		}
	?>
	
	<!--liquid meter-->								
	<div class="col-lg-3 text-center">
		<section class="panel panel-featured-left panel-featured-primary">
		<div class="panel-body">
				<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
					<div class="liquid-meter">
					<meter min="0" max="100" value="<?php echo $viewpaid ?>" id="meterSales"></meter>
					</div>
					<div class="liquid-meter-selector" id="meterSalesSel">
					<a href="#" data-val="<?php echo $viewpaid ?>" class="active">Total Paid</a>
					<a href="#" data-val="<?php echo $viewdue ?>">Toatl Due</a>
					</div>
				</div>
				 <!--See: assets/javascripts/dashboard/custom_dashboard.js for more settings.-->
			</div>
		</section>
	</div>
	
	<div class="col-md-3">
		<?php
			$dayincome = $this->db->get_where( 'payment', array('year' => $running_year, 'timestamp' => strtotime(date('Y-m-d')) ) )->result_array();
			$todayincome = 0;
			foreach ( $dayincome as $row ):
			$todayincome = $todayincome + $row[ 'amount' ] ;
			endforeach;
		 ?>
		<section class="panel panel-featured-left panel-featured-primary">
			<div class="panel-body">
				<div class="widget-summary widget-summary-sm">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-primary">
							<i class="fa fa-usd"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title"><?php echo get_phrase('payment');?></h4>
							<div class="info">
								<strong class="amount"><?php echo $todayincome;?></strong>
								<span class="text-primary text-uppercase">Today's Payment</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
   
	<div class="col-md-3">
		<section class="panel panel-featured-left panel-featured-primary">
			<div class="panel-body">
				<div class="widget-summary widget-summary-sm">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-primary">
							<i class="fa fa-hotel"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title"><?php echo get_phrase('dormitory');?></h4>
							<div class="info">
								<strong class="amount"><?php echo $this->db->count_all('dormitory');?></strong>
								<span class="text-primary text-uppercase">Total Hostel</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
	<div class="col-md-3">
		<section class="panel panel-featured-left panel-featured-primary">
			<div class="panel-body">
				<div class="widget-summary widget-summary-sm">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-primary">
							<i class="fa fa-map-marker"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title"><?php echo get_phrase('transport');?></h4>
							<div class="info">
								<strong class="amount"><?php echo $this->db->count_all('transport');?></strong>
								<span class="text-primary text-uppercase">Total Route</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
	
</div>
	

<script>
	//CALENDAR SETTINGS
	$( document ).ready( function () {
		var calendar = $( '#notice_calendar' );
		$( '#notice_calendar' ).fullCalendar( {
			header: {
				left: 'title',
				right: 'prev,today,next'
			},

			//defaultView: 'basicWeek',
			displayEventTime : false,
			editable: false,
			firstDay: 1,
			height: 450,
			droppable: false,

			events: [
				<?php 
				$notices = $this->db->get('noticeboard')->result_array();
				foreach($notices as $row):
				?> {
					title: "<?php echo $row['notice_title'];?>",
					start: new Date( <?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?> ),
					end: new Date( <?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?> )
				},
				<?php 
				  endforeach
				?>
			]
		} );
	} );
</script>

