<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * @author Marcell Trixie
	 */
	class PS05_CapitalLetterChecker extends Checker{
		
		/**
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 * @param pdf_extract untuk memanggil method getter kelas Checker sesuai kebutuhan
		 * @return result[] laporan kesalahan yang ditemukan
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$sentence = $pdf_extract->splitContentPage();
			foreach ($sentence as $index => $value) {
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