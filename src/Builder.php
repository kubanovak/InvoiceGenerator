<?php declare(strict_types=1);

namespace App;

use App\Invoice\BusinessEntity;
use App\Invoice\Item;

class Builder
{
    protected Invoice $invoice;

    public function __construct()
    {
        $this->invoice = new Invoice();
    }

    public function build(): Invoice
    {
        return $this->invoice;
    }

    public function setNumber(string $number): self
    {
        $this->invoice->setNumber($number);
        return $this;
    }

    public function setSupplier(
        string  $name,
        string  $vatNumber,
        string  $street,
        string  $number,
        string  $city,
        string  $zip,
        ?string $phone = null,
        ?string $email = null
    ): self {
        $supplier = new BusinessEntity($name, $vatNumber, $street, $number, $city, $zip, $phone, $email);
        $this->invoice->setSupplier($supplier);
        return $this;
    }

    public function setCustomer(
        string  $name,
        string  $vatNumber,
        string  $street,
        string  $number,
        string  $city,
        string  $zip,
        ?string $phone = null,
        ?string $email = null
    ): self {
        $customer = new BusinessEntity($name, $vatNumber, $street, $number, $city, $zip, $phone, $email);
        $this->invoice->setCustomer($customer);
        return $this;
    }

    public function addItem(string $description, ?float $quantity = 1.0, ?float $price = 0.0): self
    {
        $item = new Item();
        $item->setDescription($description)
            ->setQuantity($quantity ?? 1.0)
            ->setUnitPrice($price ?? 0.0);

        $this->invoice->addItem($item);
        return $this;
    }
}
