<?php
	
	include "../vendor/autoload.php";
	include "PS05_CapitalLetterChecker.php";
	//include "PS03_SpaceChecker.php";
	//include "VAN03_SubjectPronounChecker.php";
	//include "KAL03_ThesisDataChecker.php";
	
	/*
	 * Kelas untuk menjalankan checker
	 * Author Marcell Trixie
	 */
	class PDFExtractor{

		protected $file;
		protected $parser;
		protected $content;
		protected $cover;
		protected $abstract;
		protected $pdfPage;

		/*
		 * Method untuk mengekstrak file PDF skripsi
		 */
		public function extractPDF($input){
 			$directory = getcwd();
 			$this->parser = new \Smalot\PdfParser\Parser();
			$this->file = $directory . '/' . $input;
 			$pdf = $this->parser->parseFile($this->file);
			$pages  = $pdf->getPages();

			foreach ($pages as $page => $value) {
				//Menyimpan halaman cover bahasa Indonesia dan bahasa Inggris
				if($page == 0 || $page == 2){
					$this->cover = trim(preg_replace('/\s+/', ' ', $value->getText()));
					$this->pdfPage = $page;
				}
				//Menyimpan halaman abstrak
				elseif ($page == 4 || $page == 6) {
					$this->abstract = trim(preg_replace('/\s+/', ' ', $value->getText()));
				}
				//Melewati halaman daftar referensi, tabel dan gambar
				elseif ($page == 8 || $page == 10 || $page == 12) {
					continue;
				}
				else{
					$string = trim(preg_replace('/\s+/', ' ', $value->getText()));
    				$this->content = preg_replace("/[0-9]*$/", "", $string);	
				}	
			}
 		}

 		/*
 		 * Method untuk menjalankan checker
 		 */
		public function run(){
			$capital = new PS05_CapitalLetterChecker();
			//$space = new PS03_SpaceChecker();
			//$pronoun = new VAN03_SubjectPronounChecker();
			//$data = new KAL03_ThesisDataChecker();

			$capital->errorChecking($this->content, $this->pdfPage);
			//$space->errorChecking($this->content);
			//$pronoun->errorChecking($this->content);
			//$data->errorChecking($this->cover);
		}

	}

?>