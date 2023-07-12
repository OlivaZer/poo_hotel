<?php 

class Hotel{
    private string $nom;
    private string $address;
    private array $chambres;
    private array $reservations;

    public function __construct(string $nom, string $address)
    {
        $this->nom = $nom;
        $this->address = $address;
        $this->chambres = [];
        $this->reservations = [];
    }

// getter et setter 
    public function getNom() : string
    {
        return $this->nom;
    }
    public function setNom(string $nom) : Hotel
    {
        $this->nom = $nom;

        return $this;
    }
// getter et setter 
    public function getAddress() : string
    {
        return $this->address;
    }

    public function setAddress(string $address) : Hotel
    {
        $this->address = $address;

        return $this;
    }

    public function ajouterChambre(Chambre $chambre) {
            $this->chambres[] = $chambre;
    }

//getter et setter 
    public function getChambres(): array {
        return $this->chambres;
    }
    public function setChambres() : void {
        $this->chambres = [];
    }

   
    public function ajouterReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    public function getReservations(): array {
        return $this->reservations;
    }

    public function chambreDisponible(): int
    {
        return count($this->chambres) - count($this->reservations);
    }

// Afficher le nom
    public function afficherNom() : string 
    {
        return "$this->nom";
    }
    public function afficherHotel(): string
    {
        return "<h3>".$this->nom . "</h3>" . $this->address . "<br>
        Nombre de chambres : " . count($this->chambres) . "<br>
        Nombre de chambres réservées : " . count($this->reservations) . "<br>
        Nombre de chambres disponibles : " . $this->chambreDisponible() . "<br> 
        <br>";
    }



// afficher les reservation
    public function afficherReservations() {
        echo "<h3>Réservations de l'hôtel : " . $this->nom . "</h3><br>";
        $reservationsHotel = array_filter($this->reservations, function ($reservation) {
            return $reservation->getChambre()->getHotel() === $this;
        });
        if (count($reservationsHotel) === 0) {
            echo "Aucune réservation !!!!!" . "<br><br>";
        } else {
            foreach ($reservationsHotel as $reservation) {
                echo $reservation->clientReservations() . "<br>";
            }
        }
    }

    public function afficherStatutsChambres(){
        echo "Statuts des chambres de <strong>".$this->nom."</strong><br><br>";
        echo "<table class='tableStatus'><thead><tr><th>Chambre</th><th>Prix</th><th>Wifi</th><th>État</th></tr></thead>";
        foreach ($this->chambres as $chambre) {
            echo "<tbody><tr><td>"."Chambre ".$chambre->getNumChambre()." </td><td>".$chambre->getPrix()." €</td><td>".$chambre->hasWifi()."</td><td>".$chambre->hasEtat()."</td></tr></tbody>";
        }
        echo "</table>";
    }

    public function __toString(): string
    {
        return "";
    }


}


?>