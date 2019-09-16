<?php

	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa penggunaan kata ganti orang
	 * @author Marcell Trixie
	 */
	class VAN03_SubjectPronounChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($document){
			$array = explode(". ", $document);
			$result;
			foreach ($array as $row => $value) {
				$row = $row+1;
				if (preg_match("/saya|kamu|dia+[\s|.,?!]/i", $value)) {
					$result = [
						"row     : $row",
						"error   : Kalimat ini mengandung kata ganti orang",
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