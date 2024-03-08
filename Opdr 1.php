<?php

class House {
    private $floors;
    private $rooms;
    private $width;
    private $height;
    private $depth;

    public function __construct($floors, $rooms, $width, $height, $depth) {
        $this->floors = $floors;
        $this->rooms = $rooms;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }

    public function getFloors() {
        return $this->floors;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function calculateVolume() {
        return $this->width * $this->height * $this->depth;
    }

    public function calculatePrice() {
        // Prijs hangt af van het aantal kubieke meters
        $cubicMeters = $this->calculateVolume() * $this->floors;
        return $cubicMeters * 1500;  // Prijs per kubieke meter is 1500 euro (willekeurige waarde)
    }
}

// Maak 3 huizen aan
$house1 = new House(2, 4, 5, 5, 10); // volume = 5 * 5 * 10 = 100
$house2 = new House(3, 6, 5, 6, 10); // volume = 5 * 6 * 10 = 150
$house3 = new House(2, 3, 3, 5, 5);  // volume = 3 * 5 * 5 = 75

// Print details van de huizen
echo "Het huis heeft " . $house1->getFloors() . " verdiepingen, " . $house1->getRooms() . " kamers en heeft een volume van " . $house1->calculateVolume() . "m3 en de prijs is " . $house1->calculatePrice() . " euro<br>";
echo "Het huis heeft " . $house2->getFloors() . " verdiepingen, " . $house2->getRooms() . " kamers en heeft een volume van " . $house2->calculateVolume() . "m3 en de prijs is " . $house2->calculatePrice() . " euro<br>";
echo "Het huis heeft " . $house3->getFloors() . " verdiepingen, " . $house3->getRooms() . " kamers en heeft een volume van " . $house3->calculateVolume() . "m3 en de prijs is " . $house3->calculatePrice() . " euro<br>";
?>
