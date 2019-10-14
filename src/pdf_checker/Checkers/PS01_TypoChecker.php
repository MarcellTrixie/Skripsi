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
			$file = fopen("../../dictionary/id_iD/id_ID.dic", "r");
			$dictionary = explode("\n", fread($myfile,filesize("id_ID.dic")));
			$array = explode(" ", $pdf_extract->getContentPage());
			
			foreach ($array as $row => $value) {
				$row = $row+1;
				$pattern;
				if (preg_match($pattern, $value)) {
					$result = [
						"row     : $row",
						"error   : Terdapat kata yang tidak sesuai dengan KBBI",
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