<?php
	
	include_once "Checker.php";

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa kata pengantar sebelum subbab
	 * @author Marcell Trixie
	 */
	class KAL02_PrefaceChecker extends Checker{

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
				$pattern = "/^[A-Z]{3}[0-9]{1}.*/";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"row" => $row,
						"error" => "Berilah kata pengantar pada bab atau subbab",
						"excerpt" => $value
 					];
				}	
			}
			return $result;
		}

	}

?>