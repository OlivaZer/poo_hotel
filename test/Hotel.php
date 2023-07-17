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
            $this ->chambres = [];
            $this->reservations = [];
            }

            
        public function ajouterChambresInitiales() {
            $chambre1 = new Chambre("1",$this, 2, 150.0, false, true);
            $chambre2 = new Chambre("2",$this, 2, 150.0, false, true);
            $chambre3 = new Chambre("3",$this, 2, 150.0, false, false);
            $chambre16 = new Chambre("16",$this, 2, 300.0, true, true);
            $chambre17 = new Chambre("17",$this, 2, 400.0, true, false);
            $chambre18 = new Chambre("18",$this, 2, 400.0, true, true);
            $chambre19 = new Chambre("19",$this, 2, 400.0, true, false);
        
            $this->ajouterChambre($chambre1);
            $this->ajouterChambre($chambre2);
            $this->ajouterChambre($chambre3);
            $this->ajouterChambre($chambre16);
            $this->ajouterChambre($chambre17);
            $this->ajouterChambre($chambre18);
            $this->ajouterChambre($chambre19);
        }
        // Guetters et setters
        // Méthode pour obtenir le nom de l'Hotel
        public function getNom(): string {
            return $this->nom;
        }
        
        // Méthode pour définir le nom de l'Hotel
        public function setNom(string $nom): Hotel {
            $this->nom = $nom;
            return $this;
        }
        
            
        // Méthode pour obtenir l'adresse de l'Hotel
        public function getAddress(): string {
            return $this->address;
        }
        
        // Méthode pour définir le nom de l'Hotel 
        public function setAddress(string $address): Hotel {
            $this->address = $address;
            return $this;
        }
        
        // Ajouter une chambre à l'hôtel
        public function ajouterChambre(Chambre $chambre) {
            $this->chambres[] = $chambre;
        }
        
        // Obtenir toutes les chambres de l'hôtel
        public function getChambres(): array {
            return $this->chambres;
        }
        
        // Ajouter une réservation à l'hôtel
        public function ajouterReservation(Reservation $reservation) {
            $this->reservations[] = $reservation;
            $reservation->getChambre()->addReservation($reservation);
            $reservation->getClient()->ajouterReservation($reservation);
        }
        
        // Obtenir toutes les réservations de l'hôtel
        public function getReservations(): array {
            return $this->reservations;
        }

        // Afficher le nombre de chambres disponibles
        public function chambreDisponible(): int
        {
            return count($this->chambres) - count($this->reservations);
        }
        
        // Afficher le nom de l'hôtel
        public function afficherNom(): string 
        {
            return $this->nom;
        }

        // Afficher les informations de l'hôtel
        public function afficherHotel(): string
        {
            return "<h3>".$this->nom . "</h3>" . $this->address . "<br>
            Nombre de chambres : " . count($this->chambres) . "<br>
            Nombre de chambres réservées : " . count($this->reservations) . "<br>
            Nombre de chambres disponibles : " . $this->chambreDisponible() . "<br> 
            <br>";
        }
        
        // Afficher les réservations de l'hôtel
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