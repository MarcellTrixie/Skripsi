<?php
	
	/* 
	 * Sub class dari kelas Checker
	 * Memeriksa subbab dalam sebuah bab
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
			$temp = preg_replace('/[^0-9.]/', '', $pdf_extract->getTableOfContentPage());
			$number = explode('/./', $temp);
			foreach ($number as $index => $value) {
				$row = $index+1;
				$pattern = "/^[0-9].[0-9]\s[A-Za-z0-9]/";
				if (preg_match($pattern, $value)) {
					$result[] = [
						"row" => $row,
						"error" => "Hanya terdapat 1 subbab saja, lebih baik tidak perlu dibuat subbab",
						"excerpt" => $value
 					];
				}	
			}
			return $result;
		}

	}

?>