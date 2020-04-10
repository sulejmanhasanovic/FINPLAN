<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");


	$bld = new XmlData($caseStudyId,$blxml);


	switch($_POST['act']){
		default:

		break;

		case 'a'://add
			$bld->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."equity.php");
		break;

		case 'd':

		break;

		case 'e': //edit

		break;

		case 'u'://update submitted
			$ahData = $bld->deleteById($_POST['eid']);
			$bld->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."equity.php");

		break;
	}?>
