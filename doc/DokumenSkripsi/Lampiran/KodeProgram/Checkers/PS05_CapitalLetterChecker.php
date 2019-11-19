<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa penggunaan huruf kapital pada karakter awal kalimat
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
				$pattern = "/^[a-z]+ | [a-z]+\.[a-z]/";
				if (preg_match($pattern, $value)) {
					if(preg_match("/^\W/", $value)){
						continue;
					}
					else{
						$result[] = [
							"Error Code" => "PS-05",
							"Note" => "Huruf pertama pada kalimat ini tidak menggunakan huruf kapital",
							"Excerpt" => $value									
 						];
 					}
				}	
			}
			return $result;
		}

	}

?>