<?php

require_once 'Staff.php';

class Doctor extends Staff
{
    public function getRole(): string
    {
        return "Doctor";
    }

    public function calculateSalary(): float
    {
        $totalHours = 0;

        foreach (Appointment::getAppointments() as $appointment) {
            if ($appointment->getDoctor() === $this) {
                $totalHours += $appointment->getDurationInHours();
            }
        }

        return $totalHours * $this->hourlyRate;
    }
}