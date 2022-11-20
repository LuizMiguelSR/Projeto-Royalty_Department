<?php
    ModelSession::verificaSessao();

    $dataMes = $_SESSION['mes'];
    $dataAno = $_SESSION['ano'];
    $nome = $_SESSION['nome'];

    require_once('App/Libs/tcPDF/examples/tcpdf_include.php');

    class MYPDF extends TCPDF {

        //Page header
        public function Header() {
            // Logo
            $image_file = 'App/View/Images/SystemImages/logobase.png';
            $this->Image($image_file, 15, 0, 35, 30, 'PNG', '', 'T', false, 500, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('dejavusans', 'B', 16);
            // Title
            $this->Cell(0, 30, 'Holerite do mês de '.(new ModelMes)->Mes($_SESSION['mes']).'. de '.$_SESSION['ano'], 0, false, 'C', 0, '', 0, false, 'R', 'M');
            $this->SetFont('dejavusans', '', 11);
            $this->Cell(0, 30, 'Holerite de '.$_SESSION['nome'], 0, false, 'R', 0, '', 0, false, '', 'B');
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
            $this->SetFillColor(255);
            $this->SetTextColor(10);
            $this->SetDrawColor(25, 135, 84);
            $this->SetLineWidth(0.3);
            $this->SetFont('', '');
            // Header
            $w = array(90, 90, 90);
            $x = array(90,90);
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell(90, 9, $header[$i], 1, 0, 'C', 1);
            }
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(255);
            $this->SetTextColor(10);
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
    $pdf->SetTitle('holerite_'.$nome.'_'.$dataAno.'_'.$dataMes);

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
    if (@file_exists(dirname(__FILE__).'/lang/por.php')) {
        require_once(dirname(__FILE__).'/lang/por.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('helvetica', '', 12);

    // add a page
    $pdf->AddPage();
    $pdf->writeHTML('', true, 0, true, false, '');

    foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_SESSION['ano'], $_SESSION['mes']) as $func):
        if($_SESSION['id_usuario'] == $func['id_funcionario']){
            for ($i=0; $i < 4; $i++)
                $faixa_inss[$i] = "R$".number_format($func["inss_fx".($i+1)], 2, ',', '.');
            $inss_total = "R$".number_format($func["inss_total"], 2, ',', '.');
        }
    endforeach;

    foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_SESSION['ano'], $_SESSION['mes']) as $func):
        if($_SESSION['id_usuario'] == $func['id_funcionario']){
            for ($i=0; $i < 5; $i++)
                $faixa_irrf[$i] = "R$".number_format($func["irrf_fx".($i+1)], 2, ',', '.');
            $irrf_total = "R$".number_format($func["irrf_total"], 2, ',', '.');
        }
    endforeach;

    for ($i=0;$i<4;$i++)
        $header[$i] = array('INSS Faixa 0'.($i+1), $faixa_inss[$i]);
    
    $header[4] = array('INSS Total', $inss_total);
    
    for ($i=0;$i<5;$i++)
        $header[($i+5)] = array('IRRF Faixa 0'.($i+1), $faixa_irrf[$i]);
    
    $header[10] = array('IRRF Total', $irrf_total);
    
    $header[11] = array('Vale Transporte', 'R$ 220,00');
    $header[12] = array('Sal. Base', 'Sal. Líquido');

    foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_SESSION['ano'], $_SESSION['mes']) as $func):
        if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
            $salario_base = "R$ ".number_format($func["salario_base"], 2, ',', '.');
        }
    endforeach;

    foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_SESSION['ano'], $_SESSION['mes']) as $func):
        if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
            $salarioliquido = "R$ ".number_format($func["salario_liquido"], 2, ',', '.');
        }
    endforeach;

    $data = array(explode(';', chop($salario_base.";".$salarioliquido)));
    // // print colored table
    for ($i=0; $i < 12; $i++) {
        $pdf->ColoredTable($header[$i], null);
        if ($i==4){
            $html = '<span><a href="https://www.in.gov.br/en/web/dou/-/portaria-interministerial-mtp/me-n-12-de-17-de-janeiro-de-2022-375006998" target="_blank">Fonte: Tabela INSS 2022 Oficial</a></span>';
            $pdf->writeHTML($html, true, 0, true, 0, 'C');
        }
        if ($i==10){
            $html = '<span><a href="https://www.gov.br/receitafederal/pt-br/assuntos/orientacao-tributaria/tributos/irpf-imposto-de-renda-pessoa-fisica#tabelas-de-incid-ncia-mensal" target="_blank">Fonte: Tabela IRRF 2022 Oficial</a></span>';
            $pdf->writeHTML($html, true, 0, true, 0, 'C');
        }

    }
    $pdf->ColoredTable($header[12], $data);
    $html = '<span><a href="http://www.planalto.gov.br/ccivil_03/leis/l7418.htm" target="_blank">Fonte: Lei do Vale Transporte</a></span>'; 
    $y = $pdf->getY();

    // set color for background
    $pdf->setFillColor(255);
    
    // set color for text
    $pdf->setTextColor(0);

    // write the first column
    $pdf->writeHTMLCell(180, '', '', $y, $html, 0, 0, false, true, 'C', true);
    $pdf->Output('holerite_'.$nome.'_'.$dataAno.'_'.$dataMes.'.pdf', 'I');
?>