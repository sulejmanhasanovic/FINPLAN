<?php

/**
 * Refactored Classes from 'cal_calculations.php' script
 *
 * @todo further refactor the functions
 * @todo sanity checks
 * @todo undefined index
 * @todo undefined property?
 **/

require_once("./includes/common.php");
require_once(MODELS_PATH."XmlData.php");
require_once(INCLUDE_PATH."/Config.class.php");
require_once(MODELS_PATH."/CaseStudy.php");
require_once(MODELS_PATH."/Finplan.php");

class FinplanService {

  private $caseStudyId;
  public $finplan;

  public function __construct($caseStudyId)
  {

    $this->caseStudyId = $caseStudyId;
    $this->finplan = new Finplan($this->caseStudyId);

    foreach (glob(SERVICES_PATH."/calculations/*") as $filename) {
      require_once($filename);
    }

  }

  public function runCalculations()
  {

    $caseGeneral = new CaseGeneral($this->finplan);
  	$caseGeneral->updateInflationInformation();
  	$caseGeneral->updateCurrencyExchangeRates();

  	$plantInvestment = new PlantInvestment($this->finplan);
  	$plantInvestment->updateIvestmentInformation();
  	$plantInvestment->updateVat();
  	$totalInvestmentData = $plantInvestment->updateTotals();
  	$fixedAssets = $plantInvestment->updateDepreciation($totalInvestmentData);
  	$plantInvestment->updateDrawDown();

  	$balanceLoan = new BalanceLoan($this->finplan);
  	$balanceLoan->updateBalanceExport();
  	$totalExportCreditData = $balanceLoan->updateExportCredit();
  	$balanceLoan->updateBalanceLoan();

  	$purchaseLoan = new PurchaseLoan($this->finplan);
  	$totalProjectLoanData = $purchaseLoan->updateTotalProjectLoan();
  	$salesData = $purchaseLoan->updateSales();
  	$purchaseData = $purchaseLoan->updatePurchase();
  	$oldLoansData = $purchaseLoan->updateOldLoans();
  	$purchaseLoan->updateNewCommercialLoans();

  	$bondEquity = new BondEquity($this->finplan);
  	$oldBondsData = $bondEquity->updateOldBonds($oldLoansData);
  	$newBondsData = $bondEquity->updateNewBonds();
  	$equityData = $bondEquity->updateEquity();

  	$costRevenue = new CostRevenue($this->finplan);
  	$costRevenue->updateOperationMaintenanceCosts();
  	$costRevenue->updateFuelCosts();
    $totalFuelCost = $costRevenue->updateTotalFuelCosts();
  	$costRevenue->updateGeneralExpenseCosts();
  	$totalGeneralExpenseCost = $costRevenue->updateTotalGeneralExpenseCosts();
  	$costRevenue->updateFixedRevenues();
  	$costRevenue->updateGlobalInvestments();
  	$totalDepreciation = $costRevenue->updateDepreciation($fixedAssets);
  	$decommissioningData = $costRevenue->updateDecommissioning();
  	$totalOperationMaintenanceCost = $costRevenue->updateTotalOperationMaintenanceCosts();
  	$costRevenue->updateTotalRevenue();
  	$costRevenue->updateRoyalties();
  	$costRevenue->updateProduction();

  	$exchangeSource = new ExchangeSource($this->finplan);
  	$exchangeData = $exchangeSource->updateForeignExchange($newBondsData['bo_CY']);
    $sourcesData = Array(
      'dp_Data2'      =>  $totalDepreciation,
      'ol_Data'       =>  $oldLoansData,
      'ob_Data'       =>  $oldBondsData,
      'feData'        =>  $exchangeData,
      'eq_drateval'   =>  $equityData['eq_drateval'],
      'eq_totout'     =>  $equityData['eq_totout']
    );
  	$fundsData = $exchangeSource->updateSourcesFunds($sourcesData);
    $balanceData = Array(
      'eq_Data'       =>  $equityData['eq_Data'],
      'feData'        =>  $exchangeData,
      'ob_Data'       =>  $oldBondsData,
      'ol_Data'       =>  $oldLoansData
    );
  	$exchangeSource->updateBalanceSheet($balanceData);

  	$assetRisk = new AssetRisk($this->finplan);
    $assetData = Array(
      'tex_Data'      =>  $totalExportCreditData,
      'tin_Data'      =>  $totalInvestmentData,
      'de_Data'       =>  $decommissioningData,
      'dp_Data2'      =>  $totalDepreciation,
      'bo_Data'       =>  $newBondsData['bo_Data'],
      'ob_Data'       =>  $oldBondsData,
      'ol_Data'       =>  $oldLoansData,
      'eq_Data'       =>  $equityData['eq_Data'],
      'eq_totout'     =>  $equityData['eq_totout'],
      'ret_earn'      =>  $fundsData['ret_earn'],
      'short_loans'   =>  $fundsData['short_loans'],
      'short_dep'     =>  $fundsData['short_dep'],
      'cml_earn'      =>  $fundsData['cml_earn'],
      'tcl_Data'      =>  $totalProjectLoanData
    );
  	$liabilityData = $assetRisk->updateAssetLiability($assetData);
  	$assetRisk->updateRiskAnalysis($fundsData['fi_Data']);
    $ratioData = Array(
      'tex_Data'      =>  $totalExportCreditData,
      'tin_Data'      =>  $totalInvestmentData,
      'ob_Data'       =>  $oldBondsData,
      'ol_Data'       =>  $oldLoansData,
      'bo_Data'       =>  $newBondsData['bo_Data'],
      'tot_int'       =>  $fundsData['tot_int'],
      'tot_repay'     =>  $fundsData['tot_repay'],
      'short_int'     =>  $fundsData['short_int'],
      'pre_inv'       =>  $fundsData['pre_inv'],
      'tax_inc'       =>  $fundsData['tax_inc'],
      'inc_tax'       =>  $fundsData['inc_tax'],
      'tfc_Data'      =>  $totalFuelCost,
      'tom_Data'      =>  $totalOperationMaintenanceCost,
      'tge_Data'      =>  $totalGeneralExpenseCost,
      'pr_Data2'      =>  $purchaseData,
      'tcl_Data'      =>  $totalProjectLoanData,
      'net_equ'       =>  $liabilityData['net_equ'],
      'net_loan'      =>  $liabilityData['net_loan'],
      'cml_ret'       =>  $liabilityData['cml_ret'],
      'net_bnd'       =>  $liabilityData['net_bnd'],
      'grs_fxd'       =>  $liabilityData['grs_fxd'],
      'net_fxd'       =>  $liabilityData['net_fxd'],
      'con_ctb'       =>  $liabilityData['con_ctb'],
      'tot_ast'       =>  $liabilityData['tot_ast'],
      'fi_Data'       =>  $fundsData['fi_Data'],
      'sl_Data2'      =>  $salesData
    );

  	$assetRisk->updateFinancialRatios($ratioData);
    $returnData = Array(
      'eq_Data'       =>  $equityData['eq_Data'],
      'tot_div'       =>  $fundsData['tot_div'],
      'net_equ'       =>  $liabilityData['net_equ'],
      'net_bnd'       =>  $liabilityData['net_bnd'],
      'net_loan'      =>  $liabilityData['net_loan'],
      'cur_mat'       =>  $liabilityData['cur_mat'],
      'dep_dec'       =>  $liabilityData['dep_dec'],
      'tot_ast'       =>  $liabilityData['tot_ast']
    );

  	$assetRisk->updateShareholdersReturn($returnData);
  }

}

?>
