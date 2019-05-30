<?php
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=test1', 'postgres', 'Icecold357');
    
    if(ISSET($_POST["prenom"]) && ISSET($_POST["nom"]) && ISSET($_POST["age"]) && ISSET($_POST["hauteur"]) && ISSET($_POST["programme"]))
    {
        $prenom_eleve = $_POST["prenom"];
        $nom_eleve = $_POST["nom"];
        $age_eleve = $_POST["age"];
        $hauteur_eleve = $_POST["hauteur"];
        $programme_eleve = $_POST["programme"];
        $sql_insertion_eleve = "INSERT INTO public.liste_eleves(prenom, nom, age, hauteur, programme)
        VALUES ('$prenom_eleve' ,'$nom_eleve' , '$age_eleve' , '$hauteur_eleve' , '$programme_eleve')";
        $dbh->exec($sql_insertion_eleve);
        echo 'Eleve créé!';
    } else {
        echo 'Veuillez remplir les champs!';
    }
    

    
    
?>