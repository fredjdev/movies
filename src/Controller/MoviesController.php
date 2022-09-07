<?php

namespace App\Controller;

use App\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="app_movies")
     */
    public function index(ApiService $apiService): Response
    {
        $genres = $apiService->getListGenre()['genres'];
        $movies = $apiService->getListMovies()['results'];
        $theBestMovie = null;
        $videoTheBestMovie = null;
        $max = 0;
        foreach($movies as $movie){
            if($max < $movie['vote_average']){
                $max = $movie['vote_average'];
                $theBestMovie = $movie;
            }
        }
        if($theBestMovie) {
           $videoTheBestMovie = $apiService->getVideosOfMovie($theBestMovie['id'])['results'][0];
        }
        return $this->render('movies/index.html.twig', [
            'controller_name' => 'MoviesController',
            'genres' => $genres,
            'movies' => $movies,
            'videoTheBestMovie' => $videoTheBestMovie,
        ]);
    }
}
