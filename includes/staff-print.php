<?php


$results = "SELECT * FROM ".STAFF." where is_deleted = 0 LIMIT 100";
$results = $conf->QueryRun($results);



// $cust_row = $conf->singlev(CUSTOMERS . " where id='" . $customer_id . "'");
// $table_fetch = SITE_SETTINGS . " where id='1'";
// $row = $conf->singlev($table_fetch);
// $blance = $conf->CustomerBalance($customer_id);
// $sql_query = "SELECT cus.id, cus.name, cf.current_balance,cf.cbalance_type,c.city FROM customers as cus 
// INNER JOIN tbl_city as c on c.id=cus.city
// INNER JOIN tbl_customer_funds as cf on cf.customer_id=cus.id
// where cf.id in (SELECT max(id) as rowid from tbl_customer_funds where customer_id=cus.id  group by customer_id) AND cus.city='" . $customer_id . "'";
// $results = $conf->QueryRun($sql_query);
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


<body onafterprint="window.location.href='customers.php'">

<!-- <body> -->
	<div class="col-md-12">
		<?php include('includes/messages-display.php') ?>
	</div>
	<div class="row">
		<!--<div class="col-md-1 col-sm-1 col-xs-1"></div>-->
		<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
			<div class="x_panel">

				<!----------- Page Content ----------->
				<div class="x_content" style="margin:20px;">

					<!-----Form------>

					<div class="row">

						<!--<div class="form-group col-xs-4">
									<?php
									//if (SITE_LOGO!="") {

									// echo '<img src="uploads/site/'.SITE_LOGO.'" style="width:100%"/>';
									// }else{ echo '<img src="images/login_banner.jpg" >';} 
									?>
								</div>-->

						<div class="col-xs-12">

							<!-- <h1 style="padding-top:0; margin:-12px 0 -6px 0;"><?php echo 'britain' ?></h1> -->


							<!-- <?php echo 'mulatn' ?><br /> -->

							<!-- <?php echo 032321651 ?><br /> -->
						</div>


					</div><?php  ?>
						<div class="row">
							<div class="col-xs-12" style="padding-left: 0px;">
								<div class="setprint">
									<!-- <legend><b>Customer:</b></legend> -->
                                    <!-- <div class="textsize">To:</div> -->
									<!-- <div class="printsize"><?php echo 'Staff' ?></div> -->
									
									<div class="printsize"><?php echo '' ?></div>
									<div class="printsize"><?php echo $city->city; ?></div>
									<div class="contact"> <?php echo $cust_row->contact_no; ?></div>

								

					</div >
							</div>
							<!-- <?php  ?>
							<div class="col-xs-12" style="padding-left: 0px;">
							<fieldset>
  								<legend><b>Current Balance: <?php echo $blance; ?></b></legend>
						
										
    					    <label class="control-label">Date: </label>
    					<?php echo date("d/m/Y h:i:s", strtotime($row_invoice->date)); ?>
    					
    					<br>
    					
    					<label class="control-label">Term: </label>
    					<?php //if($row_invoice->term=="cr"){ echo "Credit";} else { echo "Debit";}
						?><br>
    					
    					<?php if ($row_invoice->cargo != '') { ?>
    					<label class="control-label">Cargo: </label>
    					<?php echo $row_invoice->cargo; ?>
    					<?php } ?>
						<?php if ($row_invoice->bilty_no != '') { ?>
							<label class="control-label">Bilty: </label>
							<?php echo $row_invoice->bilty_no; ?>
						<?php } ?>
    				
						</fieldset>	
							</div> -->

						</div>



						<div class="clearfix"></div>

						<!-----Table ------>

						<div class="card-body">



						<div class="logo">
						<a href="index" class="brand-logo">
    						<img src="dist/img/school.jpeg" alt="Logo" class="brand-image elevation-3">
  						</a>
						</div>



						<h1 class="main-heading">Britain International School System</h1>

							<?php echo date("d/m/Y h:i:s", strtotime($row_invoice->date)); ?>





                <table id="" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                    <tr>
                      <th style="width:10%">Employee id</th>

                      <th style="width:10%">Employee Name</th>

                      <th style="width:8%">Father Name</th>

                      <th style="width:10%">Gender</th>

                      <th style="width:5%">Contact</th>

                      
                      <th style="width:8%">Father Contact</th>




                      <th style="width:1%">View</th>
                      <th style="width:1%">Edit</th>
                      <th style="width:1%">Delete</th>



                      <!-- <th class="no-sort" style="width:13%">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach ($results as $data) {
                      // print_r($data);
                    ?>
                      <tr>

                        <td>
                          <?= $data->id ?>
                        </td>


                        <td>
                          <?= $data->employel_name ?>

                        </td>

						
                        <td>
                          <?= $data->father_name ?>

                        </td>

						
                        <td>
                          <?= $data->gender ?>

                        </td>

						
                        <td>
                          <?= $data->contact ?>

                        </td>

						
                        <td>
                          <?= $data->father_contact ?>

                        </td>
						
						


                      



                        <td class="">

                          <form action="staff-show.php?CD=<?php echo $data->id; ?>" method="post">
                            <button type="submit" class="btn btn-primary">Show</button>

                          </form>

                        </td>
                        <td>
                          <form action="staff-edit.php?CD=<?php echo $data->id; ?>" method="post">

                            <button type="submit" class="btn btn-primary">Edit</button>

                          </form>
                        </td>
                        <td>
                          <form action="" method="post">
                            <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                          </form>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
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