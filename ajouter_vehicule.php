<?php
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=test1', 'postgres', 'Icecold357');
    
    $reponse = '';
    if(ISSET($_POST["fabricant"]) && ISSET($_POST["modele"]) && ISSET($_POST["couleur"]) && ISSET($_POST["parking"]) && ISSET($_POST["proprietaire"]))
    {
        $fabricant_vehicule = $_POST["fabricant"];
        $modele_vehicule = $_POST["modele"];
        $couleur_vehicule = $_POST["couleur"];
        $parking_vehicule = $_POST["parking"];
        $id_proprio_vehicule = $_POST["proprietaire"];
        $sql_insertion_vehicule = "INSERT INTO public.liste_vehicules(fabricant, nom_modele,
        couleur, droits_parking, proprietaire_eleveid) VALUES ('$fabricant_vehicule' ,'$modele_vehicule' ,
        '$couleur_vehicule' , '$parking_vehicule' , '$id_proprio_vehicule')";
         $dbh->exec($sql_insertion_vehicule);
        $reponse = 'Vehicule créé!';
    } else {
        $reponse = 'Veuillez remplir les champs!';
    }
    echo $reponse;
    

    
    
?>