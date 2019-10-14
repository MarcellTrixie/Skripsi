<?php

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa penggunaan kata ganti orang
	 * @author Marcell Trixie
	 */
	class VAN03_SubjectPronounChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			$array = explode(". ", $pdf_extract->getContentPage());
			$result;
			foreach ($array as $row => $value) {
				$row = $row+1;
				$pattern = "/saya|kamu|dia/i";
				if (preg_match($pattern, $value)) {
					$result = [
						"row     : $row",
						"error   : Kalimat ini mengandung kata ganti orang",
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