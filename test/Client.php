<?php 
    class Client{
        private string $nom;
        private string $prenom;
        private string $dateNaissance;
        private array $reservations;

        public function __construct(string $nom, string $prenom, string $dateNaissance)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateNaissance = $dateNaissance;
            $this->reservations = [];
        }
        
        // Méthode pour ajouter une réservation au client
        public function ajouterReservation(Reservation $reservation): void {
            $this->reservations[] = $reservation;
        }

        public function getReservations(): array {
            return $this->reservations;
        }


        // Méthode pour obtenir le nom du client
        public function getNom(): string {
            return $this->nom;
        }

        // Méthode pour définir le nom du client
        public function setNom(string $nom): void {
            $this->nom = $nom;
        }

        // Méthode pour obtenir le prénom du client
        public function getPrenom(): string {
            return $this->prenom;
        }

        
        // Méthode pour définir le prénom du client
        public function setPrenom(string $prenom): void {
            $this->prenom = $prenom;
        }

        
        // Méthode pour obtenir la date de naissance du client
        public function getDateNaissance(): string {
            return $this->dateNaissance;
        }

        
        // Méthode pour définir la date de naissance du client
        public function setDateNaissance(string $dateNaissance): void {
            $this->dateNaissance = $dateNaissance;
        }

        
        // Méthode pour afficher les réservations du client
        public function afficherReservations() {
            echo "<h3> Réservation de ".$this->getNom() ." " .$this->getPrenom()."</h3>" ;
            foreach ($this->reservations as $reservation) {
                echo  $this->getNom() . " " . $this->getPrenom() . " :\n";
                echo "Chambre : " . $reservation->getChambre()->getNumChambre() ."\n\n";
                echo "Date de début : " . $reservation->getDateDebut()->format('Y-m-d') . "\n";
                echo "Date de fin : " . $reservation->getDateFin()->format('Y-m-d') . "\n<br>";
            }
        }

        // Méthode __toString
        public function __toString()
        {
            return "";
        }
    }


?>  