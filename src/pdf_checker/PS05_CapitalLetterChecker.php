<?php

	include "Checker.php";

	/* 
	 * Sub class dari kelas Checker
	 * @author Marcell Trixie
	 */
	class PS05_CapitalLetterChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($document, $page){
			$array = explode(". ", $document);
			foreach ($array as $row => $value) {
				$row = $row+1;
				if (preg_match("/^(\s[^A-Z][a-z].*)|^([^A-Z][a-z].*)/", $value)) {
					$result = [
						"page    : $page",
						"row     : $row",
						"error   : Huruf pertama pada kalimat harus menggunakan huruf kapital",
						"excerpt : $value"
					];
					echo "\n\n";
					foreach ($result as $res) {
   						echo "$res \n";
					}
				}	
			}
		}

	}

?>