<?php 
    class Reservation{
        private DateTime $dateDebut;
        private DateTime $dateFin;
        private Chambre $chambre;
        private Client $client;
        private Hotel $hotel;

        public function __construct(string $dateDebut, string $dateFin, Chambre $chambre, Client $client)
        {
            $this->dateDebut = new DateTime($dateDebut);
            $this->dateFin = new DateTime($dateFin);
            $this->chambre = $chambre;
            $this->client = $client;
            $this->hotel = $chambre->getHotel();
            $this->hotel->ajouterReservation($this);
        }

        // Getters et setters 
        // Métode pour obtenir la Date de début de la réservation 
        public function getDateDebut(): DateTime {
        // Retourne la date de début de la réservation
        
            return $this->dateDebut;
        }

        // Méthode pour définir la date de début de la reservation
        public function setDateDebut(DateTime $dateDebut): void {
            $this->dateDebut = $dateDebut;
        }

        // Méthode pour obtenir la date de fin de la réservation
        public function getDateFin(): DateTime {
            return $this->dateFin;
        }

        // Méthode pour définir la date de fin de la réservation 
        public function setDateFin(DateTime $dateFin): void {
            $this->dateFin = $dateFin;
        }

        // Méthode pour obtenir la chambre
        public function getChambre(): Chambre {
            return $this->chambre;
        }

        // Méthode pour définir la chambre
        public function setChambre(Chambre $chambre): void {
            $this->chambre = $chambre;
        }

        // Méthode pour obtenir le Client
        public function getClient(): Client {
            return $this->client;
        }

        // Méthode pour définir le client 
        public function setClient(Client $client): void {
            $this->client = $client;
        }

        // Méthode pour obtenir l'Hotel
        public function getHotel(): Hotel {
            return $this->hotel;
        }

        // Méthode pour définir l'Hotel
        public function setHotel(Hotel $hotel): Reservation {
            $this->hotel = $hotel;
            return $this;
        }
        
        
        public function clientReservations() {
            return $this->client->getPrenom()." ".$this->client->getNom()." - Chambre ".$this->chambre->getNumChambre()." - du ".$this->getDateDebut()->format('Y-m-d')." au ".$this->getDateFin()->format('Y-m-d');
        }
    }

?>