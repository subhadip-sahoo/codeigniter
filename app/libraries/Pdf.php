<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF {
    function __construct(){
        parent::__construct();
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 0, '--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, true, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 2, '© 2016. SMG Health. All rights reserved.', 0, true, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 5, ' Page: '.$this->getAliasNumPage().' / '.$this->getAliasNbPages(), 0, true, 'R', 0, '', 0, false, 'T', 'M');
    }
}