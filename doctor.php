<?php
require_once 'Staff.php';

class Doctor extends Staff {
    private $hourlyRate;

    public function __construct($name, $eyeColor, $hairColor, $height, $weight, $hourlyRate) {
        parent::__construct($name, $eyeColor, $hairColor, $height, $weight);
        $this->hourlyRate = $hourlyRate;
    }

    public function calculateSalary($hoursWorked) {
        return $hoursWorked * $this->hourlyRate;
    }

    public function determineRole() {
        return "Doctor";
    }
}
?>
