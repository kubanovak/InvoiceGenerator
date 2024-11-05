<?php declare(strict_types=1);

namespace App\Invoice;

class BusinessEntity
{
    protected string $name;
    protected string $vatNumber;
    protected string $street;
    protected string $number;
    protected string $city;
    protected string $zip;
    protected ?string $phone;
    protected ?string $email;

    public function __construct(
        string $name,
        string $vatNumber,
        string $street,
        string $number,
        string $city,
        string $zip,
        ?string $phone = null,
        ?string $email = null
    ) {
        $this->name = $name;
        $this->vatNumber = $vatNumber;
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
        $this->zip = $zip;
        $this->phone = $phone;
        $this->email = $email;
    }

    // Existing methods...

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getZip(): string
    {
        return $this->zip;
    }
}
