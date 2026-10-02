<?php

require_once 'Person.php';
require_once 'Patient.php';
require_once 'Staff.php';
require_once 'Doctor.php';
require_once 'Nurse.php';
require_once 'Appointment.php';

$patient = new Patient(
    "Jan Jansen",
    "jan@example.com",
    150
);

$doctor = new Doctor(
    "Dr. De Vries",
    "devries@hospital.nl",
    80
);

$nurse = new Nurse(
    "Lisa Peters",
    "lisa@hospital.nl",
    30,
    2500
);


// Afspraken maken
$appointment1 = new Appointment(
    $patient,
    $doctor,
    "09:00",
    "10:30"
);

$appointment2 = new Appointment(
    $patient,
    $doctor,
    "13:00",
    "14:00",
    $nurse
);


// Output
echo "<h1>Ziekenhuis</h1>";

echo "<h2>Patiënt</h2>";
echo "Naam: " . $patient->getName() . "<br>";
echo "Rol: " . $patient->getRole() . "<br>";
echo "Prijs behandeling: €" . $patient->getTreatmentPrice() . "<br>";

echo "<h2>Dokter</h2>";
echo "Naam: " . $doctor->getName() . "<br>";
echo "Rol: " . $doctor->getRole() . "<br>";
echo "Uurloon: €" . $doctor->getHourlyRate() . "<br>";
echo "Salaris: €" . $doctor->calculateSalary() . "<br>";

echo "<h2>Nurse</h2>";
echo "Naam: " . $nurse->getName() . "<br>";
echo "Rol: " . $nurse->getRole() . "<br>";
echo "Vast salaris: €" . $nurse->getBaseSalary() . "<br>";
echo "Salaris inclusief bonus: €" . $nurse->calculateSalary() . "<br>";

echo "<h2>Afspraken</h2>";

foreach (Appointment::getAppointments() as $appointment) {
    echo "Patiënt: " . $appointment->getPatient()->getName() . "<br>";
    echo "Dokter: " . $appointment->getDoctor()->getName() . "<br>";

    if ($appointment->getNurse() !== null) {
        echo "Nurse: " . $appointment->getNurse()->getName() . "<br>";
    } else {
        echo "Nurse: Geen nurse<br>";
    }

    echo "Start: " . $appointment->getStartTime()->format("H:i") . "<br>";
    echo "Einde: " . $appointment->getEndTime()->format("H:i") . "<br>";
    echo "Duur: " . $appointment->getDurationInHours() . " uur<br>";

    echo "<hr>";
}