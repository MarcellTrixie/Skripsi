<?php

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa penggunaan spasi setelah tanda baca
	 * @author Marcell Trixie
	 */
	class PS03_SpaceChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$array = explode(". ", $pdf_extract->getContentPage());
			foreach ($array as $index => $value) {
				$row = $index+1;
				$pattern = "/([A-Za-z0-9]*[,.!?][A-Za-z0-9])/";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"row" => $row,
						"error" => "Beri spasi setelah tanda baca",
						"excerpt" => $value
 					];
				}	
			}
			return $result;
		}

	}

?>