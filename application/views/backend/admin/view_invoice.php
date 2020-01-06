<?php
	$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param1))->result_array();
	foreach ($edit_data as $row):
?>

<section class="panel">
	<div class="panel-body"  id="invoice_print" >
		<div class="invoice">
			<header class="clearfix">
				<div class="row">
					<div class="col-sm-6 mt-md">
						<h2 class="h2 mt-none mb-sm text-dark text-weight-bold">INVOICE</h2>
						<h4 class="h4 m-none text-dark text-weight-bold">#<?php echo($param1) ?></h4>
					</div>
					<div class="col-sm-6 text-right mt-md mb-md">
						<address class="ib mr-xlg">
							<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br/>
							<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br/>
							<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br/> 
							<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?>   
						</address>
						<div class="ib">
							<img src="assets/images/invoice-logo.png" alt="Baxter School" />
						</div>
					</div>
				</div>
			</header>
			
			<div class="bill-info">
				<div class="row">
					<div class="col-md-6">
						<div class="bill-to">
							<p class="h5 mb-xs text-dark text-weight-semibold">To:</p>
							<address>
								<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br>
								<?php 
									$roll = $this->db->get_where('enroll' , array(
										'student_id' => $row['student_id'],
											'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
									))->row()->roll;
									echo get_phrase('Roll') . ' : ' . $roll;
								?><br>
								<?php 
									$class_id = $this->db->get_where('enroll' , array(
										'student_id' => $row['student_id'],
											'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
									))->row()->class_id;
									echo get_phrase('class') . ' : ' . $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
								?><br>
								<?php echo get_phrase('Email') . ' : ' . $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->email; ?>
							</address>
						</div>
					</div>

					<div class="col-md-6">
						<div class="bill-data text-right">
							<p class="mb-none">
								<span class="text-dark"><?php echo get_phrase('creation_date'); ?> : </span>
								<span><?php echo date('d M,Y', $row['creation_timestamp']);?></span>
							</p>
							<p class="mb-none">
								<span class="text-dark"><?php echo get_phrase('title'); ?> : </span>
								<span><?php echo $row['title'];?></span>
							</p>
							<p class="mb-none">
								<span class="text-dark"><?php echo get_phrase('description'); ?> : </span>
								<span><?php echo $row['description'];?></span>
							</p>
							<p class="mb-none">
								<span class="text-dark"><?php echo get_phrase('status'); ?> : </span>
								<?php if($row['status'] == "paid"):?>
									<span class=" btn btn-success btn-xs"><?php echo $row['status'];?></span>
								<?php endif;?>
								<?php if($row['status'] == "unpaid"):?>
									<span class=" btn btn-danger btn-xs"><?php echo $row['status'];?></span>
								<?php endif;?>
							</p>
						</div>
					</div>

				</div>
			</div>

			<!-- payment history -->
			<div class="table-responsive">
				<table class="table invoice-items">
					<thead>
						<tr class="h4 text-dark">
							<th id="cell-id"     class="text-weight-semibold">#</th>
							<th id="cell-item"   class="text-weight-semibold"><?php echo get_phrase('date'); ?></th>
							<th id="cell-desc"   class="text-weight-semibold"><?php echo get_phrase('method'); ?></th>
							<th id="cell-price"  class="text-center text-weight-semibold"><?php echo get_phrase('amount'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						$payment_history = $this->db->get_where('payment', array('invoice_id' => $row['invoice_id']))->result_array();
						foreach ($payment_history as $row2):
						?>
						<tr>
							<td><?php echo $count++;?></td>
							<td class="text-weight-semibold text-dark"><?php echo date("d M, Y", $row2['timestamp']); ?></td>
							<td>
							<?php 
								if ($row2['method'] == 1)
									echo get_phrase('cash');
								if ($row2['method'] == 2)
									echo get_phrase('check');
								if ($row2['method'] == 3)
									echo get_phrase('card');
								if ($row2['method'] == 'paypal')
									echo 'paypal';
							?>
							</td>
							<td class="text-center"><?php echo $row2['amount']; ?></td>
						</tr>

						 <?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<div class="invoice-summary">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-8">
						<table class="table h5 text-dark">
							<tbody>
								<tr class="b-top-none">
									<td colspan="2"><?php echo get_phrase('total_amount'); ?></td>
									<td class="text-left"><?php echo $row['amount']; ?></td>
								</tr>
								<tr>
									<td colspan="2"><?php echo get_phrase('paid_amount'); ?></td>
									<td class="text-left"><?php echo $row['amount_paid']; ?></td>
								</tr>
								<tr class="h4">
									<td colspan="2"><?php echo get_phrase('due'); ?></td>
									<td class="text-left"><?php echo $row['due']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		<footer class="panel-footer">
			<div class="text-right mr-lg">
				<a href="#" onClick="PrintElem('#invoice_print')" class="btn btn-primary ml-sm"><i class="glyphicon glyphicon-print"></i> Print Invoice</a>
			</div>
		</footer>
		
</section>			
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }
	
    function Popup(data)
    {
        var mywindow = window.open();
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
    }

</script>