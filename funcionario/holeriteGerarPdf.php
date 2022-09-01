<?php
    // ob_end_clean();
    require('../classes/vendor/setasign/fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(60,20,'Hello !');
    
    echo $pdf->Output() >> "teste.pdf";
?>