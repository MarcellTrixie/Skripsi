<?php
	
	include "../vendor/autoload.php";
	include "capitalLetterChecker.php";
	include "spaceChecker.php";
	include "subjectPronounChecker.php";
	
	/*
	 * Kelas untuk menjalankan checker
	 * Author Marcell Trixie
	 */
	class Main{

		protected $file;
		protected $parser;
		protected $content;
		
		/*
		 * Method untuk mengekstrak file PDF skripsi
		 */
		public function extractPDF(){
			$directory = getcwd();
			$this->file = 'fileTest/test1.pdf';
			$fullfile = $directory . '/' . $this->file;
			$this->parser = new \Smalot\PdfParser\Parser();
			$pdf = $this->parser->parseFile($fullfile);
			$this->content  = $pdf->getText();
			echo $this->content . "\n\n";
		}

		public function run(){
			$capital = new CapitalLetterChecker();
			$space = new SpaceChecker();
			$pronoun = new SubjectPronounChecker();

			$capital->errorChecking($this->content);
			$space->errorChecking($this->content);
			$pronoun->errorChecking($this->content);
		}

	}

	$main = new Main();
	$main->extractPDF();
	$main->run();

?>