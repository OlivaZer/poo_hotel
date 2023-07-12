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
    
    public function ajouterReservation(Reservation $reservation): void {
        $this->reservations[] = $reservation;
    }

    public function getReservations(): array {
        return $this->reservations;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    public function getDateNaissance(): string {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): void {
        $this->dateNaissance = $dateNaissance;
    }

    public function afficherReservations() {
        echo "<h3> Réservation de ".$this->getNom() ." " .$this->getPrenom()."</h3>" ;
        foreach ($this->reservations as $reservation) {
            echo  $this->getNom() . " " . $this->getPrenom() . " :\n";
            echo "Chambre : " . $reservation->getChambre()->getNumChambre() ."\n\n";
            echo "Date de début : " . $reservation->getDateDebut() . "\n";
            echo "Date de fin : " . $reservation->getDateFin() . "\n<br>";
        }
    }

    public function __toString()
    {
        return "";
    }
}



?>  