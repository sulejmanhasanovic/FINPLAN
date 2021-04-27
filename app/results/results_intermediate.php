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

	$currencies = Config::getData('currencies');
	$results['currencies']=$currencies;
	$results['tableid']=$_REQUEST['id'];
    //Manage files
    switch($_REQUEST['id']){
		case "1.1.":
			$aad = new XmlData($caseStudyId,$aaxml);
			$aaData = $aad->getAll();
			foreach($aaData as $row){
				$tid = $row['id'];
			}
			
			$cod = new XmlData($caseStudyId,$coxml);
			$coData = $cod->getByField('1','sid');
			
			$cad = new XmlData($caseStudyId,$caxml);
			$caData = $cad->getByField(1,'sid');
			
			$cbd = new XmlData($caseStudyId,$cbxml);
			$cbData = $cbd->getByField(1,'sid');

			$data = $aad->getById($tid);
			$results['allyears']=$AllYear;
			$results['results']=$data;
			$results['caData']=$caData;
			$results['cbData']=$cbData;
			$results['coData']=$coData;
        	echo (json_encode($results));
			break;
		case '2.1.':
		case '2.2.':
			$cad = new XmlData($caseStudyId,$caxml);
			$data = $cad->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
        	echo (json_encode($results));
		break;	
		
		case "3.1.":
		case "3.2.":
			$cbd = new XmlData($caseStudyId,$cbxml);
			$data = $cbd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
        	echo (json_encode($results));
		break;

		case '4.1.':
			$add = new XmlData($caseStudyId,$adxml);
			$data = $add->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
			echo (json_encode($results));
		break;

		case "4.2.":
			$acd = new XmlData($caseStudyId,$acxml);
			$data = $acd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
			echo (json_encode($results));
		break;

		case "5.1.": 
			$agd = new XmlData($caseStudyId,$agxml);
			$data = $agd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
        	echo (json_encode($results));
		break;

		case "5.2.": 
		case "5.3.": 
			$cnd = new XmlData($caseStudyId,$cnxml);
			$data = $cnd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
        	echo (json_encode($results));
		break;

		case "6.1.":
			$_loans = new XmlData($caseStudyId,$loans_data);
			$_cal_loans = new XmlData($caseStudyId,$cal_loans);

			$data = $_loans->getByField(1,'sid');
			$datacal=$_cal_loans->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
			$results['resultscal']=$datacal;
        	echo (json_encode($results));
		break;

		case "6.3.":
		case "6.4.":
			$cid = new XmlData($caseStudyId,$cixml);
			$data = $cid->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
        	echo (json_encode($results));
		break;

		case "7.1.":
		case "7.2.":
			$ccd = new XmlData($caseStudyId,$cixml);
			$data = $ccd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
        	echo (json_encode($results));
		break;

		case "8.2.":
			$financeSources = Config::getData('financesource');
			$bqd = new XmlData($caseStudyId,$bqxml);
			$data = $bqd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
			$results['financesources']=$financeSources;
        	echo (json_encode($results));
		break;

		case "8.3.":
		case "8.4.":
		case "8.5.":
			$financeSources = Config::getData('financesource');
			$chd = new XmlData($caseStudyId,$chxml);
			$data = $chd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
			$results['financesources']=$financeSources;
        	echo (json_encode($results));
		break;

		case "9.1.":
			$cdd = new XmlData($caseStudyId,$cdxml);
			$data = $cdd->getByField(1,'sid');
			$cnd = new XmlData($caseStudyId,$cnxml);
			$datacn = $cnd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
			$results['resultscn']=$datacn;
        	echo (json_encode($results));
		break;

		case "10.1.":
			$cld = new XmlData($caseStudyId,$clxml);
			$datacl = $cld->getByField(1,'sid');
			$ctd = new XmlData($caseStudyId,$ctxml);
			$data = $ctd->getByField(1,'sid');
			$results['allyears']=$AllYear;
			$results['results']=$data;
			$results['resultscl']=$datacl;
        	echo (json_encode($results));
		break;

		case "10.2.":
			$cad = new XmlData($caseStudyId,$caxml);
			$caData = $cad->getByField(1,'sid');
			$cbd = new XmlData($caseStudyId,$cbxml);
			$cbData = $cbd->getByField(1,'sid');
			$ccd = new XmlData($caseStudyId,$ccxml);
			$ccData = $ccd->getByField(1,'sid');
			$chd = new XmlData($caseStudyId,$chxml);
			$chData = $chd->getByField(1,'sid');
			$cdd = new XmlData($caseStudyId,$cdxml);
			$cdData = $cdd->getByField(1,'sid');
			$cid = new XmlData($caseStudyId,$cixml);
			$ciData = $cid->getByField(1,'sid');
				
			$cld = new XmlData($caseStudyId,$clxml);
			$clData = $cld->getByField(1,'sid');

			$results['allyears']=$AllYear;
			$results['caData']=$caData;
			$results['cbData']=$cbData;
			$results['ccData']=$ccData;
			$results['cdData']=$cdData;
			$results['chData']=$chData;
			$results['ciData']=$ciData;
			$results['clData']=$clData;
        	echo (json_encode($results));
		break;
		
	}

	?>