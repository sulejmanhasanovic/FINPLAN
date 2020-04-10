<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	include(DOC_ROOT_PATH."general.php");

	$studyTypes = Config::getData('studytypes');
	$startYear = $ahData['startYear'];
	$startYearChanged = false;

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
			$datas = $_POST['data'];
			$ForCur = $datas['CurTypeSel'];
			if ($datas['startYear'] != $startYear) $startYearChanged = true;
			for($i = 0; $i < count($CurChunks); $i++){
				if((substr_count($ForCur,$CurChunks[$i]))==1){
					continue;
				}else{
					$aud = new XmlData($caseStudyId,$auxml);
					$asd = new XmlData($caseStudyId,$asxml);
					while ($aud->getByField($CurChunks[$i],'Currency'))// delete from termfinance
					{
						$aud->deleteByField($CurChunks[$i],'Currency');
					}
					while ($asd->getByField($CurChunks[$i],'cid'))// delete from Sourcefinance
					{
						$asd->deleteByField($CurChunks[$i],'cid');
					}

				}
			}
			$dc->update($_POST['data']);
			if (!$startYearChanged) {
				redirectBrowser(HTTP_ROOT."geninf.php");
			} else {
				redirectBrowser(HTTP_ROOT."geninf.php?startChanged=yes");
			}
		break;
	}

	include(TEMPLATE_PATH."geninf.tpl.php");
	?>
