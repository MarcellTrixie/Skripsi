<?php
	
	include "PS01_TypoChecker.php";
	include "PS03_SpaceChecker.php";
	include "PS05_CapitalLetterChecker.php";
	include "PS09_SubChapterChecker.php";
	include "KAL02_PrefaceChecker.php";
	include "KAL03_ThesisDataChecker.php";
	include "NAT01_ReferenceChecker.php";
	include "VAN03_SubjectPronounChecker.php";

	/* 
	 * Kelas Parent untuk seluruh checker
	 * @author Marcell Trixie
	 */
	class Checker{

		/* 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 */
		public function errorChecking($pdf_extract){
			
		}

		/**
		 * Mendapatkan seluruh checkers yang tersedia
		 * @return Checkers[] seluruh checker yang bisa dipakai
		 */
		public static function getAllCheckers() {
			return [
				new PS01_TypoChecker(),
				new PS03_SpaceChecker(),
				new PS05_CapitalLetterChecker(),
				new PS09_SubChapterChecker(),
				new KAL03_ThesisDataChecker(),
				new NAT01_ReferenceChecker(),
				new VAN03_SubjectPronounChecker()
			]
		}

	}

?>