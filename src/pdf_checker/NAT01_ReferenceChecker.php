<?php

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa subbab dalam sebuah bab
	 * @author Marcell Trixie
	 */
	class NAT01_ReferenceChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($document){
			$array = explode(". ", $document);
			$result;
			foreach ($array as $row => $value) {
				$row = $row+1;
				if (preg_match("/\[\?\]/i", $value)) {
					$result = [
						"row     : $row",
						"error   : PDFLatex tidak dapat menerima referensi dengan baik",
						"excerpt : $value"
					];
					echo "\n";
					foreach ($result as $res) {
   						echo "$res \n";
					}
				}	
			}
		}

	}

?>