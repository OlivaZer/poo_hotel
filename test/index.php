<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>POO Hotel</title>
</head>
<body>
    <h1>POO Hotel</h1>

    <?php
        spl_autoload_register(function ($class_name) {
            require $class_name . '.php';
        });

        // Création de l'objet Hotel
        $hotelStrasbourg = new Hotel("Hilton **** Strasbourg", "10 rue de la Gare 67000 Strasbourg");
        $hotelParis = new Hotel("Regent **** Paris", "25 rue de la Gare 31000 Paris");


        // Ajout des chambres et des réservations initiales à l'hôtel Strasbourg
        $hotelStrasbourg->ajouterChambresInitiales();

        
        // Création de deux objets Client
        $client1 = new Client("Mickael", "MURNANN", "1980-12-24");
        $client2 = new Client("Jean", "RENO", "1948-07-30");

        // $hotelStrasbourg->ajouterChambre($chambre1);
        //$hotelStrasbourg->ajouterChambre($chambre2);
        //$hotelStrasbourg->ajouterChambre($chambre3);
        //$hotelStrasbourg->ajouterChambre($chambre16);
        //$hotelStrasbourg->ajouterChambre($chambre17);
        //$hotelStrasbourg->ajouterChambre($chambre18);
        //$hotelStrasbourg->ajouterChambre($chambre19);

        $reservation1 = new Reservation("01-01-2021", "2021-01-01", $hotelStrasbourg->getChambres()[0], $client1);

        $reservation2 = new Reservation("2021-03-11", "2021-03-11", $hotelStrasbourg->getChambres()[1], $client2);

        $reservation3 = new Reservation("2021-04-01", "2021-04-01", $hotelStrasbourg->getChambres()[2], $client2);

        //$client1->ajouterReservation($reservation1);
        //$client2->ajouterReservation($reservation2);
        //$client2->ajouterReservation($reservation3);
        //$hotelStrasbourg->ajouterReservation($reservation1);
        //$hotelStrasbourg->ajouterReservation($reservation2);
        //$hotelStrasbourg->ajouterReservation($reservation3);


        $client1->ajouterReservation($reservation1);
       // $client2->ajouterReservation($reservation2);
        //$client2->ajouterReservation($reservation3);

        echo $hotelStrasbourg->afficherHotel();
        $hotelStrasbourg->afficherReservations();
        echo $hotelStrasbourg;
        $hotelParis->afficherReservations();

        $client2->afficherReservations();

        $hotelStrasbourg->afficherStatutsChambres();
    
    ?>
</body>
</html>