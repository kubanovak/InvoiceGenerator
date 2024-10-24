<?php declare(strict_types=1);

namespace App;

use Dompdf\Dompdf;

class Renderer extends Dompdf
{
    public function makeHtml(Invoice $invoice): string
    {
        // TODO implement
    }
    public function makePdf(Invoice $invoice): string
    {
        // TODO implement
    }
}
