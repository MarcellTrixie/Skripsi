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
		protected $listPage;
		protected $contentPage;

		/*
		 * Method untuk mengekstrak file PDF skripsi
		 */
		public function extractFromPDF($input){
 			$directory = getcwd();
 			$this->parser = new \Smalot\PdfParser\Parser();
			$this->file = $directory . '/' . $input;
 			$pdf = $this->parser->parseFile($this->file);
			$pages  = $pdf->getPages();

			foreach ($pages as $page => $value) {
				if (preg_match("/SKRIPSI|TUGAS AKHIR|UNDERGRADUATE THESIS/", $value->getText())) {
				//if($page == 0 || $page == 2){
					$this->cover = trim(preg_replace('/\s+/', ' ', $value->getText()));
				}
				else if (preg_match("/ABSTRAK|ABSTRACT/", $value->getText())) {
				//elseif($page == 4|| $page == 6){
					$this->abstractPage = trim(preg_replace('/\s+/', ' ', $value->getText()));
				}
				else if (preg_match("/DAFTAR ISI|DAFTAR GAMBAR|DAFTAR TABEL|DAFTAR REFERENSI/", $value->getText())) {
				//elseif ($page == 8 || $page == 10 || $page == 12) {
					$this->listPage = trim(preg_replace('/\s+/', ' ', $value->getText()));
					echo $this->listPage;
				}
				else{
					$temp = trim(preg_replace('/\s+/', ' ', $value->getText()));
    				$this->contentPage = preg_replace("/[0-9]*$/", "", $temp);
				}	
			}
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