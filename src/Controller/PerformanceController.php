<?php

namespace App\Controller;

use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PerformanceController extends AbstractController
{
    /**
     * @Route("/performance", name="performance")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Performance::class);
        $performances = $repo->findAll();

        return $this->render('performance/index.html.twig', [
            'controller_name' => 'PerformanceController',
                'performances' => $performances
        ]);
    }
    /**
     * @Route("/performance/{id}", name="show_performance")
     */
    public function show($id) {
        $repo = $this->getDoctrine()->getRepository(Performance::class);
        $performance = $repo->find($id);

        return $this->render('performance/show_performance.html.twig', [
            'performance' => $performance
        ]);
    }
}
