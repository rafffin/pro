<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     *
     * Dans Symfony, toutes les fonctions liées à une route
     * doivent retourner un objet de la classe Response !!!
     * 
     * Les noms des fichiers twig sont toujours donnés à partir 
     * du dossier template.
     * Les fichiers auront toujours l' extension .html.twig
     */
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'PoleS',
        ]);
    }

/**
 * @Route ("/test-base", name="app_test_base") 
 * 
 */
    public function test()
    {
        return $this->render("base.html.twig", [
            "nombre" => 5,
            "nom" => "Cérien"
        ]);
    }

    /**
     * @Route("/test/calcul", name="app_test_calcul" )
     */   
    public function calcul()
    {
        $a = 5;
        $b = 12;
        return $this->render("test/calcul.html.twig", [
            "nb1" => $a,
            "nb2" => $b,
        ]);

        /* EXO : Dans le navigateur, cette route doit afficher 5 + 12 = ... 
        (les valeurs 5 et 12 doivent être affichés avec les varibles. )
        */

    }


    /**
     * @Route("/test/calcul/{a}/{b}", name="app_test_calcul_dynamique", {"a"="\d+", "b"="[0-9]+"})
     * 
     * REGEX : EXpression REGulière
     * \d    : n' importe quel chiffree
     * [0-9] : n ' importe quel caractère entre 0 et 9
     * [.]   : le caractère .     
     * .     : n'importe quel caractère
     * ?     : le caractère précedent peut être présent 0 ou 1 fois
     * +     :                                          au moins 1 fois
     * 
     * 
     * La partie du chemin qui se trouve entre{} est dynamique. Ele peut être remplacée
     * par n' importe quelle chaîne de caractères.
     * Pour pouvoir utiliser ces valeurs passées dans l'URL, il faut déclarer des argumments dans
     * la fonction calculDynamique qui auront le même nom
     * Si le paramètre de la route n'est pas obligatoire, on ajoute un ? après le nom du paramètre
     */
    public function calculDynamique($a, $b)
    {
        return $this->render("test/calcul.html.twig", [
            "nb1" => $a,
            "nb2" => $b,
        ]);
    }

    /**
     * 
     * @Route ("/test-base", name="app_test_tableau") 
     * 
     */
    public function tableau()
    {
        $array = [ 5, 10, "Bonjour", "je m'appelle", true, 789, false, 12.5]; 
    return $this->render("test/tableau.html.twig", ["tableau" => $array ]);
   }

/**
 *  @Route ("/test/tableau-associatif", name="app_test_assoc") 
 */
public function tableauAssociatif()
{
    $p = [ "nom" => "Cérien","prenom" => "Jean"]; 
return $this->render("test/assoc.html.twig", ["var" => $p ]);

    /* EXO : affichez les valeurs du tableau $p */
}

/**
 * @Route ("/test/condition/{age}")
 */

public function condition($age)
{
    $array = [ 5, 10, "Bonjour", "je m'appelle", true, 789, false, 12.5]; 
    return $this->render("test/tableau.html.twig", ["age" => $age ]);
}

}
