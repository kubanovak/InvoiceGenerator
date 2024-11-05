<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Adjust the path as necessary

use App\Builder;
use App\Renderer;

if($argc !== 2) {
?>
usage:

php run.php invoice.pdf
<?php
    exit;
}

$builder = new Builder();
$invoice = $builder
    ->setNumber('201900021')
    ->setSupplier(
        'Dodavatel Holding a.s.', 'CZ66776677', 'Kratka', "2", 'Brno', '60200', '+420 999 100 999', 'info@d-holding.eu'
    )
    ->setCustomer('Jan Novak', 'CZ12345678', 'Dlouha', "1", 'Praha', '11000', null, 'cutomer@testing.cz')
    ->addItem('Zbozi', 15.5, 199.99)
    ->addItem('Sluzby', 1, 98100.57)
    ->build();

$source = (new Renderer())->makePdf($invoice);
file_put_contents($argv[1], $source);
