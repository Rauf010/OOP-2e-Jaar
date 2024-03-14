<?php
require_once 'Staff.php';

class Nurse extends Staff {
    private $weeklySalary;

    public function __construct($name, $eyeColor, $hairColor, $height, $weight, $weeklySalary) {
        parent::__construct($name, $eyeColor, $hairColor, $height, $weight);
        $this->weeklySalary = $weeklySalary;
    }

    public function calculateSalary($hoursWorked) {
        // Hier wordt alleen de bonus van afspraken toegevoegd, het vaste salaris wordt niet berekend
        return $hoursWorked * $this->getHourlyRate();
    }

    public function getHourlyRate() {
        return $this->weeklySalary / 40; // Aannemend dat een werkweek 40 uur is
    }

    public function determineRole() {
        return "Nurse";
    }
}
?>
