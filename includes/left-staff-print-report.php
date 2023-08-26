<?php
$date_from = $gen->IDdecode($_REQUEST['Df']);
$date_to = $gen->IDdecode($_REQUEST['Dt']);
$customer_id = $gen->IDdecode($_REQUEST['cd']);

$cust_row = $conf->singlev(CUSTOMERS . " where id='" . $customer_id . "'");
$table_fetch = SITE_SETTINGS . " where id='1'";
$row = $conf->singlev($table_fetch);
$blance = $conf->CustomerBalance($customer_id);
$sql_query = "SELECT * FROM tbl_customer_funds  WHERE DATE(t_datetime) BETWEEN '" . $date_from . "' AND '" . $date_to . "' AND customer_id=" . $customer_id . " order by id ASC";
 $sql_query;
$results = $conf->QueryRun($sql_query);

?>
<style>
	*{
	padding:0;
	margin:0;
		}
	body{
		font-size: 12px;
		margin-top: -15px !important;
		
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
	}
	
	td {
		border: none !important;
		font-size: 12px;
	}
	
	.td-border {
		border-top: 1px solid #333 !important;
	}
	@page 
        {
           
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
	@media print {
    #Header, #Footer { display: none !important; }
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 2px;
}
		.x_panel {
    width: 100%;
    padding: 5px 15px 0 15px;
		}
		.ln_solid {
     border-top: none;
		font-size: 9px;	
		}
		.table{
			font-size: 11px;
		}

	}
	td.billfooter {
    	padding: 0 !important;
	height:15px;
		}
	td.billfooter label{
	margin-bottom:0px;
	}
	/* fieldset{
		/*min-height: 97px;
	} */
</style>
<body onafterprint="window.location.href='customers_ledger.php'">
<!-- <body> -->
	<div class="col-md-12">
		<?php include('includes/messages-display.php')?>
	</div>
	<div class="row" >
		<!--<div class="col-md-1 col-sm-1 col-xs-1"></div>-->
		<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
			<div class="x_panel">

				<!----------- Page Content ----------->
				<div class="x_content" style="margin:20px;">

					<!-----Form------>

						<div class="row">
							
								
								
								<div class="col-xs-12">								
								
									
								
									
									<?php echo $row->site_address; ?><br/>
									
									<?php echo $row->site_phone; ?><br/>
								</div>
								
							
						</div><?php  if($cust_row->id!=1){ ?>
						<div class="row">
							<div class="col-xs-12" style="padding-left: 0px;">
							<fieldset>
  								<!-- <legend><b>Customer:</b></legend> -->
								<label class="control-label">Name: </label>
								<b><?php echo $cust_row->name; ?></b>
								
								<br><label class="control-label">Address: </label>
								<?php echo $cust_row->address; ?><br>
								<label class="control-label">Phone: </label>
								<?php echo $cust_row->contact_no; ?><br>
								
							</fieldset>
							</div>
							
						<?php }?>
    				
						

						</div>



						<div class="clearfix"></div>

						<!-----Table ------>

						<div class="table-responsive">
                        <table class="table table-hover" id="invoiceTable" style="width: 96%;">
                            <thead class="ust-th">
                            <tr>
                               
                                <th width="20%">Date</th>
                                <th width="35%">Description</th>
                                <th width="15%">Debit</th>
                                <th width="15%">Credit</th>
                                <th width="15%">Current Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($results > 0) {
                                foreach ($results as $itm_vr) {
                                    if($itm_vr->cbalance_type == "cr"){
                                        $balance_amount =  $itm_vr->current_balance;   
                                    } else{
                                        $balance_amount = -1 * $itm_vr->current_balance; 
                                    }  

                                    ?>
                                    <tr>
                                        
                                        <td>
                                            <?= $gen->date_for_user($itm_vr->t_datetime) ?>
                                            </td>

                                        <td>
                                            <?php
                                              echo $itm_vr->Description;
                                            
                                            ?>
                                        </td>
                                        <td style="text-align: right;">
                                        <?php
                                        if ($itm_vr->t_type == "cr") {
                                            echo $itm_vr->t_amount;
                                        }
                                        ?>
                                        </td>
                                        <td style="text-align: right;">
                                        <?php
                                         if ($itm_vr->t_type == "db") {
                                            echo $itm_vr->t_amount;
                                        }
                                        ?>
                                           

                                        </td>
                                        <td style="text-align: right;">
                                        <?php echo '<strong>' . $balance_amount . '</strong> '?>
                                            <!-- <?php
                                            if ($itm_vr->invoice_id == 0) {
                                                echo $itm_vr->Description;
                                            } else {
                                                if ($itm_vr->reference_type == 1) {

                                                    ?>

                                                    Sale Invoice <?= $itm_vr->invoice_id ?>

                                                    <?php
                                                } else if ($itm_vr->reference_type == 2) { ?>
                                                    Purchase Invoice <?= $itm_vr->invoice_id ?>
                                                <?php } else if ($itm_vr->reference_type == 3) {
                                                    ?>
                                                    Medical Purchase Invoice <?= $itm_vr->invoice_id ?>
                                                    <?php

                                                }
                                            }
                                            ?> -->
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>

                        </table>
							
						</div>

					<?php  echo '<div class="">Software By: unitedsoft.net 03136335448</div>'; ?>

				</div>
			</div>
		</div>
		
	</div>

</body>