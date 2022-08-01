<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\MarquesRepository;
use App\Repository\ModelsRepository;
use App\Entity\Models;
use App\Entity\Marques;


class VoitureController extends AbstractController
{
    /**     
     *  @Route("/", name= "voiture")
     * */
    public function index(MarquesRepository $marquesRepo): Response
    {
        $marques = $marquesRepo->findAll();
        return $this->render('voiturecom/index.html.twig',['marques'=>$marques,]);
    }

    /**
     * @Route("/voiture/{id}", name="models")
     */
    public function models(Marques $marques)
    {
        return $this->render('voiturecom/models.html.twig',['marques'=>$marques,]);
    }
}
