<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * @author Marcell Trixie
	 */
	class SpaceChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($document){
			if (preg_match("/([A-Za-z0-9].*[,.!?]\s)|([,.!?]\s[A-Za-z0-9])/", $document)) {
				echo "Setelah tanda baca harus ada spasi \n";
			}
		}

	}

?>