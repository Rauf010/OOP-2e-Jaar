<?php
require_once 'Person.php';

class Patient extends Person {
    public function determineRole() {
        return "Patient";
    }
}
?>
