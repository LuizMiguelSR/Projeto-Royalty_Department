<?php
require_once('../classes/vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = '../img/logoEntrada.svg';
        $this->ImageSVG($image_file, 10, 0, 30, '', 'SVG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('dejavusans', 'B', 20);
        // Title
        $this->Cell(0, 15, 'Holerite do mês', 0, false, 'C', 0, '', 0, false, 'R', 'M');
    }

    // Load table data from file
    public function LoadData($file) {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }

    // Colored table
    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(53, 79, 82);
        $this->SetTextColor(255);
        $this->SetDrawColor(47, 62, 70);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(90, 90, 90);
        $x = array(90,90);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell(90, 8, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(202, 210, 197);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 1;

        if (!is_null($data)) {
            foreach($data as $row) {
                for($i = 0; $i < $num_headers; ++$i) {
                    $this->Cell($w[$i], 7, $row[$i], 'LR', 0, 'C', $fill);
                }
                
                $this->Ln();
                $fill=!$fill;
            }

            $this->Cell(90*$num_headers, 2, '', 'T');
        }
        $this->Ln();
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('holerite');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//     require_once(dirname(__FILE__).'/lang/eng.php');
//     $pdf->setLanguageArray($l);
// }

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

$header[0] = array('INSS a recolher', 'R$ 536,18');
$header[1] = array('IRRF a recolher', 'R$ 282,92');
$header[2] = array('Vale Transporte	', 'R$ 220,00');
$header[3] = array('Sal. Base', 'Sal. Líquido');

$data = array(explode(';', chop("R$ 886,66;R$ 4.928,04")));

// // print colored table
$pdf->ColoredTable($header[0], null);
$pdf->ColoredTable($header[1], null);
$pdf->ColoredTable($header[2], null);
$pdf->ColoredTable($header[3], $data);
$pdf->Output('holerite.pdf', 'I');

?>

