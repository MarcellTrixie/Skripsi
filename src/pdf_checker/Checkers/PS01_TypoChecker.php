<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa kesalahan penulisan kata
	 * @author Marcell Trixie
	 */
	class PS01_TypoChecker extends Checker{

		/**
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 * @param pdf_extract untuk memanggil method getter kelas Checker sesuai kebutuhan
		 * @return result[] laporan kesalahan yang ditemukan
		 */
		public function errorChecking($pdf_extract){
			$filename = __DIR__ . "/../../dictionary/id_iD/id_ID.dic";
			$file = fopen($filename, "r");
			$temp = explode("\n", fread($file,filesize($filename)));
			
			$dictionary = [];
			for ($i = 0; $i < sizeof($temp); $i++) {
    			$dictionary[$i] = preg_replace('/\/.*$/', '', $temp[$i]);
			}

			$word = preg_split("/[^A-Za-z]/", $pdf_extract->getContentPage());
			$typos = [];
			foreach ($word as $index => $value) {
				$row = $index+1;
				if (!in_array(strtolower($value), $dictionary) && !in_array($value, $typos)) {
					$typos[] = $value;
 				}	
 			}

			$result = [];
			if (sizeof($typos) > 0) {
				$result[] = [
					"Error Code" => "PS-01",
					"Note" => "Ditemukan penulisan kata yang tidak sesuai dengan kamus",
					"Excerpt" => implode(", ", $typos)
				];
			}
			return $result;
		}

	}

?>