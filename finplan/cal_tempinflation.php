<?php
require_once("./includes/common.php");
require_once(MODELS_PATH."XmlData.php");
require_once(INCLUDE_PATH."/Config.class.php");
require_once(MODELS_PATH."/CaseStudy.php");
include(DOC_ROOT_PATH."general.php");
$currencies = Config::getData('currencies');
$financeSources = Config::getData('financesource');

$filedir = PROJECT_DATA_FILE_PATH.$caseStudyId.'/result/';

if (!is_dir($filedir)) { // added code to add result directory
	mkdir($filedir,0777);
	}
$ad = $filedir.$adxml.'.xml';
if(is_file($ad)){//if does not exists create one
	unlink($ad);
}
//******* Cal Inflation ********************************//

$in_add = new XmlData($caseStudyId,$adxml);
$ajd = new XmlData($caseStudyId,$ajxml);

$in_cajData = $ajd->getAll();// get all data for inflation

foreach($in_cajData as $in_row){ //get the id of inflation data
	$in_eid = $in_row['id'];
	 }

$in_cajData = $ajd->getById($in_eid); //get data for the id
$in_startyear = $ahData['startYear']; // set value of start year to variable
$in_LIX[$in_startyear-1]=1; // set start year inflation index to 1

$in_data['sid']=1; // set the sid to 1 for storing infl index
for($in_c = 0; $in_c < count($allChunks); $in_c++){// loop to get each currency id
	$in_CX = $allChunks[$in_c];// get currency id 
	$in_rtype = 'RateType'.$in_CX;
	$in_inftype = $in_cajData[$in_rtype];// get the inflation type given by user
	for($in_i=$in_startyear;$in_i <= $ahData['endYear']; $in_i++){
		if($in_inftype =="SR"){ //if steady change
			$in_VX = 'SteadyInf_'.$in_CX; 
			$in_LIF[$in_i] = $in_cajData[$in_VX];
			$in_LX = $in_CX.'_'.$in_i;
		}elseif($in_inftype =="YR"){ // if Year rate change
			$in_LX = $in_CX.'_'.$in_i;
			if($in_cajData[$in_LX] ==''){
				$in_LIF[$in_i] = $in_LIF[$in_i-1] ;
			}else{
				$in_LIF[$in_i] = $in_cajData[$in_LX];
			}	
			
		}
		$in_LIX[$in_i] = $in_LIX[$in_i-1] * (1 + $in_LIF[$in_i] / 100); 
		$in_LIX[$in_startyear]=1;
		  
		$in_INF = 'I_'.$in_LX;
		$in_data[$in_INF]=$in_LIF[$in_i];
		$in_data[$in_LX]=$in_LIX[$in_i];
	}
	
}
$in_add->add($in_data);
redirectBrowser(HTTP_ROOT."ecncur.php");
?>