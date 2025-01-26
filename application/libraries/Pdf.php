<?php
require_once APPPATH . '/fpdf/fpdf.php';

class Pdf extends FPDF
{
    public function __construct()
    {
        parent::__construct();
    }
}
?>
