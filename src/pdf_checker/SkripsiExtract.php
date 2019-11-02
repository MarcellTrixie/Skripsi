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
				else if (preg_match("/LEMBAR PENGESAHAN|PERNYATAAN|KATA PENGANTAR/", $value->getText())) {
					$this->otherPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/ABSTRAK|ABSTRACT/", $value->getText())) {
					$this->abstractPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/DAFTAR ISI/", $value->getText())) {
					$this->tableOfContentPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/DAFTAR GAMBAR|DAFTAR TABEL|DAFTAR REFERENSI|LAMPIRAN/", $value->getText())) {
					$this->listPage .= preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/BAB 1|BAB 2|BAB 3|BAB 4|BAB 5|BAB 6|/", $value->getText())) {
					$temp= trim(preg_replace('/\s+/', ' ', $value->getText()));
    				$this->contentPage .= preg_replace("/[0-9]*$/", "", $temp);
				}
				else{
					continue;
				}
			}
 		}

 		/**
 		 * @return contentPage yang sudah diexplode
 		 */
 		public function splitContentPage() {
 			$temp = explode(". ", $this->contentPage);
 			foreach ($temp as $index => $value) {
 				preg_replace('/[0-9]$/', "", $value);
 			}
 			return $temp;
 		}

 		public function getContentPage() {
 			return $this->contentPage;
 		}

 		public function getCoverPage() {
 			return $this->cover;
 		}

 		public function getAbstractPage() {
 			return $this->abstractPage;
 		}

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
			return $array;
 		}

 		public function getListPage() {
 			return $this->listPage;
 		}

	}

?>