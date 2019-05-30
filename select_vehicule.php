<?php
  $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=test1', 'postgres', 'Icecold357');

  $page = '';
  $test = '';
  
  
    try {

      $reponse = $dbh->query('SELECT * FROM liste_vehicules');
      $tableauPHP = $reponse->fetchAll(PDO::FETCH_ASSOC);
    
    
    } catch (PDOException $e) 
    {
      //print "Error!: " . $e->getMessage() . "<br/>";
      die(); 
    }
    $JSON = '';
    foreach ($tableauPHP as $valeur)
    {
    
        //print_r($valeur);
        $id = null;
        $fabricant = null;
        $nom_modele = null;
        $couleur = null;
        $droits_parking = null;
        $programme = null;
        $compteur = 1;

        foreach ($valeur as $cle => $val)
        {
          switch ($compteur) {
            case 1:
              //echo $compteur;
              $id = $val;
              break;
            case 2:
              //echo $compteur;
              $fabricant = $val;
              break;
            case 3:
              //echo $compteur;
              $nom_modele = $val;
              break;
            case 4:
              //echo $compteur;
              $couleur = $val;
              break;
            case 5:
              //echo $compteur;
              $droits_parking = $val;
              break;
            case 6:
              $proprietaire_eleveid = $val;
              $compteur = 0;
              $nouveauJSON = json_encode(['id' => $id, 'fabricant' => $fabricant, 'nom_modele' => $nom_modele, 'couleur' => $couleur, 'droits_parking' => $droits_parking, 'proprietaire_eleveid' => $proprietaire_eleveid]);
              $JSON .= $nouveauJSON;
              $JSON .= '/';
              break;
          
          }
          $compteur += 1;

          
          
    
        }
      
      
    
    }
    echo $JSON;
    
    
    /*
    echo '<h1>Liste des élèves enregistrés au CÉGEP</h1>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Prenom</th><th>Nom</th><th>Age</th><th>Taille (cm)</th><th>Technique</th></tr>';
    foreach ($tableauPHP as $valeur)
    {
    
        //print_r($valeur);
        echo '<tr>';
        foreach ($valeur as $cle => $val)
        {
    
            echo '<td>';
            echo $val;
            echo '</td>';
    
        }
        echo '</tr>';
    
    }
    echo '</table>'; */
    

  
    




?>