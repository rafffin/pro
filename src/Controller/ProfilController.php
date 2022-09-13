<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil")
 */

class ProfilController extends AbstractController
{
    /**
     * @Route
     *
     * 
     */
   
    public function index(): Response
    {
        /**
         * Pour ecuperer les informations de l' utilisateur connecté dans le contrôleur :
         * $client = $this->getUser()
         */
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    /**
     * EXO : ajouter une route dans ce contrôleur pour affficher la liste des produits
     * dans une liste UL (pour chaque produit afficher le titre et le prix)
     */


         /**
     * @Route("/liste-produits"name="app_profil_liste")
     */
    public function liste(ProduitRepository $produitRepository)
    {
       return $this=>render("profil/liste_produits.html.twig", ["produits"=>$produitRepository->findAll()]);
    }


}
