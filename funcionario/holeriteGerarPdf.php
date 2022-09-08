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
        $w = array(60, 60, 60);
        $x = array(60,60);
        $num_headers = count($header) -1;
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell(60, 8, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(202, 210, 197);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 1;
        foreach($data as $row) {
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 7, $row[$i], 'LR', 0, 'C', $fill);
            }
            
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(60*$num_headers, 2, '', 'T');
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

$header[0] = array('Pagamentos', 'Descontos', 'Liquido','');
$header[1] = array('Sal. Base', 'Sal. Contrib. INSS', 'Base FGTS','');
$header[2] = array('FGTS do mês', 'Base Cálculo IRPF','');

$data[0] = $pdf->LoadData("dados.txt");
$data[1] = $pdf->LoadData("dados1.txt");
$data[2] = $pdf->LoadData("dados2.txt");

// // print colored table
$pdf->ColoredTable($header[0], $data[0]);
$pdf->ColoredTable($header[1], $data[1]);
$pdf->ColoredTable($header[2], $data[2]);
$pdf->Output('holerite.pdf', 'I');

?>

