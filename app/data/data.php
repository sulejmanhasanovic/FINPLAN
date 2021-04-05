<?php
require_once "../../config.php";
require_once CLASS_PATH."Data.class.php";
require_once CLASS_PATH."XmlCollection.php";
require_once CLASS_PATH."XmlData.php";
require_once BASE_PATH."general.php";

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

$results['casestudyid'] = $caseStudyId;
$results['user_path'] = USER_CASE_PATH;

if(file_exists(USER_CASE_PATH.$caseStudyId."/datanotes.json"))
    $dataNotes= json_decode(file_get_contents(USER_CASE_PATH.$caseStudyId."/datanotes.json"), true);

$action = $_REQUEST['action'];
$id = $_REQUEST['id'];
$results['datanotes']=$dataNotes[$id];
$currencies = Config::getData('currencies');
$results['currencies']=$currencies;
switch ($id)
{
    case 'general_information':
        $studyTypes = Config::getData('studytypes');
        $cg = 'geninf_data';
        $dc = new XmlCollection($caseStudyId,$cg);
        $ahData = $dc->getoneById();
        $apd = new XmlData($caseStudyId,'plant_data');
        $plant_data = $apd->getAll();
        $results['plantdata']=$plant_data;
        $results['studtype']=$studyTypes;
        $results['geninf']=$ahData;
        $results['currencies']=$currencies;
    break;

    case 'general_inflation':
        $xml = new Data($caseStudyId, $ajxml);
        if ($action == 'get')
        {
            $ceData = $xml->getByField(1, 'sid');
            $results['ceData'] = $ceData;
        }
    break;

    case 'general_exchangerate':
        $xml = new Data($caseStudyId, $aixml);
        if ($action == 'get')
        {
            $ceData = $xml->getByField(1, 'sid');
            $results['ceData'] = $ceData;
        }
    break;

    case 'taxation_depreciation':
        $TaxType = Config::getData('TaxType');
        $xml = new Data($caseStudyId, $atxml);
        if ($action == 'get')
        {
            $caData = $xml->getRow();
            $results['caData'] = $caData;
            $results['TaxType']=$TaxType;
        }
    break;

    case 'taxation_royalty':
        $xml = new Data($caseStudyId, $btxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'financialmanager_equity':
        $xml = new Data($caseStudyId, $blxml);
        $aad = new Data($caseStudyId,$aaxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1, 'sid');
            $results['ctData'] = $ctData;

            $aaData = $aad->getByField('1','sid');	
            $results['aaData'] = $aaData;
        }
    break;

    case 'financialmanager_loans':
        $xml = new Data($caseStudyId,$loans_data);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'financialmanager_bonds':
        $xml = new Data($caseStudyId,$bmxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'financialmanager_other':
        $bod = new XmlData($caseStudyId,$boxml);
        $cqd = new XmlData($caseStudyId,$cqxml);
        $bnd = new XmlData($caseStudyId,$bnxml);

        if($action=="get"){           
            $cfData = $bod->getByfield(1,'sid');
            $sfData = $cqd->getByfield(1,'sid');
            $bnData = $bnd->getByField(1,'sid');//balace data
            $results['cfData']=$cfData;
            $results['sfData']=$sfData;
            $results['bnData']=$bnData;
        }
    break;

    //case data    
    case 'taxation_royalty':
        $xml = new Data($caseStudyId,$btxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'balancesheet_initial':
        $xml = new Data($caseStudyId,$aaxml);
        if ($action == 'get')
        {
            $ctData = $xml->getRow();
            $results['ctData'] = $ctData;
        }
    break;

    case 'balancesheet_investment':
        $xml = new Data($caseStudyId,$brxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'balancesheet_oldloans':
        $xml = new Data($caseStudyId,$bvxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'balancesheet_oldbonds':
        $xml = new Data($caseStudyId,$bxxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'sales_consumers':
        $xml = new Data($caseStudyId,$bsxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'sales_revenues':
        $xml = new Data($caseStudyId,$cuxml);
        if ($action == 'get')
        {
            $ctData = $xml->getByField(1,'sid');
            $results['ctData'] = $ctData;
        }
    break;

    case 'sales_salepurchasedetail':
        $salepurchaseid=$_COOKIE['salepurchaseid'];
        $productTypes = Config::getData('producttype');
        $results['producttypes']=$productTypes;
        $results['id']=$salepurchaseid;

        $typesp=$_COOKIE['typesp'];
        $xmlfile=$azxml;
        if($typesp=="sales_purchase"){
	        $xmlfile=$arxml;
        }

        $xml = new XmlData($caseStudyId,$xmlfile);

        if($salepurchaseid>0){
            $data = $xml->getById($salepurchaseid);
            $results['data'] = $data;
        }

    break;

    case 'plant_general':
        $productTypes = Config::getData('producttype');
        $apd = new XmlData($caseStudyId,$apxml);
        $plantid=$_COOKIE['plantid'];
        $results['producttypes']=$productTypes;
        $data = $apd->getById($plantid);
        $results['data']=$data;
    break;

    case 'plant_production':
        $productTypes = Config::getData('producttype');
        $apd = new XmlData($caseStudyId,$apxml);
        $xml = new XmlData($caseStudyId,$aqxml);
        $plantid=$_COOKIE['plantid'];
        if ($action == 'get')
        {
            $ceData = $apd->getById($plantid);
            $cfData = $xml->getByfield($plantid,'pid');
            $data = $apd->getAll();
            $results['ceData']=$ceData;
            $results['cfData']=$cfData;
            $results['data']=$data;
            $results['id']=$plantid;
        }
        $results['producttypes']=$productTypes;

        break;

        case 'plant_omcosts':
            $productTypes = Config::getData('producttype');
            $apd = new XmlData($caseStudyId,$apxml);
            $xml = new XmlData($caseStudyId,$aoxml);
            $plantid=$_COOKIE['plantid'];
            if ($action == 'get')
            {
                $ceData = $apd->getById($plantid);
				$cfData = $xml->getByField($plantid,'pid');
                $data = $apd->getAll();
                $results['ceData']=$ceData;
                $results['cfData']=$cfData;
                $results['data']=$data;
                $results['id']=$plantid;
            }
            $results['producttypes']=$productTypes;
    
            break;

            case 'plant_fuelcosts':
                $productTypes = Config::getData('producttype');
                $apd = new XmlData($caseStudyId,$apxml);
                $xml = new XmlData($caseStudyId,$amxml);
                $plantid=$_COOKIE['plantid'];
                if ($action == 'get')
                {
                    $ceData = $apd->getById($plantid);
                    $cfData = $xml->getByField($plantid,'pid');
                    $data = $apd->getAll();
                    $results['ceData']=$ceData;
                    $results['cfData']=$cfData;
                    $results['data']=$data;
                    $results['id']=$plantid;
                }
                $results['producttypes']=$productTypes;
        
                break;

                case 'plant_generalexpenses':
                    $productTypes = Config::getData('producttype');
                    $apd = new XmlData($caseStudyId,$apxml);
                    $xml = new XmlData($caseStudyId,$buxml);
                    $plantid=$_COOKIE['plantid'];
                    if ($action == 'get')
                    {
                        $ceData = $apd->getById($plantid);
                        $cfData = $xml->getByField($plantid,'pid');
                        $data = $apd->getAll();
                        $results['ceData']=$ceData;
                        $results['cfData']=$cfData;
                        $results['data']=$data;
                        $results['id']=$plantid;
                    }
                    $results['producttypes']=$productTypes;
                break;

                case 'plant_investments':
                    $productTypes = Config::getData('producttype');
                    $apd = new XmlData($caseStudyId,$apxml);
                    $xml = new XmlData($caseStudyId,$anxml);
                    $plantid=$_COOKIE['plantid'];
                    if ($action == 'get')
                    {
                        $ceData = $apd->getById($plantid);
                        $cfData = $xml->getByField($plantid,'pid');
                        $data = $apd->getAll();
                        $results['ceData']=$ceData;
                        $results['cfData']=$cfData;
                        $results['data']=$data;
                        $results['id']=$plantid;
                    }
                    $results['producttypes']=$productTypes;
                break;

                case 'plant_depdec':
                    $productTypes = Config::getData('producttype');
                    $apd = new XmlData($caseStudyId,$apxml);
                    //depreciation
                    $dep = new XmlData($caseStudyId,$alxml);
                    //decommissioning
                    $dec = new XmlData($caseStudyId,$akxml);

                    $plantid=$_COOKIE['plantid'];
                    if ($action == 'get')
                    {
                        $ceData = $apd->getById($plantid);
                        $cfDataDep = $dep->getByField($plantid,'pid');
                        $cfDataDec = $dec->getByField($plantid,'pid');
                        $results['ceData']=$ceData;
                        $results['cfDataDep']=$cfDataDep;
                        $results['cfDataDec']=$cfDataDec;
                        $results['id']=$plantid;
                    }
                    $results['producttypes']=$productTypes;
                break;

                case 'plant_sources':
                    $plantid=$_COOKIE['plantid'];
                    $curr=$_COOKIE['curr'];
                    $fid=$curr;
                    $fid .= '_';
				    $fid .= $plantid;
                    $financeSources = Config::getData('financesource');
                    $apd = new XmlData($caseStudyId,$apxml);
                    $and = new XmlData($caseStudyId,$anxml);
                    $asd = new XmlData($caseStudyId,$asxml);
                    $add = new XmlData($caseStudyId,$adxml);

                    if ($action == 'get')
                    {
                        $ceData = $apd->getById($plantid);
                      //  $ciData = $and->getById($_REQUEST['id']);
                        $cfData = $asd->getByField($fid,'fid');
                        $results['financesources']=$financeSources;
                        $results['ceData']=$ceData;
                      //  $results['ciData']=$ciData;
                        $results['cfData']=$cfData;
                        $results['id']=$plantid;
                    }
                break;


}

if ($action == 'edit')
{
    if($_POST["idaction"]=="general_information"){
        $cg = 'geninf_data';
        $dc = new XmlCollection($caseStudyId,$cg);
        $currencies = Config::getData('currencies');
			$currSel=explode(",", $_POST["CurTypeSel"]);
			array_shift($currSel);
			for($a=0; $a<count($currSel); $a++){
				if($currSel[$a]!=="")
				$key = searchForId($currSel[$a], $currencies);
				$currSelId[]=$key;
			}
			$currSelImplode=implode(",",$currSelId);
			$_POST["CurTypeSel"]=$currSelImplode;
            unset($_POST['action']);
            unset($_POST['idaction']);
			$dc->update($_POST);
			if ($_POST["studyName"] != $caseStudyId)
			{
				rename(USER_CASE_PATH . $caseStudyId, USER_CASE_PATH . $_POST["studyName"]);
				setcookie("titlecs", USER_CASE_PATH . $_POST["studyName"], time() + (86400 * 30) , "/");
			}
    }
    if($id=="financialmanager_other"){
        $bod->deleteById($_POST['other']['id']);
        unset($_POST['other']['id']);
        $bod->add($_POST['other']);	

        $cqd->deleteById($_POST['shareholders']['id']);
        unset($_POST['shareholders']['id']);
        $cqd->add($_POST['shareholders']);

        $bnd->deleteById($_POST['terms']['id']);
        unset($_POST['terms']['id']);
        $bnd->add($_POST['terms']);	
    }else{
        $xml->deleteByField(1, 'sid');
        $xml->add(json_decode($_POST['data'], true));
    
        $dataNotes[$id]=$_POST['datanotes'];
        $json_data = json_encode($dataNotes);
        file_put_contents(USER_CASE_PATH.$caseStudyId."/datanotes.json", $json_data);
    }

}
else
{
    echo (json_encode($results));
}

function searchForId($id, $array) {
    foreach ($array as $key => $val) {
        if ($val['value'] === $id) {
            return $val['id'];
        }
    }
    return null;
 }
?>
