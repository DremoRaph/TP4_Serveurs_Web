<?php
  $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=test1', 'postgres', 'Icecold357');

  $page = '';
  $test = '';
  
  
    try {

      $reponse = $dbh->query('SELECT * FROM liste_eleves');
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
        $prenom = null;
        $nom = null;
        $age = null;
        $hauteur = null;
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
              $prenom = $val;
              break;
            case 3:
              //echo $compteur;
              $nom = $val;
              break;
            case 4:
              //echo $compteur;
              $age = $val;
              break;
            case 5:
              //echo $compteur;
              $hauteur = $val;
              break;
            case 6:
              $programme = $val;
              $compteur = 0;
              $nouveauJSON = json_encode(['id' => $id, 'prenom' => $prenom, 'nom' => $nom, 'age' => $age, 'hauteur' => $hauteur, 'programme' => $programme]);
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