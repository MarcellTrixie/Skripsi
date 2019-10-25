<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa kesalahan penulisan kata
	 * @author Marcell Trixie
	 */
	class PS01_TypoChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			$filename = __DIR__ . "/../../dictionary/id_iD/id_ID.dic";
			$file = fopen($filename, "r");
			$dictionary = explode("\n", fread($file,filesize($filename)));
			$array = preg_split("/[^A-Za-z]/", $pdf_extract->getContentPage());
			$typos = [];
			foreach ($array as $index => $value) {
				$row = $index+1;
				if (!in_array(strtolower($value), $dictionary) && !in_array($value, $typos)) {
					$typos[] = $value;
 				}	
 			}
			$result = [];
			if (sizeof($typos) > 0) {
				$result[] = [
					"error" => "Pada baris ini ditemukan penulisan kata yang tidak sesuai dengan kamus",
					"excerpt" => implode(", ", $typos)
				];
			}
			return $result;
		}

	}

?>