<?php
	include("./includes/common.php");
	require_once(SERVICES_PATH."/FinplanService.php");

	//ini_set('display_startup_errors', 1);
	//ini_set('display_errors', 1);
	//error_reporting(-1);



	$finplanService = new FinplanService($_SESSION['cs']['id']);
	$finplanService->runCalculations();

	redirectBrowser(HTTP_ROOT."report.php");
?>
