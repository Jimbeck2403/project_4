<?php

namespace App\Controller;

use App\Entity\Performance;
use App\Repository\PerformanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    /**
     * @Route("/show", name="show")
     */
    public function index(PerformanceRepository $repo)
    {
        $performances = $repo->findAll();
        return $this->render('show/index.html.twig', [
            'controller_name' => 'ArtistController',
            'performances' => $performances
        ]);
    }

    /**
     * @Route("/show/{id}", name="representation")
     */
    public function show(Performance $performance, $id)
    {
        return $this->render('show/representation.html.twig',[
            'performance' => $performance
        ]);
    }
}
