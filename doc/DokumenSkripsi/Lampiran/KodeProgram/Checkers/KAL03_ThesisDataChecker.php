<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa kelengkapan data skripsi
	 * @author Marcell Trixie
	 */
	class KAL03_ThesisDataChecker extends Checker{

		/** 
		 * Method untuk memeriksa kesalahan dalam dokumen skripsi
		 * @param pdf_extract untuk memanggil method getter kelas Checker sesuai kebutuhan
		 * @return result[] laporan kesalahan yang ditemukan
		 */
		public function errorChecking($pdf_extract){
			$result = [];
			$cover = $pdf_extract->getCoverPage();
			$pattern = "/JUDUL BAHASA INDONESIA|JUDUL BAHASA INGGRIS|Nama Lengkap|10 digit NPM UNPAR|tahun/";
			if (preg_match($pattern, $cover)) {
				$result[] = [
					"Error Code" => "KAL-03",
					"Note" => "Ada data skripsi yang belum dilengkapi pada halaman cover",
					"Excerpt" => $cover						
 				];
			}
			return $result;
		}

	}

?>