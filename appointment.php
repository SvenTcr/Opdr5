<?php

class Appointment
{
    private static array $appointments = [];

    private Patient $patient;
    private Doctor $doctor;
    private ?Nurse $nurse;

    private DateTime $startTime;
    private DateTime $endTime;

    public function __construct(
        Patient $patient,
        Doctor $doctor,
        string $startTime,
        string $endTime,
        ?Nurse $nurse = null
    ) {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->nurse = $nurse;

        $this->startTime = new DateTime($startTime);
        $this->endTime = new DateTime($endTime);

        self::$appointments[] = $this;
    }

    public static function getAppointments(): array
    {
        return self::$appointments;
    }

    public function getPatient(): Patient
    {
        return $this->patient;
    }

    public function getDoctor(): Doctor
    {
        return $this->doctor;
    }

    public function getNurse(): ?Nurse
    {
        return $this->nurse;
    }

    public function getStartTime(): DateTime
    {
        return $this->startTime;
    }

    public function getEndTime(): DateTime
    {
        return $this->endTime;
    }

    public function getDurationInHours(): float
    {
        $difference = $this->startTime->diff($this->endTime);

        return $difference->h + ($difference->i / 60);
    }
}