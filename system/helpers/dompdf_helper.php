<?php

require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;
function cetak_pdf($html, $paper_size, $filename)
{

// instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->set_option('isHtml5ParserEnabled', true);
    $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
    $dompdf->setPaper($paper_size);

// Render the HTML as PDF
    $dompdf->render();

// Output the generated PDF to Browser
    $dompdf->stream($filename, array('Attachment'=>0));
}
function cetak_tamu($html)
{

// instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->set_option('isHtml5ParserEnabled', true);
    $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
    $dompdf->render();

// Output the generated PDF to Browser
    $dompdf->stream($filename, array('Attachment'=>0));
}
?>