<?php
    class Chambre{
        private string $numChambre;
        private Hotel $hotel;
        private float $prix;
        private int $nombreLit;
        private bool $wifi;
        private bool $etat;
        private array $reservations;
    
        public function __construct(string $numChamb, Hotel $hotel, int $nombreLit, float $prix, bool $wifi, bool $etat)
        {
            $this->numChambre = $numChamb;
            $this->hotel = $hotel;
            $this->nombreLit = $nombreLit;
            $this->prix = $prix;
            $this->wifi = $wifi;
            $this->etat = $etat;
            $this->reservations = [];
        }
        
        public function addReservation(Reservation $reservation): void {
            $this->reservations[] = $reservation;
        }

        // 
        public function getReservations(): array {
            return $this->reservations;
        }

        // Méthode pour obtenir le numéro de la chambre 
        public function getNumChambre(): string {
            return $this->numChambre;
        }

        // Méthode pour définir le numéro de la chambre
        public function setNumChambre(string $numChambre): void {
            $this->numChambre = $numChambre;
        }

        // Méthode pour obtenir le nombre de lit par chambre 
        public function getNombreLit(): int {
            return $this->nombreLit;
        }

        // Méthode pour définir le nombre de lit par chambre 
        public function setNombreLit(int $nombreLit): void {
            $this->nombreLit = $nombreLit;
        }

        // Méthode pour obternir le prix de la chambre 
        public function getPrix(): float {
            return $this->prix;
        }

        // Méthode pour définir le prix de la chambre 
        public function setPrix(float $prix): void {
            $this->prix = $prix;
        }

        public function hasWifi(): string {  
            return $this->wifi ? "OUI" : "NON";
        }

        public function setWifi(bool $wifi): void {
            $this->wifi = $wifi;
        }

        public function getHotel(): Hotel {
            return $this->hotel;
        }

        public function setHotel(bool $hotel): void {
            $this->hotel = $hotel;
        }

        public function hasEtat() : string
        {
            if($this->etat===true ){
                return "<span class='etatFormeDispo'>Disponible</span>";
            } else {
                return  "<span class='etatFormeReserve'>Réservé</span>";
            }
        }

        public function setEtat(Chambre $etat) : void
        {
            $this->etat = $etat;
        }

        public function __toString()
        {
            return "";
        }
    }
?>