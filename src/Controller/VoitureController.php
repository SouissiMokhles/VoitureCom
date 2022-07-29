<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\MarquesRepository;
use App\Repository\ModelsRepository;


class VoitureController extends AbstractController
{
    /**     
     *  @Route("/voiture", name= "voiture")
     * */
    public function index(MarquesRepository $marquesRepo): Response
    {
        $marques = $marquesRepo->findAll();
        return $this->render('index.html.twig',[
            'marques'=>$marques,
        ]);
    }
}
