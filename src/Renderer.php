<?php declare(strict_types=1);

namespace App;

use Dompdf\Dompdf;
use App\Invoice\Item;

class Renderer extends Dompdf
{
    public function makeHtml(Invoice $invoice): string
    {
        $supplierContact = $invoice->getSupplier()->getPhone() ? "Tel: " . $invoice->getSupplier()->getPhone() : '';
        $supplierEmail = $invoice->getSupplier()->getEmail() ? "Email: " . $invoice->getSupplier()->getEmail() : '';
        $customerEmail = $invoice->getCustomer()->getEmail() ? "Email: " . $invoice->getCustomer()->getEmail() : '';

        $itemsHtml = '';
        foreach ($invoice->getItems() as $item) {
            $itemsHtml .= "
            <tr>
                <td>{$item->getDescription()}</td>
                <td class='right-align'>{$item->getQuantity()}</td>
                <td class='right-align'>" . number_format($item->getUnitPrice(), 2, ',', ' ') . "</td>
                <td class='right-align'>" . number_format($item->getTotalPrice(), 2, ',', ' ') . "</td>
            </tr>";
        }

        $totalPrice = number_format($invoice->getTotalPrice(), 2, ',', ' ');

        $html = "
    <html>
    <head>
        <style>
             body { 
                font-family: Arial, sans-serif; 
                font-size: 16px; 
                margin: 0; 
                padding: 0; 
            }
            .invoice-header { 
                font-size: 16px; 
                text-align: left; 
                margin-bottom: 20px; 
                width: 90%; 
                margin-left: auto; 
                margin-right: auto; 
            }
            .contact-info-wrapper {
                width: 90%; 
                border: 1px solid black; 
                margin-left: auto; 
                margin-right: auto; 
                display: table; 
                margin-bottom: 20px;
            }
            .contact-info { 
                width: 100%; 
                border-collapse: collapse; 
            }
            .contact-info td { 
                padding: 5px; 
                vertical-align: top; 
                border-right: 1px solid black; 
            }
            .contact-info td:last-child { 
                border-right: none; 
            }
            .contact-info tr:last-child td { 
                border-bottom: none; 
            }
            .table { 
                width: 90%; 
                border-collapse: collapse; 
                margin-top: 20px; 
                margin-left: auto; 
                margin-right: auto; 
            }
            .table th, .table td { 
                border: 1px solid black; 
                padding: 5px; 
                text-align: right; 
            }
            .table th {  
                text-align: left; 
            }
            .right-align { 
                text-align: right; 
            }
            .total-row { 
                font-weight: bold; 
            }



        </style>
    </head>
    <body>
        <div class='invoice-header'>FAKTURA – DOKLAD c. {$invoice->getNumber()}</div>
            <div class='contact-info-wrapper'>
                <table class='contact-info'>
                    <tr>
                        <td>
                            <strong>Dodavatel</strong><br>
                            {$invoice->getSupplier()->getName()}<br>
                            {$invoice->getSupplier()->getStreet()} {$invoice->getSupplier()->getNumber()}<br>
                            {$invoice->getSupplier()->getZip()} {$invoice->getSupplier()->getCity()}<br>
                            <br>
                            {$invoice->getSupplier()->getVatNumber()}<br>
                            <br>
                            {$supplierContact}<br>
                            {$supplierEmail}
                        </td>
                        <td>
                            <strong>Odberatel</strong><br>
                            {$invoice->getCustomer()->getName()}<br>
                            {$invoice->getCustomer()->getStreet()} {$invoice->getCustomer()->getNumber()}<br>
                            {$invoice->getCustomer()->getCity()} {$invoice->getCustomer()->getZip()}<br>
                            <br>
                            {$invoice->getCustomer()->getVatNumber()}<br>
                            <br>
                            {$customerEmail}
                        </td>
                    </tr>
                </table>
            </div>
        <table class='table'>
            <tr>
                <th>Polozka</th>
                <th>Pocet m.j.</th>
                <th>Cena za m.j.</th>
                <th>Celkem</th>
            </tr>
            {$itemsHtml}
            <tr class='total-row'>
                <th colspan='3' >Celkem</th>
                <td class='right-align'>{$totalPrice}</td>
            </tr>
        </table>
    </body>
    </html>";

        return $html;
    }

    public function makePdf(Invoice $invoice): string
    {
        // Generate HTML for the invoice
        $html = $this->makeHtml($invoice);

        // Load HTML content into Dompdf
        $this->loadHtml($html);
        $this->setPaper('A4', 'portrait');

        // Render the PDF (generate output in memory)
        $this->render();

        // Output the PDF as a string for storage or sending
        return $this->output();
    }
}
