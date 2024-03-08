<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuren</title>
    <style>
        .figure-container {
            display: inline; /* Wijzig display naar inline */
            padding: 10px 0; /* Voeg verticale padding toe */
            vertical-align: top; /* Zet verticale uitlijning bovenaan */
        }
    </style>
</head>
<body>

<?php

class Figuur {
    protected $kleur;

    public function __construct($kleur) {
        $this->kleur = $kleur;
    }

    public function getKleur() {
        return $this->kleur;
    }

    public function setKleur($kleur) {
        $geldige_kleuren = ['rood', 'groen', 'blauw', 'geel', 'oranje', 'paars'];
        if (in_array($kleur, $geldige_kleuren)) {
            $this->kleur = $kleur;
        } else {
            echo "Ongeldige kleur!";
        }
    }
}

class Rechthoek extends Figuur {
    private $width;
    private $height;
    private $x;
    private $y;
    private $rx;
    private $ry;

    public function __construct($kleur, $width, $height, $x, $y, $rx, $ry) {
        parent::__construct($kleur);
        $this->width = $width;
        $this->height = $height;
        $this->x = $x;
        $this->y = $y;
        $this->rx = $rx;
        $this->ry = $ry;
    }

    public function teken() {
        return "<div class='figure-container'><svg width='{$this->width}' height='{$this->height}' xmlns='http://www.w3.org/2000/svg'>
                    <rect width='{$this->width}' height='{$this->height}' x='{$this->x}' y='0' rx='{$this->rx}' ry='{$this->ry}' fill='{$this->getKleur()}' />
                </svg></div>";
    }
}

class Cirkel extends Figuur {
    private $r;
    private $cx;
    private $cy;
    private $stroke;
    private $stroke_width;

    public function __construct($kleur, $r, $cx, $cy, $stroke, $stroke_width) {
        parent::__construct($kleur);
        $this->r = $r;
        $this->cx = $cx;
        $this->cy = $cy;
        $this->stroke = $stroke;
        $this->stroke_width = $stroke_width;
    }

    public function teken() {
        return "<div class='figure-container'><svg height='" . ($this->r * 2) . "' width='" . ($this->r * 2) . "' xmlns='http://www.w3.org/2000/svg'>
                    <circle r='{$this->r}' cx='{$this->r}' cy='{$this->r}' stroke='{$this->stroke}' stroke-width='{$this->stroke_width}' fill='{$this->getKleur()}' />
                </svg></div>";
    }
}

class Driehoek extends Figuur {
    private $points;
    private $stroke;
    private $stroke_width;
    private $width;
    private $height;
    private $x;

    public function __construct($kleur, $points, $stroke, $stroke_width, $width, $height, $x) {
        parent::__construct($kleur);
        $this->points = $points;
        $this->stroke = $stroke;
        $this->stroke_width = $stroke_width;
        $this->width = $width;
        $this->height = $height;
        $this->x = $x;
    }

    public function teken() {
        return "<div class='figure-container'><svg width='{$this->width}' height='{$this->height}' xmlns='http://www.w3.org/2000/svg'>
                    <polygon points='{$this->points}' style='fill:{$this->getKleur()};stroke:{$this->stroke};stroke-width:{$this->stroke_width}' transform='translate({$this->x})' />
                </svg></div>";
    }
}

$figuren_per_type = [
    'vierkanten' => [
        new Rechthoek("blue", 150, 10, 10, 0, 0, 0),
        new Rechthoek("blue", 100, 100, 0, 0, 0, 0),
        new Rechthoek("blue", 100, 100, 0, 0, 0, 0)
    ],
    'cirkels' => [
        new Cirkel("red", 45, 50, 0, "green", 3),
        new Cirkel("red", 45, 50, 0, "green", 3),
        new Cirkel("red", 45, 50, 0, "green", 3)
    ],
    'rechthoeken' => [
        new Rechthoek("yellow", 150, 50, 0, 0, 0, 0),
        new Rechthoek("yellow", 150, 50, 0, 0, 0, 0),
        new Rechthoek("yellow", 150, 50, 0, 0, 0, 0)
    ],
    'driehoeken' => [
        new Driehoek("lime", "50,10 100,190 0,190", "purple", 3, 200, 200, 20),
        new Driehoek("lime", "0,0 100,200 200,0", "purple", 3, 200, 200, 20),
        new Driehoek("lime", "0,0 100,0 50,100", "purple", 3, 200, 200, 20)
    ]
];

function printFiguurRow($figuren) {
    foreach ($figuren as $figuur) {
        echo $figuur->teken();
    }
    echo "<br>";
}

foreach ($figuren_per_type as $type => $figuren) {
    printFiguurRow($figuren);
}

?>

</body>
</html>
