<?php

class Euromillion
{

    /* Attributs */

    /* tableau avec les 50 boules */
    public $boules;

    /* tableau avec les 12 étoiles */
	public $etoiles;


    /* tableau pour contenir la saisie des boules par l'utilisateur */
    public $saisie_boules;

    /* tableau pour contenir la saisie des étoiles par l'utilisateur */
    public $saisie_etoiles;

    /* resultat du tirage pour les boules */
	public $resultat_boules;

    /* resultat du tirage pour les étoiles */
	public $resultat_etoiles;

	/* tableau des gains */
	public $gain;

	/*tableau de probabilité*/
	public $proba;


    public function __construct($num1, $num2, $num3, $num4, $num5, $num6, $num7)
    {

        /* Génération du tableau avec les 50 boules */
        $this->boules = array_merge(range(1, 50));


        /* Génération du tableau avec les 12 étoiles */
		$this->etoiles = array_merge(range(1, 12));


        /* tableau qui contient les boules choisi par l'utilisateur */
		$this->saisie_boules = array($num1, $num2, $num3, $num4, $num5);


        /* tableau qui contient les étoiles choisi par l'utilisateur */
		$this->saisie_etoiles = array($num6, $num7);


		/* tableau qui contiendra les boules du tirage */
		$this->resultat_boules = array();


        /* tableau qui contiendra les étoiles du tirage */
		$this->resultat_etoiles = array();


		/* tableau avec les gains possibles en fonction du nombre de boules et d'étoiles */
        $this->gain[0][0]=0;                //0 numéro + 0 étoile
        $this->gain[0][1]=0;                //0 numéro + 1 étoile
        $this->gain[0][2]=0;                //0 numéro + 2 étoile
        $this->gain[][0]=0;                 //1 numéro + 0 étoile
        $this->gain[1][1]=0;                //1 numéro + 1 étoile
        $this->gain[1][2]=10.40;            //1 numéro + 2 étoile
        $this->gain[2][0]=4;                //2 numéro + 0 étoile
        $this->gain[2][1]=7.40;             //2 numéro + 1 étoile
        $this->gain[2][2]=18.90;            //2 numéro + 2 étoile
        $this->gain[3][0]=10.30;            //3 numéro + 0 étoile
        $this->gain[3][1]=12.60;            //3 numéro + 1 étoile
        $this->gain[3][2]=103.10;           //3 numéro + 2 étoile
        $this->gain[4][0]=46;               //4 numéro + 0 étoile
        $this->gain[4][1]=129.30;           //4 numéro + 1 étoile
        $this->gain[4][2]=2934.00;          //4 numéro + 2 étoile
        $this->gain[5][0]=17138.50;         //5 numéro + 0 étoile
        $this->gain[5][1]=257544.00;        //5 numéro + 1 étoile
        $this->gain[5][2]='Jackpot';        //5 numéro + 2 étoile



        /* tableau avec les probabilités en fonction du nombre de boules et d'étoiles */
        $this->proba[0][0]=39.3;            //0 numéro + 0 étoile
        $this->proba[0][1]=17.5;            //0 numéro + 1 étoile
        $this->proba[0][2]=0.87;            //0 numéro + 2 étoile
        $this->proba[][0]=24;               //1 numéro + 0 étoile
        $this->proba[1][1]=10.7;            //1 numéro + 1 étoile
        $this->proba[1][2]=0.64;            //1 numéro + 2 étoile
        $this->proba[2][0]=4.38;            //2 numéro + 0 étoile
        $this->proba[2][1]=2.19;            //2 numéro + 1 étoile
        $this->proba[2][2]=0.12;            //2 numéro + 2 étoile
        $this->proba[3][0]=0.31;            //3 numéro + 0 étoile
        $this->proba[3][1]=0.15;            //3 numéro + 1 étoile
        $this->proba[3][2]=0.0085;          //3 numéro + 2 étoile
        $this->proba[4][0]=0.007;           //4 numéro + 0 étoile
        $this->proba[4][1]=129.30;          //4 numéro + 1 étoile
        $this->proba[4][2]=0.00019;         //4 numéro + 2 étoile
        $this->proba[5][0]=0.000032;        //5 numéro + 0 étoile
        $this->proba[5][1]=0.000014;        //5 numéro + 1 étoile
        $this->proba[5][2]=0.000000715;     //5 numéro + 2 étoile

    }


    public function grille(){

        for ($i = 0; $i < count($this->saisie_boules); $i++) {

            echo $this->saisie_boules[$i] . " ";                        /* Affiche les 5 numéros tirés contenus dans  le tableau $saisie; */
        }
    }

    public function etoile(){

        for ($i = 0; $i < count($this->saisie_etoiles); $i++) {

            echo $this->saisie_etoiles[$i] . " ";                       /* Affiche les 5 numéros tirés contenus dans  le tableau $saisie; */
        }
    }

    function affiche_saisie_utilisateur(){

        echo "Votre grille : ";
        echo $this->grille();
        echo "- Etoiles ";
        echo $this->etoile()."<br>";
    }


    public function tirage_boules()
    {

        $resultat = ' ';

        for ($i = 0; $i < 5; $i++) {

            /* longueur du tableau boules */
            $nb = count($this->boules) - 1;

            /* Mélange les éléments du tableau boules */
            shuffle($this->boules);

            /* prend une valeur aléatoire dans le tableau boules */
            $numero = $this->boules[mt_rand(0, $nb)];

            /* Recherche dans le tableau boules la clé associée à la valeur dans $numéro*/
            $indice = array_search($numero, $this->boules);

            /* Ajoute chaque numero dans le tableau resultat_boules */
            $this->resultat_boules[] = $numero;


            /* Détruit l'indice contenu dans $indice dans le tableau boules */
            unset($this->boules[$indice]);

            /* Ré-index le tableau boules */
            array_values($this->boules);

        }

        for($i=0; $i<5; $i++)
        {

            echo $this->resultat_boules[$i]." ";			/* Affiche les 5 numéros tirés contenus dans  resultat_boules */
        }

    }

    public function tirage_etoiles(){

        $resultat2 = ' ';

        for ($i = 0; $i < 2; $i++) {

            /* longueur du tableau etoiles */
            $nb = count($this->etoiles) - 1;

            /* Mélange les éléments du tableau boules */
            shuffle($this->etoiles);

            /* prend une valeur aléatoire dans le tableau étoiles */
            $numero2 = $this->etoiles[mt_rand(0, $nb)];

            /* Recherche dans le tableau étoiles la clé associée à la valeur dans $numéro2*/
            $indice = array_search($numero2, $this->etoiles);

            /* Ajoute chaque numero dans le tableau resultat_etoiles*/
            $this->resultat_etoiles[] = $numero2;


            /* Détruit l'indice contenu dans $indice dans le tableau étoiles */
            unset($this->etoiles[$indice]);

            /* Ré-index le tableau étoiles */
            array_values($this->etoiles);

        }

        for($i=0; $i<2; $i++)
        {
            /* Affiche les 2 étoiles tirées contenues dans tableau résultat_étoiles */
            echo $this->resultat_etoiles[$i]." ";
        }

    }

    public function  afficher_tirage() {

        echo "Résultat du tirage : ";
        echo $this->tirage_boules();
        echo " - Etoiles : ";
        echo $this->tirage_etoiles()."<br>";

    }

    public function gain()
    {

        /* retourne un tableau contenant toutes les valeurs de tableau saisie_boules qui sont présentes dans le tableau resultat_boules  */
        $valeur_boules = array_intersect($this->saisie_boules, $this->resultat_boules);


        /* Compte les élements du tableau valeur_boules */
        $nb_boules = count($valeur_boules);

         echo "Vous avez ".$nb_boules." boules <br>" ;


        /* retourne un tableau contenant toutes les valeurs de tableau saisie_etoiles qui sont présentes dans le tableau resultat_etoiles  */
        $valeur_etoiles = array_intersect($this->saisie_etoiles, $this->resultat_etoiles);


        /* Compte les élements du tableau valeur_etoiles */
        $nb_etoiles = count($valeur_etoiles);


        echo "Vous avez ".$nb_etoiles." étoiles<br>" ;


        /* Affiche le gain contenu dans le tableau gain en fonction de $nb_boules et $nb_etoiles. Affiche la probabilité contenu dans le tableau proba en fonction de $nb_boules et $nb_etoiles */
        echo "Vous avez gagné ".$this->gain[$nb_boules][$nb_etoiles]."€ <br> La probabilité de gagner cette somme était de ".$this->proba[$nb_boules][$nb_etoiles]." %";
    }


}


?>