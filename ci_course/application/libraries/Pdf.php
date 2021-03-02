<?php

require_once APPPATH . "third_party/TCPDF/tcpdf.php";

class Pdf extends TCPDF
{
    //Page header
    public function Header()
    {
        $this->SetFont('helvetica', 'B', 20);
        $this->ln(10);
        // Title
        $this->Cell(0, 0, 'shop.lagseen.me', 1, 1, 'C', 0, '', 0, false, 'M', 'M');
        $this->ln(10);
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('freeserif', '', 8, '', true);
        // Page number
        $this->Cell(0, 8, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 1, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}
