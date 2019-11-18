<?php

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa penggunaan spasi setelah tanda baca
	 * @author Marcell Trixie
	 */
	class PS03_SpaceChecker extends Checker{

		/**
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 * @param pdf_extract untuk memanggil method getter kelas Checker sesuai kebutuhan
		 * @return result[] laporan kesalahan yang ditemukan
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$sentence = $pdf_extract->splitContentPage();
			foreach ($sentence as $index => $value) {
				$pattern = "/[A-Za-z]{2,}[,.!?][A-Za-z]+/";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"Error Code" => "PS-03",
						"Note" => "Perhatikan spasi setelah tanda baca.",
						"Excerpt" => $value
 					];
				}
			}
			return $result;
		}

	}

?>