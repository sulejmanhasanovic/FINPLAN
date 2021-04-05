<?php
	include("../../config.php");
	require_once("FinplanService.php");

	//ini_set('display_startup_errors', 1);
	//ini_set('display_errors', 1);
	//error_reporting(-1);
	$finplanService = new FinplanService($_SESSION['cs']['id']);
	$finplanService->runCalculations();
?>
