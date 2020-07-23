<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PerformanceController extends AbstractController
{
    /**
     * @Route("/performance", name="performance")
     */
    public function index()
    {
        return $this->render('performance/index.html.twig', [
            'controller_name' => 'PerformanceController',
        ]);
    }
    /**
     * @Route("/performance/12", name="show_performance")
     */
    public function show() {
        return $this->render('performance/show_performance.html.twig');
    }
}
