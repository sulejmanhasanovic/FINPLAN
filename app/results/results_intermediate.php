<?php
	require_once "../../config.php";
	require_once BASE_PATH."general.php";
	require_once CLASS_PATH."XmlData.php";
	require_once CLASS_PATH."Data.class.php";

    //Manage files
    switch($_REQUEST['id']){
		case '2.1.'://Operating Account 
			$xml = new XmlData($caseStudyId,$caxml);
			$caData = $xml->getByField(1,'sid');

			$table= array();
			$series= array();

			for($m=$startYear;$m <= $endYear; $m++){
				$row=array();
				$row['item']=$m;
				$row['chart']=true;
				array_push($table,$row);
			}


			$results=[];
			$results['result']=$table;
			$results['series']=$series;
			$results['allyears']=$AllYear;
			$results['unit']='Million';
        	echo (json_encode($results));
			break;	
			
			case "1.2.": //Cash Inflows and Outflows in Local Currency      
			$table= array();
			$series= array();
			$loanDrawdown=array();
			$aVal=array();
			for($n = $startYear;$n <= $endYear; $n++){
				$gVal[$n] = max(0,$cnData['SLL_'.$n]);
				$qrVal[$n] = $cnData['ITL_'.$n] + $ckData['RLC_'.$n];
				$uVal[$n] = max(0,$cnData['SDBL_'.$n]-$cnData['SDBL_'.($n-1)]);
				$loanDrawdown[$n] = formatnumber($chData['LLC_'.$n] + $cnData['TCLL_'.$n]);
				$aVal[$n] = formatnumber($cvData['FR_'.$n] + $bkData['LC_'.$n] + $cvData['OI_'.$n]);
				$tVal[$n] = $agData['GIL_'.$n]+$bdData['OMTD_'.$n]+$beData['LC_'.$n]+$cgData['LC_'.$n]+$bzData['LC_'.$n]+
							$cnData['TIL_'.$n]+$cnData['TRL_'.$n]+$cnData['SLRL_'.$n]+$cnData['TERL_'.$n]+$qrVal[$n]+$cnData['DivL_'.$n]+$uVal[$n];

				$totinflow[$n] = $aVal[$n] + $cnData['SDIL_'.$n] + $cdData['N_'.$n] + $cnData['TBL_'.$n] + $loanDrawdown[$n] + $gVal[$n];
				$flowstd[$n] = max(0,$cnData['SDBL_'.($n-1)]-$cnData['SDBL_'.$n]);
				$totcash[$n] = $totinflow[$n] + $flowstd[$n];
			}

			$row=array();
			$row['item']='Cash available in short term deposits (at end of previous year)';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['SDBL_'.($n-1)]);
			}
			array_push($table,$row);

			$row=array();
			$row['item']='Inflows';
			$row['chart']=true;
			$row['css']='readonly1';
			array_push($table,$row);

			$row=array();
			$row['item']='Revenues';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cvData['FR_'.$n] + $bkData['LC_'.$n] + $cvData['OI_'.$n]);
			}
			array_push($table,$row);
			$series[]='Revenues';

			$row=array();
			$row['item']='Fixed revenues';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cvData['FR_'.$n]);
			}
			array_push($table,$row);
			$series[]='Fixed revenues';

			$row=array();
			$row['item']='Sales';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($bkData['LC_'.$n]);
			}
			array_push($table,$row);
			$series[]='Sales';

			$row=array();
			$row['item']='Others';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cvData['OI_'.$n]);
			}
			array_push($table,$row);
			$series[]='Others';

			$row=array();
			$row['item']='Interest earned';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['SDIL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Interest earned';

			$row=array();
			$row['item']='New equity';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cdData['N_'.$n]);
			}
			array_push($table,$row);
			$series[]='New equity';

			$row=array();
			$row['item']='Bonds issue';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['TBL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Bonds issue';

			$row=array();
			$row['item']='Loans drawdowns';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$loanDrawdown;
			}
			array_push($table,$row);
			$series[]='Loans drawdowns';

			$row=array();
			$row['item']='Stand-by facility';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$gval[$n];
			}
			array_push($table,$row);
			$series[]='Stand-by facility';

			$row=array();
			$row['item']='Total inflows';
			$row['chart']=true;
			$row['css']='readonly1';
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$totinflow[$n];
			}
			array_push($table,$row);
			$series[]='Total inflows';

			$row=array();
			$row['item']='Flow from short term deposits';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$flowstd[$n];
			}
			array_push($table,$row);
			$series[]='Flow from short term deposits';

			$row=array();
			$row['item']='Total cash available';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$totcash[$n];
			}
			array_push($table,$row);
			$series[]='Total cash available';

			$row=array();
			$row['item']='Outflows';
			$row['chart']=true;
			$row['css']='readonly1';
			array_push($table,$row);

			$row=array();
			$row['item']='Investment';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($agData['GIL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Investment';

			$row=array();
			$row['item']='O&M + decommissioning cost';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($bdData['OMTD_'.$n]);
			}
			array_push($table,$row);
			$series[]='O&M + decommissioning cost';

			$row=array();
			$row['item']='Fuel expenses';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($beData['LC_'.$n]);
			}
			array_push($table,$row);
			$series[]='Fuel expenses';

			$row=array();
			$row['item']='Expenditure on purchases';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cgData['LC_'.$n]);
			}
			array_push($table,$row);
			$series[]='Expenditure on purchases';

			$row=array();
			$row['item']='General expenses';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($bzData['LC_'.$n]);
			}
			array_push($table,$row);
			$series[]='General expenses';

			$row=array();
			$row['item']='Interest paid';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['TIL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Interest paid';

			$row=array();
			$row['item']='Repayments: loans and bonds';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['TRL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Repayments: loans and bonds';

			$row=array();
			$row['item']='Repayments: stand-by facility';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['SLRL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Repayments: stand-by facility';

			$row=array();
			$row['item']='Equity repayment';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['TERL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Equity repayment';

			$row=array();
			$row['item']='Taxes & royalties';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$qrVal[$n];
			}
			array_push($table,$row);
			$series[]='Taxes & royalties';

			$row=array();
			$row['item']='Dividend';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['DivL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Dividend';

			$row=array();
			$row['item']='Flow to short term deposits';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$uVal[$n];
			}
			array_push($table,$row);
			$series[]='Flow to short term deposits';

			$row=array();
			$row['item']='Total outflows';
			$row['chart']=true;
			$row['css']='readonly1';
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=$tVal[$n];
			}
			array_push($table,$row);
			$series[]='Total outflows';

			$row=array();
			$row['item']='Cash available (VAT)';
			$row['chart']=true;
			$row['css']='readonly1';
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($totcash[$n] - $tVal[$n]);
			}
			array_push($table,$row);
			$series[]='Cash available (VAT)';


			$results['result']=$table;
			$results['series']=$series;
			$results['allyears']=$AllYear;
			$results['unit']='Million';
        	echo (json_encode($results));
			break;

			case "1.3.": //Balance Sheet in Local Currency 
			$table= array();
			$series= array();
			$row=array();
			$row['item']='Assets';
			$row['chart']=true;
			$row['css']='readonly1';
			array_push($table,$row);

			$row=array();
			$row['item']='Gross fixed assets';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['GFA_'.$n]);
			}
			array_push($table,$row);
			$series[]='Gross fixed assets';

			$row=array();
			$row['item']='Less: accumulated depreciation';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['CD_'.$n]);
			}
			array_push($table,$row);
			$series[]='Less: accumulated depreciation';

			$row=array();
			$row['item']='Less: accumulated consumer contribution';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['CC_'.$n]);
			}
			array_push($table,$row);
			$series[]='Less: accumulated consumer contribution';

			$row=array();
			$row['item']='Net Fixed Assets';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['NFA_'.$n]);
			}
			array_push($table,$row);
			$series[]='Net Fixed Assets';

			$row=array();
			$row['item']='Work In Progress';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($agData['WPL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Work In Progress';

			$row=array();
			$row['item']='Receivables';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['R_'.$n]);
			}
			array_push($table,$row);
			$series[]='Receivables';
			
			$row=array();
			$row['item']='Short term deposits';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['SDBL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Short term deposits';

			$row=array();
			$row['item']='Total';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['NFA_'.$n] + $agData['WPL_'.$n] + $coData['R_'.$n] + $cnData['SDBL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Total';

			$row=array();
			$row['item']='Equity and liabilities';
			$row['chart']=true;
			$row['css']='readonly1';
			array_push($table,$row);
			
			$row=array();
			$row['item']='Equity';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['NEOL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Equity';

			$row=array();
			$row['item']='Retained Earnings';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($cnData['AREL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Retained Earnings';

			$row=array();
			$row['item']='Bonds Outstanding';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['NBOL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Bonds Outstanding';

			$row=array();
			$row['item']='Net Loans Outstanding';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['NLOL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Net Loans Outstanding';

			$row=array();
			$row['item']='Consumer Deposits + Decommissioning Reserve';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['CDDFL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Consumer Deposits + Decommissioning Reserve';

			$row=array();
			$row['item']='Current Maturity';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['CML_'.$n]);
			}
			array_push($table,$row);
			$series[]='Current Maturity';

			$row=array();
			$row['item']='Total';
			$row['chart']=true;
			for($n = $startYear;$n <= $endYear; $n++){
				$row[$n]=formatnumber($coData['NFA_'.$n] + $agData['WPL_'.$n] + $coData['R_'.$n] + $cnData['SDBL_'.$n]);
			}
			array_push($table,$row);
			$series[]='Total';

			$results['result']=$table;
			$results['series']=$series;
			$results['allyears']=$AllYear;
			$results['unit']='Million';
        	echo (json_encode($results));
			break;

			case '1.4.'://Shareholders' Return
				$table= array();
				$series= array();
	
				$row=array();
				$row['item']='Initial equity';
				$row['chart']=true;
				$row[$startYear-1]=formatnumber($cdData['IE'])*-1;
				for($n = $startYear;$n <= $endYear; $n++){
					$row[$n]=formatnumber(0);
				}
				array_push($table,$row);
				$series[]='Initial equity';

				
				$row=array();
				$row['item']='Eq.Increase';
				$row['chart']=true;
				$row[$startYear-1]=formatnumber(0)*(-1);
				for($n = $startYear;$n <= $endYear; $n++){
					$row[$n]=formatnumber($cdData['N_'.$n]);
				}
				array_push($table,$row);
				$series[]='Eq.Increase';

				
				$row=array();
				$row['item']='Eq.Repayments';
				$row['chart']=true;
				$row[$startYear-1]=formatnumber(0);
				for($n = $startYear;$n <= $endYear; $n++){
					$row[$n]=formatnumber($cdData['E_'.$n]);
				}
				array_push($table,$row);
				$series[]='Eq.Repayments';

				$row=array();
				$row['item']='Dividend';
				$row['chart']=true;
				$row[$startYear-1]=formatnumber(0);
				for($n = $startYear;$n <= $endYear; $n++){
					$row[$n]=formatnumber($cnData['DivL_'.$n]);
				}
				array_push($table,$row);
				$series[]='Dividend';

				$row=array();
				$row['item']='Final disposal';
				$row['chart']=true;
				$row[$startYear-1]=formatnumber(0);
				for($n = $startYear;$n <= $endYear; $n++){
					$row[$n]=formatnumber($csData['FD_'.$n]);
				}
				array_push($table,$row);
				$series[]='Final disposal';
			
				$row=array();
				$row['item']='Total flow';
				$row['chart']=true;
				$row['css']="readonly1";
				$row[$startYear-1]=formatnumber($csData['TF_'.($startYear-1)]);
				for($n = $startYear;$n <= $endYear; $n++){
					$row[$n]=formatnumber($csData['TF_'.$n]);
				}
				array_push($table,$row);
				$series[]='Total flow';

				$row=array();
				$row['item']='Return on equity (%)';
				$row['chart']=false;
				$row[$startYear-1]=formatnumber(0);
				for($n = $startYear;$n <= $endYear; $n++){
					$row[$n]=formatnumber($csData['RE_'.$n]);
				}
				array_push($table,$row);

				$results=[];
				$results['result']=$table;
				$results['series']=$series;
				$results['allyears']=$AllYear;
				$results['unit']='Million';
				$results['npv']=$csData['NPV'];
				$results['irr']=$csData['IRR'];
				echo (json_encode($results));
				break;

				case "1.5."://Financial Ratios
					$table= array();
					$series= array();

					$row=array();
					$row1=array();
					$row['item']='Working capital';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R1_'.$n]);
						$row1[$n]=($ctData['R1S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Working capital';

					$row=array();
					$row1=array();
					$row['item']='Leverage';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R2_'.$n]);
						$row1[$n]=($ctData['R2S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Leverage';

					$row=array();
					$row1=array();
					$row['item']='Equipment renewal';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R3_'.$n]);
						$row1[$n]=($ctData['R3S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Equipment renewal';

					$row=array();
					$row1=array();
					$row['item']='Gross profit rate';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R4_'.$n]);
						$row1[$n]=($ctData['R4S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Gross profit rate';

					$row=array();
					$row1=array();
					$row['item']='Debt repayment time';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R5_'.$n]);
						$row1[$n]=($ctData['R5S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Debt repayment time';

					$row=array();
					$row1=array();
					$row['item']='Exchange risk';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R6_'.$n]);
						$row1[$n]=($ctData['R6S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Exchange risk';

					$row=array();
					$row1=array();
					$row['item']='Breakeven point';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R7_'.$n]);
						$row1[$n]=($ctData['R7S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Breakeven point';

					$row=array();
					$row1=array();
					$row['item']='Interest charge weight';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R8_'.$n]);
						$row1[$n]=($ctData['R8S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Interest charge weight';

					$row=array();
					$row['item']='Global index';
					$row['chart']=true;
					$row['css']='readonly';
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['GI_'.$n]);
					}
					array_push($table,$row);
					$series[]='Global index';

					$row=array();
					$row1=array();
					$row['item']='Self financing ratio';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R9_'.$n]);
						$row1[$n]=($ctData['R9S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Self financing ratio';

					$row=array();
					$row1=array();
					$row['item']='Debt equity ratio';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R10_'.$n]);
						$row1[$n]=($ctData['R10S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Debt equity ratio';

					$row=array();
					$row1=array();
					$row['item']='Debt service coverage';
					$row1['item']='';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R11_'.$n]);
						$row1[$n]=($ctData['R11S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='Debt service coverage';

					$row=array();
					$row1=array();
					$row['item']='ROR on rev assets';
					$row1['item']='';
				//	$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($ctData['R12_'.$n]);
						$row1[$n]=($ctData['R12S_'.$n]);
					}
					array_push($table,$row);
					array_push($table,$row1);
					$series[]='ROR on rev assets';
					

				$results=[];
				$results['result']=$table;
				$results['series']=$series;
				$results['allyears']=$AllYear;
				$results['unit']='Million';
				echo (json_encode($results));
				break;

				case "1.6.": //
					$table= array();
					$series= array();
					$row=array();
					$row['item']='Loans and bonds outstanding';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($coData['NBOL_'.$n] + $coData['NLOL_'.$n]);
					}
					array_push($table,$row);
					$series[]='Loans and bonds outstanding';

					$row=array();
					$row['item']='Cash available during loan term';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($crData['LT_'.$n]);
					}
					array_push($table,$row);
					$series[]='Cash available during loan term';

					$row=array();
					$row['item']='PV of cash available during loan term';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($crData['NT_'.$n]);
					}
					array_push($table,$row);
					$series[]='PV of cash available during loan term';

					$row=array();
					$row['item']='Maximum project finance during loan term';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($crData['MFLO_'.$n]);
					}
					array_push($table,$row);
					$series[]='Maximum project finance during loan term';
					
					$row=array();
					$row['item']='Cash available during project life';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($crData['LL_'.$n]);
					}
					array_push($table,$row);
					$series[]='Cash available during project life';

					$row=array();
					$row['item']='PV of cash available during project life';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($crData['NL_'.$n]);
					}
					array_push($table,$row);
					$series[]='PV of cash available during project life';

					$row=array();
					$row['item']='Maximum project finance during project life';
					$row['chart']=true;
					for($n = $startYear;$n <= $endYear; $n++){
						$row[$n]=formatnumber($crData['MFLi_'.$n]);
					}
					array_push($table,$row);
					$series[]='Maximum project finance during project life';


					$results=[];
					$results['result']=$table;
					$results['series']=$series;
					$results['allyears']=$AllYear;
					$results['unit']='Million';
					echo (json_encode($results));
					break;

}

	function formatnumber($number){
		if($number=="NAN" || $number=="INF" || $number=="n.a." || $number==""){
		$num=0.000000000000000;
	}else{
		if(is_nan($number)){
			$num=number_format(0,15,'.','');
		}else{
		$num=number_format((double)$number,15,'.','');
		}
	}
		return $num;
	}
	
	?>