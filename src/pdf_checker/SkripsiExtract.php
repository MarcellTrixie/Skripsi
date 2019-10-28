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
				if (preg_match("/SKRIPSI|TUGAS AKHIR|UNDERGRADUATE THESIS|FINAL PROJECT/", $value->getText())) {
					$this->cover = preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/ABSTRAK|ABSTRACT/", $value->getText())) {
					$this->abstractPage = preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/DAFTAR ISI/", $value->getText())) {
					$this->tableOfContentPage = preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/DAFTAR GAMBAR|DAFTAR TABEL|DAFTAR REFERENSI|LAMPIRAN/", $value->getText())) {
					$this->listPage = preg_replace('/\s+/', ' ', $value->getText());
				}
				else if (preg_match("/BAB 1|BAB 2|BAB 3|BAB 4|BAB 5|BAB 6|/", $value->getText())) {
					$temp= trim(preg_replace('/\s+/', ' ', $value->getText()));
    				$this->contentPage = preg_replace("/[0-9]*$/", "", $temp);
				}	
			}
 		}

 		public function getCoverPage() {
 			//return preg_replace('/[^A-Za-z0-9\s]/', '', $this->cover);
 			return $this->cover;
 		}

 		public function getAbstractPage() {
 			return $this->abstractPage;
 		}

 		public function getTableOfContentPage(){
			return $this->tableOfContentPage;
 		}

 		public function getListPage() {
 			return $this->listPage;
 		}

 		public function getContentPage() {
 			return $this->contentPage;
 		}

 		public function splitContentPage() {
 			//$temp = explode(". ", $this->contentPage);
 			//foreach ($temp as $index => $value) {
 			//	preg_replace('/[0-9]$/', "", $temp);
 			//}
 			//return $temp;
 			return explode(". ", $this->contentPage);
 		}

	}

?>