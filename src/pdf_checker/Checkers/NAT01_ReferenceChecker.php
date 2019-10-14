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
		public function errorChecking($pdf_extract){
			$array = explode(". ", $pdf_extract->getContentPage());
			foreach ($array as $row => $value) {
				$row = $row+1;
				$pattern = "/[?]/";
				if (preg_match($pattern, $value)) {
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