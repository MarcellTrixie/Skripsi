<?php
	
	include "checker.php";

	/* 
	 * Sub class dari kelas Checker
	 * @author Marcell Trixie
	 */
	class CapitalLetterChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($document){
			if (preg_match("/^([A-Z].*\.)|(\.\s[A-Z].*\.)/", $document)) {
				echo "Ada kata yang tidak menggunakan huruf kapital pada awal kalimat \n";
			}
		}

	}

?>