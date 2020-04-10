<?php
// for PROJECT_DATA_FILE_PATH and redirectBrowser
require_once("./includes/common.php");

// for $caseStudyId
include(DOC_ROOT_PATH."general.php");

array_map("unlink", glob(PROJECT_DATA_FILE_PATH.sanitize_filename($caseStudyName).'/result/cal_*.xml'));

redirectBrowser(HTTP_ROOT.'cal_calculations.php');	
	
?>	
	