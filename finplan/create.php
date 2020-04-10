<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	require_once(INCLUDE_PATH."/label.php");
	$currencies = Config::getData('currencies');
	$studyTypes = Config::getData('studytypes');

	
	include(TEMPLATE_PATH."create.tpl.php");
