//auteur rauf

<?php

abstract class Product {
    public $naam;
    public $inkoopprijs;
    public $btw;
    public $omschrijving;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving) {
        $this->naam = $naam;
        $this->inkoopprijs = $inkoopprijs;
        $this->btw = $btw;
        $this->omschrijving = $omschrijving;
    }

    abstract public function getProductInformatie();
}

class Music extends Product {
    public $artiest;
    public $nummers;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $artiest, $nummers) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->artiest = $artiest;
        $this->nummers = $nummers;
    }

    public function getProductInformatie() {
        $nummersList = "<ul>";
        foreach ($this->nummers as $nummer) {
            $nummersList .= "<li>$nummer</li>";
        }
        $nummersList .= "</ul>";
    
        return "Artiest: " . $this->artiest . "<br> Nummers: " . $nummersList . "Details: " . $this->omschrijving;
    }
    
}

class Film extends Product {
    public $kwaliteit;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $kwaliteit) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->kwaliteit = $kwaliteit;
    }

    public function getProductInformatie() {
        return "Kwaliteit: " . $this->kwaliteit;
    }
}

class Game extends Product {
    public $genre;
    public $minimaleHardware;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $genre, $minimaleHardware) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->genre = $genre;
        $this->minimaleHardware = $minimaleHardware;
    }

    public function getProductInformatie() {
        return "Genre: " . $this->genre . "<br> Minimale hardware eisen: <br> " . $this->minimaleHardware;
    }
}

class ProductList {
    public $producten = [];

    public function voegProductToe($product) {
        $this->producten[] = $product;
    }

    public function toonProducten() {
        echo "<table border='1'>";
        echo "<tr><th>Naam van product</th><th>Categorie</th><th>Verkoopprijs</th><th>Informatie over het product</th></tr>";
        foreach ($this->producten as $product) {
            $verkoopprijs = $product->inkoopprijs * (1 + $product->btw) * 1.2; 
            echo "<tr>";
            echo "<td>" . $product->naam . "</td>";
            echo "<td>" . $this->getCategorie($product) . "</td>";
            echo "<td>" . $verkoopprijs . "</td>";
            echo "<td>" . $product->getProductInformatie() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    private function getCategorie($product) {
        $className = get_class($product);
        $categories = [
            'Music' => 'Music',
            'Film' => 'Film',
            'Game' => 'Game'
        ];
    
        return $categories[$className];
    }
    
}

// Voorbeeld van gebruik:
$productList = new ProductList();
$productList->voegProductToe(new Music("Lijpe season", 20, 0.21, "2020 Lijpemusic", "Lijpe", ["Nieuwste RS6", "Mansory"]));
$productList->voegProductToe(new Music("M Huncho", 20, 0.21, "Huncho season", "Huncho", ["Tranquility", "Blof off my cover"]));
$productList->voegProductToe(new Film("One Piece: Film Red", 15.0, 0.21, "Eiichiro Oda", "4k"));
$productList->voegProductToe(new Film("The Blackening", 15.0, 0.21, "Tracy Oliver", "HD"));
$productList->voegProductToe(new Game("Pokemon", 10, 0.21, "Gamefreak", "Story", "4 GB RAM, AMD 7 FX-4350"));
$productList->voegProductToe(new Game("Lethal Company", 20, 0.21, "Multiplayer game", " Horror", "8 GB RAM, Core i5-4590"));


$productList->toonProducten();
?>
