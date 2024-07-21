<?php
require_once APPPATH.'../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

function pdf_create($html, $filename='', $stream=TRUE) 
{
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
}
?>
