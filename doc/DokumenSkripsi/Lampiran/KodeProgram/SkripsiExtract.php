<?php
	
	/*
	 * Kelas untuk menjalankan checker
	 * Author Marcell Trixie
	 */
	class SkripsiExtract{

		protected $file;
		protected $parser;
		protected $cover;
		protected $abstractPage;
		protected $otherPage;
		protected $tableOfContentPage;
		protected $listPage;
		protected $contentPage;

		/**
		 * Method untuk mengekstrak file PDF skripsi
		 * @param input file pdf yang akan diesktrak
		 */
		public function extractFromPDF($input){
 			$directory = getcwd();
 			$this->parser = new \Smalot\PdfParser\Parser();
			$this->file = $directory . '/' . $input;
 			$pdf = $this->parser->parseFile($this->file);
			$pages  = $pdf->getPages();

			foreach ($pages as $page => $value) {
				if($page == 0 || $page == 2){
					$this->cover .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/\bLEMBAR PENGESAHAN\b|\bPERNYATAAN\b|\bKATA PENGANTAR\b/", $value->getText())) {
					$this->otherPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/\bABSTRAK\b|\bABSTRACT\b/", $value->getText())) {
					$this->abstractPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/\bDAFTAR ISI\b/", $value->getText())) {
					$this->tableOfContentPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/\bDAFTAR GAMBAR\b|\bDAFTAR TABEL\b|\bDAFTAR REFERENSI\b|\bLAMPIRAN\b/", $value->getText())) {
					$this->listPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/(BAB )[0-9]{1}/", $value->getText())) {	
					$temp= trim(preg_replace('/\s+/', ' ', $value->getText()));
    				$this->contentPage .= preg_replace("/[0-9]*$/", "", $temp);
				}
				else{
					continue;
				}
			}
 		}

 		/**
 		 * Method untuk mendapatkan daftar isi
 		 * @return nomor bab dan subbab yang ada pada halaman daftar isi
  		 */
 		public function getTableOfContentPage(){
 			$temp = preg_replace('/[A-Za-z]/', '', $this->tableOfContentPage);
 			$array = explode(" ", $temp);
 			for ($i=0 ; $i < sizeof($array) ; $i++ ) { 
 				if(preg_match('/^[0-9]{1,}$/', $array[$i])){
 					$array[$i] = "";
 				}
 				if(preg_match('/^.$/', $array[$i])){
 					$array[$i] = "";
 				}
 			}

 			foreach ($array as $key => $value) {
 				if(empty($array[$key])){
 					unset($array[$key]);
 				}
 			}
			return $array;
 		}

 		/**
 		 * Method untuk mendapatkan halaman konten dari bab 1 sampai bab 6
 		 * @return array yang sudah diexplode
 		 */
 		public function splitContentPage() {
 			$temp = explode(". ", $this->contentPage);
 			foreach ($temp as $index => $value) {
 				preg_replace('/[0-9]$/', "", $value);
 			}
 			return $temp;
 		}

 		public function getCoverPage() {
 			return $this->cover;
 		}

 		public function getAbstractPage() {
 			return $this->abstractPage;
 		}
 		
 		public function getListPage() {
 			return $this->listPage;
 		}

 		public function getContentPage() {
 			return $this->contentPage;
 		}

	}

?>