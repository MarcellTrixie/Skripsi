<?php

	include "PDFExtractor.php";

	$file = $argv[1];
	$pdfExtractor = new PDFExtractor();
	$pdfExtractor->extractPDF($file);
	$pdfExtractor->run();

?>