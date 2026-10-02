<?php

require_once 'Person.php';

class Patient extends Person
{
    private float $treatmentPrice;

    public function __construct(
        string $name,
        string $email,
        float $treatmentPrice
    ) {
        parent::__construct($name, $email);
        $this->treatmentPrice = $treatmentPrice;
    }

    public function getRole(): string
    {
        return "Patient";
    }

    public function getTreatmentPrice(): float
    {
        return $this->treatmentPrice;
    }

    public function setTreatmentPrice(float $treatmentPrice): void
    {
        $this->treatmentPrice = $treatmentPrice;
    }
}