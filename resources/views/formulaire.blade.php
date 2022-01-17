<?php


// FORMULAIRE
//erreur ?

//  function formulaire(){


//      if(isset($_POST['prenom']) && isset($_POST['nom'])) {

//          echo  $_POST['prenom'] $_POST['nom'];

//             #protégé nos données
//          $prenom = htmlspecialchars($_POST['prenom']) ;
//          $nom = htmlspecialchars( $_POST['nom']);

//             echo $prenom;
//     }

// }

// formulaire($prenom, $nom);

    echo '<form method="post" action="formulaire.blade.php">
                <p>
                    <tabel>
                        <tr>
                            <td>Prénom</td>
                            <td><input type="text" name="prenom" /></td>
                        </tr>

                        <tr>
                            <td>Nom</td>
                            <td><input type="texte" name="nom" /></td>
                        </tr>
                    </tabel>
                    <button type="submit">envoyer</button>
                </p>
            </form>';


?>
