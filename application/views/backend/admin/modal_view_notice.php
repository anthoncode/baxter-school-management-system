<?php
$edit_data = $this->db->get_where('noticeboard', array('notice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>

    <div class="row" id="notice_print">
            <div class="col-md-12">
                <section class="panel panel-border" >
                       	<header class="panel-heading">
                       	<div class="text-right mr-lg">
							<a onClick="PrintElem('#notice_print')" class="btn btn-primary btn-sm">
								<i class="glyphicon glyphicon-print"></i>
								<span>Print Notice</span>
							</a>
							</div>
						</header>
                    <div class="panel-body">
                        <b>Title</b>
                        <p><?php echo $row['notice_title']; ?></p>
                        <b>Notice</b>
                        <p><?php echo $row['notice'] ?></p>
                        <b>Date</b>
                        <p><?php echo date('d M Y',$row['create_timestamp']) ?></p>
                    </div>
                    
                </section>
            </div>
    </div>
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'notice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Notice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/stylesheets/theme.css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>

