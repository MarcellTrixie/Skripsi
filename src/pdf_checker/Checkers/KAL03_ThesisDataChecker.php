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
		public function errorChecking($document){
			$array = explode(". ", $document);
			$result;
			foreach ($array as $row => $value) {
				$row = $row+1;
				if (preg_match("/SKRIPSI\/TUGAS AKHIR|Judul Bahasa Indonesia|Nama Lengkap|10 digit NPM UNPAR|MATEMATIKA\/FISIKA\/TEKNIK INFORMATIKA|tahun/i", $value)) {
					$result = [
						"row     : $row",
						"error   : Ada data skripsi yang belum dilengkapi",
						"excerpt : $value"
					];
					echo "\n";
					foreach ($result as $res) {
   						echo "$res \n";
					}
				}	
			}
		}

	}

?>