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
				$row = $index+1;
				$pattern = "/([A-Za-z]*[,.!?][A-Za-z])/";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"Error Code" => "PS-03",
						"Row" => $row,
						"Note" => "Perhatikan spasi sebelum atau setelah tanda baca.",
						"Excerpt" => $value
 					];
				}
			}
			return $result;
		}

	}

?>