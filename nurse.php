<?php

require_once 'Staff.php';

class Nurse extends Staff
{
    private float $baseSalary;

    public function __construct(
        string $name,
        string $email,
        float $hourlyRate,
        float $baseSalary
    ) {
        parent::__construct($name, $email, $hourlyRate);
        $this->baseSalary = $baseSalary;
    }

    public function getRole(): string
    {
        return "Nurse";
    }

    public function getBaseSalary(): float
    {
        return $this->baseSalary;
    }

    public function setBaseSalary(float $baseSalary): void
    {
        $this->baseSalary = $baseSalary;
    }

    public function calculateSalary(): float
    {
        $bonusHours = 0;

        foreach (Appointment::getAppointments() as $appointment) {
            if ($appointment->getNurse() === $this) {
                $bonusHours += $appointment->getDurationInHours();
            }
        }

        return $this->baseSalary + ($bonusHours * $this->hourlyRate);
    }
}