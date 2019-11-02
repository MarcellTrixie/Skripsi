<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa jumlah subbab dalam sebuah bab
	 * @author Marcell Trixie
	 */
	class PS09_SubChapterChecker extends Checker{

		/**
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 * @param pdf_extract untuk memanggil method getter kelas Checker sesuai kebutuhan
		 * @return result[] laporan kesalahan yang ditemukan
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$temp = $pdf_extract->getTableOfContentPage();
			//for ($i=sizeof($temp); $i>0; $i++) {
			//	$curIndex;
			//	$prevIndex;
				//if(){
			//		$result[] = [
			//			"Error Code" => "PS-09",
			//			"Note" => "Pada bab ini hanya terdapat 1 subbab, lebih baik tidak perlu menggunakan subbab",
			//			"Excerpt" => $value									
 			//		];	
				//}
			//}
			return $result;
		}

	}

?>