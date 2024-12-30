# InvoiceGenerator

Tento projekt slouží k vytváření faktur ve formátu PDF pomocí PHP a knihovny DomPDF.

## Funkcionality
- Generování PDF faktur na základě zadaných dat

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
1. Upravte skript `bin/run.php`.
2. Spusťte skript pro generování faktury:
   ```bash
   php bin/run.php invoice.pdf
   ```
   - Výsledné PDF bude uloženo do souboru `invoice.pdf`.
3. Skript `bin/run.php` obsahuje ukázku generování faktury se dvěma položkami a předvyplněnými údaji o dodavateli a odběrateli.

## Testování
- Spusťte testy:
  ```bash
  ./vendor/bin/phpunit
  ```

## Struktura projektu
- `src/` – třídy pro fakturu a generování PDF.
- `tests/` – PHPUnit testy.
- `bin/run.php` – ukázkový spouštěcí skript.

