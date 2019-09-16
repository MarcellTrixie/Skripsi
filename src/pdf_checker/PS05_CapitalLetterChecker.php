<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * @author Marcell Trixie
	 */
	class PS05_CapitalLetterChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($document){
			$array = explode(". ", $document);
			foreach ($array as $row => $value) {
				$row = $row+1;
				if (preg_match("/^(\s[a-z][a-z0-9].*)|^([a-z][a-z0-9].*)/", $value)) {
					$result = [
						"row     : $row",
						"error   : Huruf pertama pada kalimat harus menggunakan huruf kapital",
						"excerpt : $value"
					];
					echo "\n\n";
					foreach ($result as $res) {
   						echo "$res \n";
					}
				}	
			}
		}

	}

?>