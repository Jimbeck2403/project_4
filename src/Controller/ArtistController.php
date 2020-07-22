<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist")
     */
    public function index(ArtistRepository $repo)
    {
        $artists = $repo->findAll();
        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
            'artists' => $artists
        ]);
    }
    /**
     * @Route("/artist/{id}", name="show_artist")
     */
    public function show(Artist $artist){

        return $this->render('artist/show_artist.html.twig',[
            'artist' => $artist
        ]);
    }
}
