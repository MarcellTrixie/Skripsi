<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * @author Marcell Trixie
	 */
	class PS05_CapitalLetterChecker extends Checker{
		
		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$array = explode(". ", $pdf_extract->getContentPage());
			foreach ($array as $index => $value) {
				$row = $index+1;
				$pattern = "/^(\s[a-z][a-z0-9].*)|^([a-z][a-z0-9].*)/";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"row" => $row,
						"error" => "Huruf pertama pada kalimat harus menggunakan huruf kapital",
						"excerpt" => $value
 					];
				}	
			}
			return $result;
		}

	}

?>