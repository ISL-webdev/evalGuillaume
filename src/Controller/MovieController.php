<?php

namespace App\Controller;

use App\Entity\Movie;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/", name="")
     */
    public function index()
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    /**
     * @Route("/addmovie", name="addmovie")
     */
    public function addmovie()
    {
        $movie = new Movie();
        $movie->setTitle('')
            ->setGenre('')
            ->setActor('');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($movie);
        $entityManager->flush();
        return $this->render('movie/addmovie.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    /**
     * @Route("/genre", name="genre")
     */
    public function genre()
    {
        return $this->render('movie/genre.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }



    /**
     * @Route("/movie/{id}", name="show_movie")
     */
    public function show($id)
    {
        $movie = $this->getDoctrine()
            ->getRepository(movie::class)
            ->find($id);
        return $this->render('movie/showmovie.html.twig', [
            'movie' => '$movie',
        ]);
    }

    /**
     * @Route("/allmovies", name="allmovies")
     */
    public function allmovies()
    {
        $movie = $this->getDoctrine()
            ->getRepository(movie::class)
            ->find($id);
        return $this->render('movie/allmovies.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }


    /**
 * @Route("/addmovie", name="movies")
 *
public function addmovie(): Response
    {
        $movie = new Movie();
        $movie->setTitle('Interstellar')
            ->setGenre('SciFi')
            ->setActor('Matthew McConaughey');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($movie);
        $entityManager->flush();
        return new Response("Nouveau film ajouté : ".$movie->getTitle());
    }*/
}
