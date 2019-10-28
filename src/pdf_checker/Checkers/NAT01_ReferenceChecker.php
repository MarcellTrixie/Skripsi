<?php

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa subbab dalam sebuah bab
	 * @author Marcell Trixie
	 */
	class NAT01_ReferenceChecker extends Checker{

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
				$pattern = "/[?]/";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"row" => $row,
						"error" => "PDFLatex tidak dapat menerima referensi dengan baik",
						"excerpt" => $value
 					];
				}	
			}
			return $result;
		}


	}

?>