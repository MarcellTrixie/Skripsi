<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa subbab dalam sebuah bab
	 * @author Marcell Trixie
	 */
	class PS09_SubChapterChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			$array = explode(". ", $pdf_extract->getContentPage());
			$result;
			foreach ($array as $row => $value) {
				$row = $row+1;
				$pattern = "/^[0-9].[0-9]\s[A-Za-z0-9]/";
				if (preg_match($pattern, $value)) {
					$result = [
						"row     : $row",
						"error   : Hanya terdapat 1 subbab saja, lebih baik tidak perlu dibuat subbab",
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