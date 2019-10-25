<?php
	
	include_once "Checker.php";

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa kata pengantar sebelum subbab
	 * @author Marcell Trixie
	 */
	class KAL02_PrefaceChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$array = explode(". ", $pdf_extract->getContentPage());
			foreach ($array as $index => $value) {
				$row = $index+1;
				$pattern = "/^[A-Z0-9][A-Za-z]/";
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