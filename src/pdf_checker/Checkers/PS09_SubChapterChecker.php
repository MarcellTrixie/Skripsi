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
			foreach ($temp as $key => $value) {
				var_dump($value);
			}
			//for ($i=sizeof($temp); $i>0; $i--) {
			//	$curElement = $temp[$i];
			//	$nextElement = $temp[$i+1];
			//	if(preg_match('/\b1\b/', $temp[$i])){
			//		if(){
			//			$result[] = [
			//				"Error Code" => "PS-09",
			//				"Note" => "Pada bab ini hanya terdapat 1 subbab, lebih baik tidak perlu menggunakan subbab",
			//				"Excerpt" => $temp[$i]									
 			//			];
			//		}	
			//	}
			//}
			return $result;
		}

	}

?>