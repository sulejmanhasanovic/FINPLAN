<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<HEAD>
  <TITLE>FINPLAN : <?php echo $DefaultStudy; ?></TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
<link rel="stylesheet" href="images/finplan.css" type="text/css" />
<!-- <script type="text/javascript" src="js/cssrightmenu.js"></script> -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<!-- <script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script> -->
<link rel="stylesheet" type="text/css" href="SpryAssets/SpryValidationTextField.css" >
<link rel="stylesheet" type="text/css" href="SpryAssets/SpryValidationSelect.css" >
<!-- <link rel="stylesheet" type="text/css" href="SpryAssets/SpryValidationTextarea.css" > -->
<script type="text/javascript">
function plusminus(numb)
{
for (n=1; n <= 5; n++){
	obj=document.getElementById('menu'+n);
	col=document.getElementById('lnk'+n);

	if(n==numb){
		 if (obj.style.display=="none") {
		  obj.style.display="block";
		  col.src="images/minus.gif";
		  if(numb==4){
			window.location = "rep_operaccount.php"
			}

		 }
		 else {
		  obj.style.display="none";
		  col.src="images/plus.gif";
		 }
	}else{
		if (obj.style.display!="none") {
		obj.style.display="none";
		col.src="images/plus.gif";
		}
	}
 }

}

</script>
<script language="javascript" src="js/mkvals.js"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/optiontransfer.js"></SCRIPT>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<SCRIPT LANGUAGE="JavaScript">
var opt = new OptionTransfer("AllCur","CurSel");
console.log(opt.left.options);
opt.setAutoSort(false);
opt.setDelimiter(",");
opt.setStaticOptionRegex("^<!-- Val BASCUR -->$");
opt.saveNewRightOptions("data[CurTypeSel]");

</SCRIPT>



<body>

	<!-- header starts here -->
	<div id="header-wrap">
	<div id="header-content">

		<h1 id="logo"><a HREF="javascript:void(0)"onclick="window.open('../about.php','About','height=480, width=480,scrollbars=yes')">FINPLAN</a></h1>
		<h2 id="slogan">A Model for Financial Analysis of Electric Sector Expansion Plans. Case Study: <?php echo $caseStudyName;?></h2>
		<h1 id="logo2">Planning & Economic Studies Section </h1>
		<h2 id="slogan2">Department of Nuclear Energy, IAEA</h2>
		<!-- 	Menu Tabs -->
		  <ul>
		   <li><a href="../index.php">Home</a></li>
		  <li><a href="begin.php">Case Studies</a></li>
		</ul>

	</div></div>


<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">
		<div class="collapsemenu">
			<?php if($defmenu=='block'){ $link1="minus.gif";}else{ $link1="plus.gif";}?>
			<a class="menuitem submenuheader" href="JavaScript:plusminus(1);"><img src='images/<?php echo $link1;?>' id='lnk1' name='lnk1' border='0' />&nbsp;&nbsp;Case Data</a>
			<div class="submenu" id="menu1" style="display:<?php echo $defmenu;?>none">
				<br>

				<h1><?php echo $gen_1;?></h1>

				<ul class="sidemenu">
					<li><a href="geninf.php?a=e">General Information </a></li>
					<li><a href="inflation.php">Inflation Information</a></li>
					<li><a href="ecncur.php">Currency Exchange Rates</a> </li>
				</ul>

				<br>

				<h1><?php echo $gen_2;?></h1>

				<ul class="sidemenu">
					<li><a href="taxinfo.php">Tax & Depreciation Information</a> </li>
					<li> <a href="royalty.php" class="hdrlinebg2">Royalty Payment</a></li>
				</ul>

				<br>

				<h1><?php echo $gen_3;?></h1>

				<ul class="sidemenu">
					<li><a href="assetliability.php">Initial Balance Sheet</a></li>
					<li> <a href="oldloans.php" class="hdrlinebg2">Old Commercial Loans</a></li>
					<li> <a href="oldbonds.php" class="hdrlinebg2">Old Bonds</a></li>
					<li> <a href="comminvest.php" class="hdrlinebg2">Committed Investment</a></li>
				</ul>

				<br>

				<h1><?php echo $gen_5;?></h1>

				<ul class="sidemenu">
					<li> <a href="conscontrib.php" class="hdrlinebg2">Consumers Contribution & Deposits</a></li>
					<li> <a href="fixrevotrinc.php" class="hdrlinebg2">Fixed Revenues & Other Income</a></li>
					<li><a href="sale.php">Sales Data</a></li>
					<li><a href="salepurchase.php">Purchase Data</a></li>
				</ul>


			</div>

			<?php if($pltmenu=='block'){ $link2="minus.gif";}else{ $link2="plus.gif";}?>
			<a class="menuitem submenuheader" href="JavaScript:plusminus(2);"><img src='images/<?php echo $link2;?>' id='lnk2' name='lnk2' border='0' />&nbsp;&nbsp;Plant Data</a>
			<div class="submenu" id="menu2" style="display:<?php echo$pltmenu;?>none;">
				<br>
				<h1><?php echo $plant_4;?></h1>
				<ul class="sidemenu">
					<li><a href="manage.php" class="hdrlinebg2"><?php echo $plant_3;?></a></li>
					<li><a href="plntproduct.php" class="hdrlinebg2"><?php echo $plant_5;?></a></li>
					<li><a href="plntprdom.php" class="hdrlinebg2"><?php echo $plant_6;?></a></li>
					<li><a href="fuelcost.php" class="hdrlinebg2"><?php echo $plant_7;?></a></li>
					<li><a href="genexpense.php" class="hdrlinebg2"><?php echo $plant_18;?></a></li>
				</ul>
				<br>
				<h1><?php echo $plant_8;?></h1>
				<ul class="sidemenu">
					 <li><a href="investmentcost.php" class="hdrlinebg2"><?php echo $plant_9;?></a></li>
				</ul>
				</ul>
					<br>
					<h1><?php echo $plant_11;?></h1>
					<ul class="sidemenu">
			<?php
					for($i = 0; $i < count($allChunks); $i++){
						?>
						<li><a href="sourcefinance2.php?cur=<?php echo $allChunks[$i];?>" class="hdrlinebg2"> <?php echo Config2::getData('currencies',$allChunks[$i]);?></a> </li>
			<?php

					}
			?>

					</ul>
					<br>
					<h1><?php echo $plant_12;?></h1>
					<ul class="sidemenu">
            <?php
						foreach($financeSources as $financesource){
							if ($financesource['type']=='C'){
						?>
            <li> <a href="termfinance2.php?fs=<?php echo $financesource['id'];?>" class="hdrlinebg2"> <?php echo $financesource['value']?></a></li>
						<?php }else{ ?>
            <li> <a href="termfinance.php?fs=<?php echo $financesource['id'];?>" class="hdrlinebg2">
            <?php
            if ($financesource['value'] == 'ExportCredit1') {
							echo 'Export Credit 1';
						} else {
							echo 'Export Credit 2';
						}
            ?>
            </a></li>
			      <?php	}
						}
			      ?></ul>
					<br>
					<h1><?php echo $plant_13;?></h1>
					<ul class="sidemenu">
						 <li> <a href="depreciation.php" class="hdrlinebg2"><?php echo $plant_14;?></a></li>
						<li> <a href="decommissioning.php" class="hdrlinebg2"><?php echo $plant_15;?></a></li>
					</ul>	<br>


			</div>

						<?php if($pfamenu=='block'){ $link5="minus.gif";}else{ $link5="plus.gif";}?>
			<a class="menuitem submenuheader" href="JavaScript:plusminus(5);"><img src='images/<?php echo $link5;?>' id='lnk5' name='lnk5' border='0' />&nbsp;&nbsp;FinManager</a>
			<div class="submenu" id="menu5" style="display:<?php echo $pfamenu;?>none;">

				<ul class="sidemenu">
					<li> <a href="equity.php" class="hdrlinebg2">Equity</a></li>
					<li> <a href="loans.php" class="hdrlinebg2">New Commercial Loans</a></li>
					<li> <a href="bonds.php" class="hdrlinebg2">New Bonds</a></li>
					<li> <a href="otherfindata.php" class="hdrlinebg2">Other Fin Data</a></li>
					<li> <a href="shareholderreturn.php" class="hdrlinebg2">Shareholders' Return Data</a></li>
					<li> <a href="project.php" class="hdrlinebg2">Terms of Project Finance Loan</a></li>
				</ul>
			</div>




			<a class="menuitem submenuheader" href="calculate.php">&nbsp;&nbsp;Calculate</a>

			<?php if($repmenu=='block'){ $link3="minus.gif";}else{ $link3="plus.gif";}?>
			<a class="menuitem submenuheader" href="JavaScript:plusminus(3);"><img src='images/<?php echo $link3;?>' id='lnk3' name='lnk3' border='0' />&nbsp;&nbsp;Intermediate Results</a>
			<div class="submenu" id="menu3" style="display:<?php echo$repmenu;?>none;">
				<ul class="sidemenu">

					<?php  $filedir = PROJECT_DATA_FILE_PATH.sanitize_filename($caseStudyId).'/result/';
						$ab = $filedir.$abxml.'.xml';
					if(is_file($ab)){//if  exists ,then show

					?>
					<li><a href="rep_assetliability.php">Initial Balance Sheet</a> </li>

					<li>Old Loans</a>
						<ul>
						<li><a href="rep_oldloanscur.php">Old Loans by Currency</a> </li>
						<li><a href="rep_oldloanslc.php">Total Old Loans</a> </li>
						</ul>
					</li>

					<li>Old Bonds</a>
						<ul>
						<li><a href="rep_oldbondscur.php">Old Bonds by Currency</a> </li>
						<li><a href="rep_oldbondslc.php">Total Old Bonds</a> </li>
						</ul>
					</li>

					<li>Economic Parameters</a>
						<ul>
					<li><a href="rep_inflation.php">Inflation Index</a> </li>
					<li><a href="rep_exchange.php">Exchange Rates</a> </li>
						</ul>
					</li>

					<li>Financing</a>
						<ul>
					<li><a href="rep_investmentsexpenditures.php">Investments Expenditures</a> </li>
					<li><a href="rep_standby.php">Stand-by Facility</a> </li>
					<li><a href="rep_shortdeposits.php">Short-Term Deposits</a> </li>
						</ul>
					</li>

					<li>New Loans
						<ul>
						<li><a href="rep_loans.php">New Commercial Loans</a></li>
						<li><a href="rep_loanplt.php">Project Loans</a> </li>
						<li><a href="rep_loancur.php">Project Loans by Currency</a> </li>
						<li><a href="rep_loanlc.php">Total Project Loans</a> </li>
						</ul>
                                        </li>
					<li>New Bonds
						<ul>
						<li><a href="rep_bondscur.php">New Bonds by Currency</a> </li>
						<li><a href="rep_bondslc.php">Total New Bonds</a> </li>
						</ul>
					</li>
					<li>Export Credits
						<ul>
						<li><a href="rep_ecreditplt.php">Export Credits by Plant</a> </li>
						<li><a href="rep_ecreditcur.php">Export Credits by Currency</a></li>
						<li><a href="rep_ecreditwiselc.php">Export Credits in Local Currency</a> </li>
						<li><a href="rep_ecreditcurtot.php">Total Export Credits by Currency</a> </li>
						<li><a href="rep_ecreditlc.php">Total Export Credits</a> </li>
						</ul>
					</li>

					<li>Equity & Dividend
						<ul>
<!--						<li><a href="rep_equitydividend.php">By Currency</a> </li> -->
						<li><a href="rep_equitydividendlc.php">In Local Currency</a> </li>
						</ul>
					</li>
					<li>Foreign Currencies
						<ul>
						<li><a href="rep_foriegnreq.php">Requirements</a> </li>
						<li><a href="rep_foriegnout.php">Outstanding</a> </li>
						</ul>
					</li>
					<li>Fuel Costs
						<ul>
						<li><a href="rep_fuelcost.php">Fuel Costs by Plant</a> </li>
						<li><a href="rep_totalfuelcost.php">Total Fuel Cost</a> </li>
						</ul>
					</li>

					<li>O&M Costs
						<ul>
						<li><a href="rep_omcost.php">O&M Costs</a> </li>
						<li><a href="rep_totalomcost.php">Total O&M Costs</a> </li>
						</ul>
					</li>

					<li>Depreciation
					<ul>
					<li><a href="rep_deprtot.php">Total</a> </li>
					<li><a href="rep_deprplt.php">By Plant</a> </li>
					</ul>
					</li>
					<li>Decommissioning Costs
					<ul>
					<li><a href="rep_decomm.php">Total</a> </li>
					<li><a href="rep_decommplt.php">By Plant</a> </li>
					</ul>
					</li>
					<li>Sales
						<ul>
						<li><a href="rep_salecurr.php">Sales-Currency Wise</a> </li>
						<li><a href="rep_saleproduct.php">Sales-Product Wise</a> </li>
						<li><a href="rep_totalrevenues.php">Total Revenues from Sales</a> </li>
						</ul>
					</li>
					<li>Purchases
						<ul>
						<li><a href="rep_purchasecurr.php">Purchase-Currency Wise</a> </li>
						<li><a href="rep_purchaseproduct.php">Purchase-Product Wise</a> </li>
						<li><a href="rep_totalexpenditure.php">Total Expenditures on Purchases</a> </li>
						</ul>
					</li>

					<li>Others
						<ul>
					<li><a href="rep_otherincome.php">Other Incomes</a> </li>
					<li><a href="rep_taxroyalty.php">Taxes & Royalty</a> </li>
					<li><a href="rep_sourceapp.php<?php echo $newwindow;?>" target="<?php echo $targetwindow;?>">Sources & Application of Funds</a> </li>
					<?php }else{?>
					<li><a href="calculate.php" ><br><b>Generate Reports</b></a><br></li><?php }?>
				</ul>
			</div>
			<?php if($resmenu=='block'){ $link4="minus.gif";}else{ $link4="plus.gif";}?>
			<a class="menuitem submenuheader" href="JavaScript:plusminus(4);"><img src='images/<?php echo $link4;?>' id='lnk4' name='lnk4' border='0' />&nbsp;&nbsp;Results</a>
			<div class="submenu" id="menu4" style="display:<?php echo$resmenu;?>none;">
				<ul class="sidemenu">

					<?php  $filedir = PROJECT_DATA_FILE_PATH.sanitize_filename($caseStudyId).'/result/';
						$ab = $filedir.$abxml.'.xml';
					if(is_file($ab)){//if  exists ,then show

					?>
					<li><a href="rep_operaccount.php<?php echo $newwindow;?>" target="<?php echo $targetwindow;?>">Operating Account</a> </li>
					<li><a href="rep_inoutflow.php<?php echo $newwindow;?>" target="<?php echo $targetwindow;?>">Cash Inflows and Outflows</a> </li>
					<li><a href="rep_balancesheet.php<?php echo $newwindow;?>" target="<?php echo $targetwindow;?>">Balance Sheet</a> </li>
					<li><a href="rep_shareholder.php<?php echo $newwindow;?>" target="<?php echo $targetwindow;?>">Shareholders' Return</a> </li>
					<li><a href="rep_financeratios.php<?php echo $newwindow;?>" target="<?php echo $targetwindow;?>">Financial Ratios</a> </li>
					<li><a href="rep_risk.php<?php echo $newwindow;?>" target="<?php echo $targetwindow;?>">Project Finance Analysis</a> </li>
          <li><a href="rep_spreadsheet.php">Download Spreadsheet</a> </li>


					<?php }else{?>
					<li><a href="calculate.php" ><br><b>Generate Reports</b></a><br></li><?php }?>
				</ul>
			</div>
		</div>
	<div id="main">
