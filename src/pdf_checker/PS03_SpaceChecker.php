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
		public function errorChecking($document){
			$array = explode(". ", $document);
			$result;
			foreach ($array as $row => $value) {
				$row = $row+1;
				if (preg_match("/([A-Za-z0-9]*[,.!?])/", $value)) {
					$result = [
						"row     : $row",
						"error   : Beri spasi setelah tanda baca",
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