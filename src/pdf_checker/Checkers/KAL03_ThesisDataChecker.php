<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa kelengkapan data skripsi
	 * @author Marcell Trixie
	 */
	class KAL03_ThesisDataChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$array = explode(". ", $pdf_extract->getCoverPage());
			foreach ($array as $row => $value) {
				$row = $row+1;
				$pattern = "/SKRIPSI\/TUGAS AKHIR|Judul Bahasa Indonesia|Nama Lengkap|10 digit NPM UNPAR|MATEMATIKA\/FISIKA\/TEKNIK INFORMATIKA|tahun/i";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"row" => $row,
						"error" => "Ada data skripsi yang belum dilengkapi",
						"excerpt" => $value
 					];
				}	
			}
			return $result;
		}

	}

?>