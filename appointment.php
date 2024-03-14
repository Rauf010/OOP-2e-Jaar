<?php
require_once 'Doctor.php';
require_once 'Patient.php';
require_once 'Nurse.php';

class Appointment {
    private $doctor;
    private $patient;
    private $nurse;
    private $startTime;
    private $endTime;

    public function __construct($doctor, $patient, $startTime, $endTime, $nurse = null) {
        $this->doctor = $doctor;
        $this->patient = $patient;
        $this->nurse = $nurse;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public static function calculateDuration($startTime, $endTime) {
        // Bereken de duur van de afspraak in uren
        $duration = $endTime->diff($startTime)->h;
        return $duration;
    }

    public function calculateCost() {
        $duration = self::calculateDuration($this->startTime, $this->endTime);
        $doctorSalary = $this->doctor->calculateSalary($duration);
        $nurseBonus = 0;
        if ($this->nurse) {
            $nurseBonus = $this->nurse->calculateSalary($duration);
        }
        return array($doctorSalary, $nurseBonus);
    }
}
?>
