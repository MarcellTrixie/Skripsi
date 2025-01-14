<?php

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa penggunaan kata ganti orang
	 * @author Marcell Trixie
	 */
	class VAN03_SubjectPronounChecker extends Checker{

		/**
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 * @param pdf_extract untuk memanggil method getter kelas Checker sesuai kebutuhan
		 * @return result[] laporan kesalahan yang ditemukan
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$sentence = $pdf_extract->splitContentPage();
			foreach ($sentence as $index => $value) {
				$pattern = "/\bsaya\b | \bkamu\b | \bdia\b/i";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"Error Code" => "VAN-03",
						"Note" => "Kalimat ini mengandung kata ganti orang",
						"Excerpt" => $value									
 					];
				}	
			}
			return $result;
		}

	}

?>