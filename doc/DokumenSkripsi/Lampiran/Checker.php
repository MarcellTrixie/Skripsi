<?php
	
	include "checkers/PS01_TypoChecker.php";
	include "checkers/PS03_SpaceChecker.php";
	include "checkers/PS05_CapitalLetterChecker.php";
	include "checkers/PS09_SubChapterChecker.php";
	include "checkers/KAL02_PrefaceChecker.php";
	include "checkers/KAL03_ThesisDataChecker.php";
	include "checkers/NAT01_ReferenceChecker.php";
	include "checkers/VAN03_SubjectPronounChecker.php";

	/* 
	 * Kelas Parent untuk seluruh checker
	 * @author Marcell Trixie
	 */
	abstract class Checker{

		/**
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 * @param pdf_extract untuk memanggil method getter kelas Checker sesuai kebutuhan
		 */
		public abstract function errorChecking($pdf_extract);

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
				new KAL02_PrefaceChecker(),
				new KAL03_ThesisDataChecker(),
				new NAT01_ReferenceChecker(),
				new VAN03_SubjectPronounChecker()
			];
		}

	}

?>