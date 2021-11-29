<?php

namespace App\Controller;

use App\Entity\Membre;

use App\Entity\PropertySearch;

use App\Form\MembreType;
use App\Form\PropertySearchType;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    
 /**
    *@Route("/",name="membre_list")
    */
    public function home(Request $request)
    {
      $propertySearch = new PropertySearch();
      $form = $this->createForm(PropertySearchType::class,$propertySearch);
      $form->handleRequest($request);
     //initialement le tableau des membre est vide, 
     //c.a.d on affiche les membre que lorsque l'utilisateur clique sur le bouton rechercher
      $membre= [];
      
     if($form->isSubmitted() && $form->isValid()) {
      //on récupère le nameMembre d'membre tapé dans le formulaire
        $nameMembre = $propertySearch->getNameMembre();   
        if ($nameMembre!="") {
        //si on a fourni un nameMembre d'membre on affiche tous les membre ayant ce nameMembre
        $membre= $this->getDoctrine()->getRepository(Membre::class)->findBy(['nameMembre' => $nameMembre] );}
        else   
        {
        //si si aucun nameMembre n'est fourni on affiche tous les membre
         $membre= $this->getDoctrine()->getRepository(Membre::class)->findAll();}
     }
       return  $this->render('membre/index.html.twig',[ 'form' =>$form->createView(), 'membre' => $membre]);  
    }

}
