	<?php
	if(!isset($_SESSION['cs'])){
		redirectBrowser(HTTP_ROOT.'begin.php');
	}
	$caseStudyId = $_SESSION['cs']['id'];
	$caseId = '1';
	$gen_file = 'geninf_data';
	$d = new XmlData($caseStudyId,$gen_file);
	$ahData = $d->getById($caseId);
	?>