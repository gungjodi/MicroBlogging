<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $stream=TRUE, $paper = 'a4', $orientation = "portrait") 
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    $canvas = $dompdf->get_canvas();
    $y = $canvas->get_height() - 25;
    $x = $canvas->get_width() - 100;
    $canvas->page_text($x, $y, "Hal : {PAGE_NUM} / {PAGE_COUNT}", '', 10, array(0,0,0));
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
}
?>