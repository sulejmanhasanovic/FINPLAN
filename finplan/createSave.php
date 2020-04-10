<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	$currencies = Config::getData('currencies');
	$studyTypes = Config::getData('studytypes');

	//if form is post

	if(isset($_POST['action'])){
		$filename = sanitize_filename($_POST['data']['studyName']);
		$directory_path = PROJECT_DATA_FILE_PATH.$filename;

		if ($filename === '' or file_exists($directory_path)) {
		  // ask for different name
		  $_POST['filename_ok'] = "no";
		  redirectBrowser(HTTP_ROOT."create.php");
		}

		$caseStudy = new CaseStudy($_POST['data']['studyName']);
		$caseStudy->save($_POST['data']);
		$_SESSION['cs'] = $_POST['data'];
		$_SESSION['cs']['id'] = $_POST['data']['studyName'];
		redirectBrowser(HTTP_ROOT."inflation.php");
	} else {
		$data['studyName'] = $_SESSION['cs_name'];
		redirectBrowser(HTTP_ROOT."create.php");
	}
