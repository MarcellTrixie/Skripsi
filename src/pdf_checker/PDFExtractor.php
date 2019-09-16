<?php
	
	include "../vendor/autoload.php";
	include "KAL02_PrefaceChecker.php";
	include "KAL03_ThesisDataChecker.php";
	include "NAT01_ReferenceChecker.php";
	include "PS01_TypoChecker.php";
	include "PS03_SpaceChecker.php";
	include "PS05_CapitalLetterChecker.php";
	include "PS09_SubChapterChecker.php";
	include "VAN03_SubjectPronounChecker.php";
	
	/*
	 * Kelas untuk menjalankan checker
	 * Author Marcell Trixie
	 */
	class PDFExtractor{

		protected $file;
		protected $parser;
		protected $content;
		protected $cover;
		protected $abstrct;
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
				//Menyimpan halaman cover dan abstrak
				if($page == 0 || $page == 2){
					$this->cover = trim(preg_replace('/\s+/', ' ', $value->getText()));
					echo $this->cover;
				}
				elseif($page == 4|| $page == 6){
					$this->abstrct = trim(preg_replace('/\s+/', ' ', $value->getText()));
				}
				//Skip halaman daftar referensi, tabel dan gambar
				elseif ($page == 8 || $page == 10 || $page == 12) {
					continue;
				}
				else{
					$string = trim(preg_replace('/\s+/', ' ', $value->getText()));
    				$this->content = preg_replace("/[0-9]*$/", "", $string);
    				echo $this->content;
				}	
			}
 		}

 		/*
 		 * Method untuk menjalankan checker
 		 */
		public function run(){
			$thesisData = new KAL03_ThesisDataChecker();
			$reference = new NAT01_ReferenceChecker();
			$space = new PS03_SpaceChecker();
			$capital = new PS05_CapitalLetterChecker();
			$pronoun = new VAN03_SubjectPronounChecker();			

			$all_errors = [];
			array_push($all_errors, $thesisData->errorChecking($this->cover));
			array_push($all_errors, $reference->errorChecking($this->content));
			array_push($all_errors, $space->errorChecking($this->content));
			array_push($all_errors, $capital->errorChecking($this->content));
			array_push($all_errors, $pronoun->errorChecking($this->content));
			foreach ($all_errors as $error) {
				echo $error;
			}
		}

	}

?>