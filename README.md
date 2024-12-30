# InvoiceGenerator

Tento projekt slouží k vytváření faktur ve formátu PDF pomocí PHP a knihovny DomPDF.

## Funkcionality
- Generování PDF faktur

## Technologie
- **PHP** (7.4+)
- **Composer** – správa závislostí.
- **DomPDF** (3.0.0) – generování PDF.
- **PHPUnit** (11.4.2) – automatické testy.

## Instalace
1. Klonujte repozitář:
   ```bash
   git clone https://github.com/kubanovak/InvoiceGenerator.git
   cd InvoiceGenerator
   ```
2. Nainstalujte závislosti:
   ```bash
   composer install
   ```
3. Zahrňte autoload:
   ```php
   require_once __DIR__ . '/vendor/autoload.php';
   ```

## Použití
1. Připravte data o faktuře (dodavatel, odběratel, položky).
2. Použijte třídu `Renderer` pro vytvoření PDF:
   ```bash
   php bin/run.php invoice.pdf
   ```

## Testování
- Spusťte testy:
  ```bash
  ./vendor/bin/phpunit
  ```

## Struktura projektu
- `src/` – třídy pro fakturu a generování PDF.
- `tests/` – PHPUnit testy.
- `bin/run.php` – ukázkový spouštěcí skript.
