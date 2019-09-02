<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * @author Marcell Trixie
	 */
	class SubjectPronounChecker extends Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($document){
			if (preg_match("/saya|kamu|dia+[\s|.]/i", $document)) {
				echo "Tidak boleh menggunakan kata ganti orang \n";
			}
		}

	}

?>