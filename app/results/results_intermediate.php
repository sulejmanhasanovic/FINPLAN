<?php
	require_once "../../config.php";
	require_once BASE_PATH."general.php";
	require_once CLASS_PATH."XmlData.php";
	require_once CLASS_PATH."Data.class.php";

	$results['startYear'] = $startYear;
	$results['endYear'] = $endYear;
	$results['baseCurrency'] = $baseCurrency;
	$results['curTypeSel'] = $curTypeSel;
	
	$bothCurr = $baseCurrency;
	$bothCurrBase = $baseCurrency;
	
	if($curTypeSel){
		$bothCurr = $curTypeSel.','.$baseCurrency;
		$bothCurrBase = $baseCurrency.','.$curTypeSel;
	}
	
	$results['bothCurr'] = $bothCurr;
	$results['bothCurrBase'] = $bothCurrBase;

    //Manage files
    switch($_REQUEST['id']){
		case '2.1.':
			$cad = new XmlData($caseStudyId,$caxml);
			$data = $cad->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
        	echo (json_encode($results));
		break;	
		
		case "1.2.": 
        	echo (json_encode($results));
		break;

		case '1.4.':
			echo (json_encode($results));
		break;

		case "1.5.":
			echo (json_encode($results));
		break;

		case "1.6.": 
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