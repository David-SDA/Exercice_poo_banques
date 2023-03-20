<?php 
    function chargerClasse($classe){
        require $classe . '.class.php';
    }
    spl_autoload_register('chargerClasse');

    $titulaire1 = new Titulaire("Sousa", "David", "2001-01-08", "Strasbourg");
    $compteLivretJeune1 = new Compte("Livret Jeune", 1000, "€", $titulaire1);
    $compteLivretA1 = new Compte("Livret A", 2000, "€", $titulaire1);
    $compteCourant1 = new Compte("Compte Courant", 500, "€", $titulaire1);

    $titulaire2 = new Titulaire("Araujo", "Manuel", "2001-01-08", "Strasbourg");
    $compteLivretJeune2 = new Compte("Livret Jeune", 2000, "€", $titulaire2);
    $compteLivretA2 = new Compte("Livret A", 4000, "€", $titulaire2);
    $compteCourant2 = new Compte("Compte Courant", 1000, "€", $titulaire2);

    /* Test de l'affichage */
    echo $compteLivretA1;
    echo "<br>";

    /* Test de créditer et débiter */
    $compteLivretA1->créditer(500);
    echo $compteLivretA1;
    echo "<br>";

    $compteLivretA1->débiter(200);
    echo $compteLivretA1;
    echo "<br>";

    /* Affichage des comptes qui vont être tester */
    echo $compteCourant1;
    echo "<br>";
    echo $compteCourant2;
    echo "<br>";

    /* Test d'un virement qui fonctionne */
    $compteCourant1->virement($compteCourant2, 300);
    echo "<br>";
    /* Affichage des comptes concernés */
    echo $compteCourant1;
    echo "<br>";
    echo $compteCourant2;
    echo "<br>";

    /* Test d'un virement qui ne fonctionne pas */
    $compteCourant1->virement($compteCourant2, 300);
    echo "<br>";
    /* Affichage des comptes concernés */
    echo $compteCourant1;
    echo "<br>";
    echo $compteCourant2;
    echo "<br>";
    
    /* Affichage des infos du titulaire1 */
    echo $titulaire1;
    echo "<br>";

    /* Affichage des infos du titulaire2 */
    echo $titulaire2;
?>