<?php
	
	include "../vendor/autoload.php";
	include "PDFExtractor.php";

	$file = $argv[1];
	$skripsi_extract = new SkripsiExtract();
	$skripsi_extract->extractFromPDF($file);

	$checkers = Checker::getAllCheckers();
	$all_errors = [];			
	for ($checkers as $checker) {
		array_push($all_errors, $checker->errorChecking($skripsi_extract));
	}
	foreach ($all_errors as $error) {
		echo $error;
	}

?>