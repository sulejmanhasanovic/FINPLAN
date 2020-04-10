<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	$caseStudies = CaseStudy::getAllCaseStudies();
	require_once(INCLUDE_PATH."/label.php");
	//if form is post
	if(isset($_POST['action'])){
		$action = $_POST['action'];
		
		if($action == 's' && isset($_POST['caseStudyId'])){//select
			$mydir = PROJECT_DATA_FILE_PATH.sanitize_filename($_POST['caseStudyId']).'/';
			if (is_dir($mydir)){
				rrmdir($mydir);
			}
			redirectBrowser(HTTP_ROOT."delete.php");
		}else{ include(TEMPLATE_PATH."delete.tpl.php");
		}
	}else{
	include(TEMPLATE_PATH."delete.tpl.php");
	}

 function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
        } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
 } 
?> 