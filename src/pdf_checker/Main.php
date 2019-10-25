<?php
	
	include "../vendor/autoload.php";
	require "Checker.php";
	include "SkripsiExtract.php";

	$file = $argv[1];
	$skripsi_extract = new SkripsiExtract();
	$skripsi_extract->extractFromPDF($file);

	$checkers = Checker::getAllCheckers();
	$all_errors = [];	

	foreach ($checkers as $checker) {
		$all_errors = array_merge($all_errors, $checker->errorChecking($skripsi_extract));
	}
	
	$counter = 1;
	foreach ($all_errors as $error) {
		echo "ERROR $counter\n";
		$counter++;
		foreach ($error as $key => $value) {
			echo "$key: $value\n";
		}
		echo "\n";	
	}

?>