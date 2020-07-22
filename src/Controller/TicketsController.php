<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TicketsController extends AbstractController
{
    /**
     * @Route("/tickets", name="tickets")
     */
    public function index()
    {
        return $this->render('tickets/index.html.twig', [
            'controller_name' => 'TicketsController',
        ]);
    }
}
