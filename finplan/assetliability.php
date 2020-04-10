<?php
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");

	$aad = new XmlData($caseStudyId,$aaxml);
	$caData = $aad->getAll();
	foreach($caData as $row){
		$tid = $row['id'];
	}
	$ctData = $aad->getById($tid);

	switch($_POST['act']){
		default:

		break;

		case 'a'://add
			$aad->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."sale.php");
		break;

		case 'd':
			if(isset($_POST['id'])){
				$ctData = $aad->deleteById($_REQUEST['id']);
			}
		break;

		case 'e': //edit
			if(isset($_POST['id'])){
				$editFlag=true;
				$ctData = $aad->getById($_REQUEST['id']);
			}
		break;

		case 'u'://update submitted
			//$d->updates($_POST['data'],'pid');
			$ctData = $aad->deleteById($_POST['eid']);
			$aad->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."sale.php");

		break;
	}
		include(TEMPLATE_PATH."assetliability.tpl.php");	?>
