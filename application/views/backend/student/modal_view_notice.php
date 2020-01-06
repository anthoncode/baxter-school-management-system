<?php
$edit_data = $this->db->get_where('noticeboard', array('notice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
<center>
    <a onClick="PrintElem('#notice_print')" class="btn btn-default pull-right">
        Print Notice
        <i class="glyphicon glyphicon-print"></i>
    </a>
    
   
</center>

    <br><br>

    <div class="row" id="notice_print">
            <div class="col-md-12">

                <div class="panel">
                        
                    <div class="panel-body">
                        <b>Title</b>
                        <p><?php echo $row['notice_title']; ?></p>
                        <b>Notice</b>
                        <p><?php echo $row['notice'] ?></p>
                        <b>Date</b>
                        <p><?php echo date('d M Y',$row['create_timestamp']) ?></p>
                    </div>
                </div>
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

