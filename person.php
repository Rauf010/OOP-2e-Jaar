<?php
abstract class Person {
    private $name;
    private $eyeColor;
    private $hairColor;
    private $height;
    private $weight;

    public function __construct($name, $eyeColor, $hairColor, $height, $weight) {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getName() {
        return $this->name;
    }

    public function getEyeColor() {
        return $this->eyeColor;
    }

    public function getHairColor() {
        return $this->hairColor;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getWeight() {
        return $this->weight;
    }

    abstract public function determineRole();
}
?>
