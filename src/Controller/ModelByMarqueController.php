<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Models;
use App\Form\MarquesType;
use App\Repository\MarquesRepository;
use App\Repository\ModelsRepository;


class ModelByMarqueController extends AbstractController
{
    #[Route('{id}', name: 'app_model_by_marque')]
    public function modelByMarque(MarquesRepository $marqueRepo, ModelsRepository $modelRepo,Models $models) : Response
    {
        $marque=$marqueRepo->find($id);
        $model=$modelRepo->findBy(array('id'=>$id));

        return $this->render('@models/showModels.html.twig', [
            'models' => $models,
        ]);
    }
}
