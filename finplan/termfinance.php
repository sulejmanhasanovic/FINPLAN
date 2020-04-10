<?php
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");

	$financeSources = Config::getData('financesource');

	$asd = new XmlData($caseStudyId,$asxml);
	$and = new XmlData($caseStudyId,$anxml);
	$aud = new XmlData($caseStudyId,$auxml);

	switch($_REQUEST['a']){
		default:

		break;

		case 'a'://add
			$e->add($_POST['data']);
		break;

		case 'd':
			if(isset($_REQUEST['id'])){
				$aud->deleteById($_REQUEST['id']);
				redirectBrowser(HTTP_ROOT."termfinance.php?fs=".$_REQUEST['fs']);

			}
		break;

		case 'e': //edit
				$fid = $_REQUEST['cur'].'_'.$_REQUEST['pid'].'_'.$_REQUEST['fs'];
				$cpData = $apd->getById($_REQUEST['pid']);
				$cfData = $asd->getById($_REQUEST['id']);
				$ciData = $and->getByField($_REQUEST['pid'],'pid');
				//$ctData = $aud->getByField($_REQUEST['fs'],'Name');
				$ctData = $aud->getByField($fid,'fid');
		break;

		case 'u'://update submitted
			if(isset($_REQUEST['id'])){
			$e->update($_POST['data']);
			}
		break;
	}

	$data = $asd->getAll();

	include(TEMPLATE_PATH."termfinance.tpl.php"); ?>
