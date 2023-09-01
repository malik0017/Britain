<?php


$campus_id = $gen->IDdecode($_REQUEST['cd']);
// echo"wwwwwwwwww".$campus_id;

$cust_row = $conf->singlev(CAMPUStbl . " where id='" . $campus_id . "'");

$table_fetch = SITE_SETTINGS . " where id='1'";

$row = $conf->singlev($table_fetch);
// 
// $blance = $conf->CustomerBalance($customer_id);
// $sql_query = "SELECT * FROM " . STAFF;
$sql_query = "SELECT * FROM ".STAFF." where is_deleted = 0 && IsLeft= 1 &&  campus = $campus_id ";

//    echo $sql_query;
$results = $conf->QueryRun($sql_query);

?>
<style>
	* {
		padding: 0;
		margin: 0;
	}

	body {
		font-size: 12px;
		margin-top: -15px !important;
		

	}
	.setprint{ width: 100%;
    transform: rotate(270deg);
	position:relative;
	right: 4em;
	left: 4em;
	bottom: 5em;
	top:5em;
    display: block;
    /* bottom: -6em; */
 	/* margin-top: 50px; */
	/* margin-left:100px; */
}
/*.setprint{*/
/*	font-size:22px;*/
/*}*/

.textsize{
	font-size:26px;
	margin-left:-1em;

}
.printsize{
	font-size:18px;
	margin-left:1em;
	margin-right: 1em;
	margin-top: 2em;
}
.contact{
	font-size:18px;
	margin-left:12em;

}


	.x_panel {
		padding: 2px;
		padding-top: -2px;
	}

	#demo-form2 .m-b {
		margin-bottom: 10px;
	}

	.addFldTbl td {
		padding: 0 !important;
	}

	.p-0 {
		padding: 0 !important;
	}

	.search-box,
	.search-box-contact {
		width: 50% !important;
	}

	.result,
	.resultnum {
		padding-right: 10px;
		padding-left: 10px;
	}

	.ust-font-size {
		font-size: 12px;
	}

	.ust-th th {
		border-top: 1px solid #333 !important;
		border-bottom: 1px solid #333 !important;
		/* margin-top: 20px; */

	}

	td {
		border: none !important;
		font-size: 12px;
	}

	.td-border {
		border-top: 1px solid #333 !important;
	}

	@page {

		size: auto;
		/* auto is the current printer page size */
		margin: 0mm;
		/* this affects the margin in the printer settings */
	}

	@media print {

		#Header,
		#Footer {
			display: none !important;
		}

		.table>tbody>tr>td,
		.table>tbody>tr>th,
		.table>tfoot>tr>td,
		.table>tfoot>tr>th,
		.table>thead>tr>td,
		.table>thead>tr>th {
			padding-top: 20px;
			padding-bottom: 20px;

		}


		.x_panel {
			width: 100%;
			padding: 5px 15px 0 15px;
		}

		.ln_solid {
			border-top: none;
			font-size: 9px;
		}

		.table {
			font-size: 12px;
		}

	}

	td.billfooter {
		padding: 0 !important;
		height: 15px;
	}

	td.billfooter label {
		margin-bottom: 0px;
	}


.brand-image {
    /* display: block;
    margin: 0 auto; */
    height: 80px;
}


.main-heading{
	text-align: center;
}

.sub-heading{
	text-align: center;
}

</style>


<!-- <body onafterprint="window.location.href='customers.php'"> -->
<body onafterprint="window.location.href='left-staff-report'">
<!-- <body> -->
	<div class="col-md-12">
		<?php include('includes/messages-display.php') ?>
	</div>
	<div class="row">
	
		<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
			<div class="x_panel">

				<!----------- Page Content ----------->
				<div class="x_content" style="margin:20px;">

					<!-----Form------>

					<?php  ?>
						

						<div class="clearfix"></div>

						<!-----Table ------>

						<div class="card-body">



						<div class="logo">
						<a href="index" class="brand-logo">
    						<img src="dist/img/school.jpeg" alt="Logo" class="brand-image elevation-3">
  						</a>
						</div>



						<h1 class="main-heading">Britain International School System</h1>

							<!-- <?php echo date("d/m/Y h:i:s", strtotime($row_invoice->date)); ?> -->


              <div class="clearfix"></div>
			  <div class="row">
							<div class="col-xs-12" style="padding-left: 0px;">
							<fieldset>
  								<!-- <legend><b>Customer:</b></legend> -->
								<label class="control-label">Campus: </label>
								<b><?php echo $cust_row->campus_name; ?></b>
								
								<!-- <br><label class="control-label">Address: </label>
								<?php echo $cust_row->address; ?><br>
								<label class="control-label">Phone: </label>
								<?php echo $cust_row->contact_no; ?><br> -->
								
							</fieldset>
							</div>
							
						
    				
						

						</div>

<!-----Table ------>

<div class="table-responsive">
            <!-- <table class="table table-hover" id="invoiceTable" style="width: 96%;">
                <thead class="ust-th"> -->
				<table id="" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="ust-th">
                <tr>
                   
                    <!-- <th width="20%">Employee Id</th> -->
                    <th width="35%">Employee Name</th>
                    <th width="15%">Father Name</th>
                    <th width="15%">Gender</th>
                    <th width="15%">Contact</th>
    <th width="15%"> Father Contact</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($results > 0) {
                    foreach ($results as $itm_vr) {
                       

                        ?>
                        <tr>
                            
                            <!-- <td>
                                <?php echo $itm_vr->employel_id ?>
                                </td> -->

                            <td>
                                <?php
                                  echo $itm_vr->employel_name;
                                
                                ?>
                            </td>
        <td>
                                <?php
                                  echo $itm_vr->father_name;
                                
                                ?>
                            </td>
        <td>
                                <?php
                                  echo $itm_vr->gender;
                                
                                ?>
                            </td>
        <td>
                                <?php
                                  echo $itm_vr->contact;
                                
                                ?>
                            </td>
        <td>
                                <?php
                                  echo $itm_vr->father_contact;
                                
                                ?>
                            </td>
                           
                            

                            
                        
                        </tr>
                    <?php }
                } ?>
                </tbody>

            </table>
  
</div>
                <!-- /.card-body -->
              </div>

						

				</div>
			</div>
		</div>
		<!--<div class="col-md-2 col-sm-2 col-xs-2"></div>-->
	</div>
<script>
    window.print();
</script>
</body>