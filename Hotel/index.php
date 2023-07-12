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
    
</body>
</html>



<?php

spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$hotelStrasbourg = new Hotel("Hilton **** Strasbourg", "10 rue de la Gare 67000 Strasbourg");
$hotelParis = new Hotel("Regent **** Paris", "25 rue de la Gare 31000 Paris");

$chambre1 = new Chambre("1",$hotelStrasbourg, 2, 150.0, false, true,);
$chambre2 = new Chambre("2",$hotelStrasbourg, 2, 150.0, false, true);
$chambre3 = new Chambre("3",$hotelStrasbourg, 2, 150.0, false, false);

$chambre16 = new Chambre("16",$hotelStrasbourg, 2, 300.0, true, true);
$chambre17 = new Chambre("17",$hotelStrasbourg, 2, 400.0, true, false);
$chambre18 = new Chambre("18",$hotelStrasbourg, 2, 400.0, true, true);
$chambre19 = new Chambre("19",$hotelStrasbourg, 2, 400.0, true, false);



$hotelStrasbourg->ajouterChambre($chambre1);
$hotelStrasbourg->ajouterChambre($chambre2);
$hotelStrasbourg->ajouterChambre($chambre3);
$hotelStrasbourg->ajouterChambre($chambre16);
$hotelStrasbourg->ajouterChambre($chambre17);
$hotelStrasbourg->ajouterChambre($chambre18);
$hotelStrasbourg->ajouterChambre($chambre19);

$client1 = new Client("Mickael", "MURNANN", "1980-12-24");
$client2 = new Client("Jean", "RENO", "1948-07-30");


$reservation1 = new Reservation("01-01-2021", "2021-01-01",$chambre1, $client1);
$reservation1->setClient($client1);
$reservation1->setChambre($chambre1);

$reservation2 = new Reservation("2021-03-11", "2021-03-11", $chambre2, $client2);
$reservation2->setClient($client2);
$reservation2->setChambre($chambre2);

$reservation3 = new Reservation("2021-04-01", "2021-04-01", $chambre3, $client2);



$client1->ajouterReservation($reservation1);
$client2->ajouterReservation($reservation2);
$client2->ajouterReservation($reservation3);
$hotelStrasbourg->ajouterReservation($reservation1);
$hotelStrasbourg->ajouterReservation($reservation2);
$hotelStrasbourg->ajouterReservation($reservation3);

echo $hotelStrasbourg->afficherHotel();
$hotelStrasbourg->afficherReservations();
echo $hotelStrasbourg;
$hotelParis->afficherReservations();

$client2->afficherReservations();

$hotelStrasbourg->afficherStatutsChambres();


?>


