<?php

require_once 'Person.php';

abstract class Staff extends Person
{
    protected float $hourlyRate;

    public function __construct(
        string $name,
        string $email,
        float $hourlyRate
    ) {
        parent::__construct($name, $email);
        $this->hourlyRate = $hourlyRate;
    }

    public function getHourlyRate(): float
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(float $hourlyRate): void
    {
        $this->hourlyRate = $hourlyRate;
    }

    abstract public function calculateSalary(): float;
}