<?php
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$plantTypes = Config::getData('planttypes');
	$productTypes = Config::getData('producttype');

	$caseStudyId = $_SESSION['cs']['id'];
	$title = 'Existing';

	switch($_REQUEST['plant']){
		default:
		case 'existing':
			$plant = 'existing';
			$title = 'Existing';
			$o = 'plant_data';
		break;
		case 'committed':
			$plant = 'committed';
			$title = 'Committed';
			$o = 'plant_data';
		break;
		case 'future':
			$plant = 'future';
			$title = 'Future';
			$o = 'plant_data';
		break;
	}
	$d = new XmlData($caseStudyId,$o);

	//if form is post
	switch($_REQUEST['a']){
		default:

		break;

		case 'a'://add
			$d->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."manage.php");
		break;

		case 'd':
			if(isset($_REQUEST['id'])){
				$ahData = $d->deleteById($_REQUEST['id']);
				redirectBrowser(HTTP_ROOT."manage.php");
			}
		break;

		case 'e': //edit
			if(isset($_REQUEST['id'])){
				$editFlag=true;
				$ahData = $d->getById($_REQUEST['id']);
			}
		break;

		case 'u'://update submitted
			if(isset($_REQUEST['id'])){
			$d->update($_POST['data']);
			redirectBrowser(HTTP_ROOT."manage.php");
			}
		break;
	}

	$data = $d->getAllbyField($title,'Status');


	include(TEMPLATE_PATH."manage.tpl.php");
