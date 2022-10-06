<?php
require_once('../libs/tcPDF/vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');
require('getHolerite.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = '../img/logoEntrada.svg';
        $this->ImageSVG($image_file, 10, 0, 30, 30, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
        $this->SetFillColor(33, 37, 41);
        $this->SetTextColor(255);
        $this->SetDrawColor(25, 135, 84);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(90, 90, 90);
        $x = array(90,90);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell(90, 9, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(33, 37, 41);
        $this->SetTextColor(255);
        $this->SetFont('');
        // Data
        $fill = 1;

        if (!is_null($data)) {
            foreach($data as $row) {
                for($i = 0; $i < $num_headers; ++$i) {
                    $this->Cell($w[$i], 8, $row[$i], 'LR', 0, 'C', $fill);
                }
                
                $this->Ln();
                $fill=!$fill;
            }

            $this->Cell(90*$num_headers, 2, '', 'T');
        }
        // $this->Ln();
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

foreach($inss as $func):
    if($_SESSION['id_funcionario'] == $func['id_inss'])
    {
        for ($i=1; $i <= 4; $i++)
        {
            for ($j=5; j > 0; $j--)
            {
                $faixa_inss[$i] = "R$".number_format($func["faixa_inss".$j], 2, ',', '.');
            }
        }
        $total_inss = "R$".number_format($func["total_inss"], 2, ',', '.');
    }
endforeach;

foreach($irrf as $func):
    if($_SESSION['id_funcionario'] == $func['id_irrf'])
    {
        for ($i=1; $i <= 5; $i++) { 
            for ($j=5; $j > 0; $j--) { 
                $faixa_irrf[$i] = "R$".number_format($func["faixa_irrf".$j], 2, ',', '.');
            }   
        }
        $total_irrf = "R$".number_format($func["total_irrf".$i], 2, ',', '.');
    }
endforeach;

$header[0] = array('INSS a recolher Faixa 04', $faixa_inss[0]);
$header[1] = array('INSS a recolher Faixa 03', $faixa_inss[1]);
$header[2] = array('INSS a recolher Faixa 02', $faixa_inss[2]);
$header[3] = array('INSS a recolher Faixa 01', $faixa_inss[3]);
$header[4] = array('INSS a recolher Total', $total_inss);
$pdf->writeHTML($html, true, 0, true, true);
$header[5] = array('IRRF a recolher Faixa 05', $faixa_irrf[0]);
$header[6] = array('IRRF a recolher Faixa 04', $faixa_irrf[0]);
$header[7] = array('IRRF a recolher Faixa 03', $faixa_irrf[0]);
$header[8] = array('IRRF a recolher Faixa 02', $faixa_irrf[0]);
$header[9] = array('IRRF a recolher Faixa 01', $faixa_irrf[0]);
$header[10] = array('IRRF a recolher Total', $total_irrf);
$pdf->writeHTML($html, true, 0, true, true);
$header[11] = array('Vale Transporte	', 'R$ 220,00');
$header[12] = array('Sal. Base', 'Sal. Líquido');

foreach($departamento as $func):
    if ($_SESSION['id_funcionario'] == $func['id_departamento'] ){
        $salario_base = "R$ ".number_format($func["salario_base"], 2, ',', '.');
    }
endforeach;

foreach($holerite as $func):
    if ($_SESSION['id_funcionario'] == $func['id_holerite'] ){
        $salarioliquido = "R$ ".number_format($func["salarioliquido"], 2, ',', '.');
    }
endforeach;

$data = array(explode(';', chop($salario_base.";".$salarioliquido)));
// // print colored table
for ($i=0; $i < 12; $i++) { 
    $pdf->ColoredTable($header[$i], null);
}

$pdf->ColoredTable($header[12], $data);
$pdf->Output('holerite.pdf', 'I');

?>

