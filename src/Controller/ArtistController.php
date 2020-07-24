<?php

namespace App\Controller;

use App\Entity\Artist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Artist::class);
        $artists = $repo->findAll();

        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
                     'artists' => $artists
        ]);
    }

    /**
     * @Route("/artist/{id}", name="show_artist")
     */
    public function show($id) {
        $repo = $this->getDoctrine()->getRepository(Artist::class);
        $artist = $repo->find($id);

        return $this->render('artist/show_artist.html.twig', [
            'artist' => $artist
        ]);
    }
}
