<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");


	$bsd = new XmlData($caseStudyId,$bsxml);

	switch($_POST['act']){
		default:

		break;

		case 'a'://add
			$bsd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."conscontrib.php");
		break;

		case 'd':

		break;

		case 'e': //edit

		break;

		case 'u'://update submitted
			$ahData = $bsd->deleteById($_POST['eid']);
			$bsd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."conscontrib.php");

		break;
	}?>
