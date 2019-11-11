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
			$array = array_merge($temp);
			for ($i=0;  $i<sizeof($array); $i++) { 
				if(preg_match('/\.1$/', $array[$i])){
					$substring = substr($array[$i+1], 0, strlen($array[$i])-1);
					if(!array_search($substring.'2', $array)){
						$result[] = [
							"Error Code" => "PS-09",
							"Note" => "Bab/Subbab " . $array[$i] . " ini hanya terdapat 1 sub bab/sub sub bab",									
 						];
					}			
				}
			}
			return $result;
		}

	}

?>