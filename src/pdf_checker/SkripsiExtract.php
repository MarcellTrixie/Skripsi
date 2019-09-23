<?php
	
	/*
	 * Kelas untuk menjalankan checker
	 * Author Marcell Trixie
	 */
	class SkripsiExtract{

		protected $file;
		protected $parser;
		protected $content;
		protected $cover;
		protected $abstract;
		protected $pdfPage;

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
				//Menyimpan halaman cover dan abstrak
				if($page == 0 || $page == 2){
					$this->cover = trim(preg_replace('/\s+/', ' ', $value->getText()));
				}
				elseif($page == 4|| $page == 6){
					$this->abstract = trim(preg_replace('/\s+/', ' ', $value->getText()));
				}
				//Skip halaman daftar referensi, tabel dan gambar
				elseif ($page == 8 || $page == 10 || $page == 12) {
					continue;
				}
				else{
					$string = trim(preg_replace('/\s+/', ' ', $value->getText()));
    				$this->content = preg_replace("/[0-9]*$/", "", $string);
				}	
			}
 		}

 		public function getCover() {
 			return $this->cover();
 		}


	}

?>