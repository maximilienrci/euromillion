<!doctype html>
<html>

    <head>

        <meta charset="utf-8" />
		<link rel="stylesheet" href="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Titre</title>

    </head>


    <body>
	
		<form method="POST" action="">
		
			Saisie d'une grille: <br>
            Numéro 1 :<input type="number" name="numero1" ><br>
            Numéro 2 :<input type="number" name="numero2" ><br>
            Numéro 3 :<input type="number" name="numero3" ><br>
            Numéro 4 :<input type="number" name="numero4" ><br>
            Numéro 5 :<input type="number" name="numero5" ><br>
            Etoile 1 :<input type="number" name="numero6" ><br>
            Etoile 2 :<input type="number" name="numero7" ><br>

			<input type="submit" name="envoyer" value="Envoyer">


            <br>
            <br>


			
		</form>

    </body>

</html>



<?php

	require_once("euromillion_class.php");

	if(isset($_POST['envoyer'])) {

        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $numero3 = $_POST['numero3'];
        $numero4 = $_POST['numero4'];
        $numero5 = $_POST['numero5'];
        $numero6 = $_POST['numero6'];
        $numero7 = $_POST['numero7'];

        $euromillion = new Euromillion($numero1, $numero2, $numero3, $numero4, $numero5, $numero6, $numero7);


        $euromillion->affiche_saisie_utilisateur();
        $euromillion->afficher_tirage();
        $euromillion->gain();



    }






	
?>