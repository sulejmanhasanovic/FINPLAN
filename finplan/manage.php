<?php
	require_once("./includes/common.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(MODELS_PATH."XmlData.php");
	include(DOC_ROOT_PATH."general.php");
	$plantTypes = Config::getData('planttypes');
	$productTypes = Config::getData('producttype');

	$cg = 'geninf_data';
	$dc = new XmlCollection($caseStudyId,$cg);
	$caseData = $dc->getoneById();

	//if form is post
	switch($_REQUEST['a']){
		default:

		break;

		case 'a'://add
			$apd->add($_POST['data']);
			redirectBrowser(HTTP_ROOT."manage.php");
		break;

		case 'd':
			if(isset($_REQUEST['id'])){
				$apd->deleteById($_REQUEST['id']);
				$aqd = new XmlData($caseStudyId,$aqxml);
				$aqd->deleteByField($_REQUEST['id'],'pid');
				$akd = new XmlData($caseStudyId,$akxml);
				$akd->deleteByField($_REQUEST['id'],'pid');
				$aod = new XmlData($caseStudyId,$aoxml);
				$aod->deleteByField($_REQUEST['id'],'pid');
				$ald = new XmlData($caseStudyId,$alxml);
				$ald->deleteByField($_REQUEST['id'],'pid');
				$amd = new XmlData($caseStudyId,$amxml);
				$amd->deleteByField($_REQUEST['id'],'pid');
				$and = new XmlData($caseStudyId,$anxml);
				$and->deleteByField($_REQUEST['id'],'pid');
				$bud = new XmlData($caseStudyId,$buxml);
				$bud->deleteByField($_REQUEST['id'],'pid');
				$asd = new XmlData($caseStudyId,$asxml);		// multiple records?
				$aud = new XmlData($caseStudyId,$auxml);
				$financeSources = Config::getData('financesource');
				for($c = 0; $c < count($allChunks); $c++){
					$fldid = $allChunks[$c].'_'.$_REQUEST['id'];
					$asd->deleteByField($fldid,'fid');
					foreach($financeSources as $financesource){
						$fldfid = $fldid.'_'.$financesource['id'];
						$aud->deleteByField($fldfid,'fid');
					}
				}
				redirectBrowser(HTTP_ROOT."manage.php");
			}
		break;

		case 'e': //edit
			if(isset($_REQUEST['id'])){
				$editFlag=true;
				$cg = 'geninf_data';
				$dc = new XmlCollection($caseStudyId,$cg);
				$ahData = $apd->getById($_REQUEST['id']);
				$caseData = $dc->getoneById();
			}
		break;

		case 'u'://update submitted
			if(isset($_REQUEST['id'])){
			$apd->update($_POST['data']);
			redirectBrowser(HTTP_ROOT."manage.php");
			}
		break;
	}

	$data = $apd->getAll();


	include(TEMPLATE_PATH."manage.tpl.php");
