<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."/XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");

	$studyTypes = Config::getData('studytypes');

	$cg = 'geninf_data';
	$dc = new XmlCollection($caseStudyId,$cg);
	$ahData = $dc->getoneById();
	$apd = new XmlData($caseStudyId,'plant_data');
	$plant_data = $apd->getAll();

	$maxStartYear = 3000;
	foreach ($plant_data as $plant) {
		$minDiff = $plant["FOyear"] - $plant["CPeriod"];
		if ($minDiff < $maxStartYear) {
			$maxStartYear = $minDiff;
		}
	}

	//if form is post
	switch($_POST['a']){
		default:

		break;

		case 'a'://add
			$d->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."inflation.php");
		break;

		case 'd':
			if(isset($_REQUEST['id'])){
				$ahData = $d->deleteById($_REQUEST['id']);
			}
		break;

		case 'u'://update submitted
			$dc->update($_POST['data']);
			redirectBrowser(HTTP_ROOT."geninf.php");
		break;
	}

	include(TEMPLATE_PATH."geninf.tpl.php");
	?>
