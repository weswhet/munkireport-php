<?php $this->view('partials/head'); ?>

<?php //Initialize models needed for the table
new Machine_model;
new Reportdata_model;
new Sccm_status_model;
?>

<div class="container">

  <div class="row">

  	<div class="col-lg-12">

		  <h3>SCCM Agent Status report <span id="total-count" class='label label-primary'>…</span></h3>

		  <table class="table table-striped table-condensed table-bordered">
		    <thead>
		      <tr>
		      	<th data-i18n="listing.computername" data-colname='machine.computer_name'></th>
		        <th data-i18n="serial" data-colname='machine.serial_number'></th>
		        <th data-i18n="sccm_status.agent_status" data-colname='sccm_status.agent_status'></th> 
		        <th data-i18n="sccm_status.mgmt_point" data-colname='sccm_status.mgmt_point'></th>
		        <th data-i18n="sccm_status.enrollment_name" data-colname='sccm_status.enrollment_name'></th>
		        <th data-i18n="sccm_status.enrollment_server" data-colname='sccm_status.enrollment_server'></th>
		        <th data-i18n="sccm_status.last_checkin" data-colname='sccm_status.last_checkin'></th>
		        <th data-i18n="sccm_status.cert_exp" data-colname='sccm_status.cert_exp'></th>
		      </tr>
		    </thead>
		    <tbody>
		    	<tr>
					<td data-i18n="listing.loading" colspan="8" class="dataTables_empty"></td>
				</tr>
		    </tbody>
		  </table>
    </div> <!-- /span 12 -->
  </div> <!-- /row -->
</div>  <!-- /container -->

<script type="text/javascript">

	$(document).on('appUpdate', function(e){

		var oTable = $('.table').DataTable();
		oTable.ajax.reload();
		return;

	});
			
	$(document).on('appReady', function(e, lang) {

        // Get modifiers from data attribute
        var mySort = [], // Initial sort
            hideThese = [], // Hidden columns
            col = 0, // Column counter
            columnDefs = [{ visible: false, targets: hideThese }]; //Column Definitions

        $('.table th').map(function(){

            columnDefs.push({name: $(this).data('colname'), targets: col});

            if($(this).data('sort'))
            {
              mySort.push([col, $(this).data('sort')])
            }

            if($(this).data('hide'))
            {
              hideThese.push(col);
            }

            col++
        });

	    oTable = $('.table').dataTable( {
            ajax: {
                url: appUrl + '/datatables/data',
                type: "POST"
            },
            dom: mr.dt.buttonDom,
            buttons: mr.dt.buttons,
            order: mySort,
            columnDefs: columnDefs,
		    createdRow: function( nRow, aData, iDataIndex ) {
	        	// Update name in first column to link
	        	var name=$('td:eq(0)', nRow).html();
	        	if(name == ''){name = "No Name"};
	        	var sn=$('td:eq(1)', nRow).html();
	        	var link = mr.getClientDetailLink(name, sn, '#tab_sccm_status-tab');
	        	$('td:eq(0)', nRow).html(link);
	        	
	        	// Translate bool. todo function for any bool we find
                var status=$('td:eq(7)', nRow).html();
                status = status == 1 ? 'Yes' : 
                (status === '0' ? 'No' : '')
                $('td:eq(7)', nRow).html(status)

		    }
	    } );
	} );
</script>

<?php $this->view('partials/foot'); ?>
