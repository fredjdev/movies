<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    private $client;
    private $keyTMDB = '9267f245122ea29e308d4653b492b7ec';

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getListGenre(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/genre/movie/list?api_key=' . $this->keyTMDB
        );

        return $response->toArray();
    }
    public function getListMovies(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/movie/top_rated?api_key=' . $this->keyTMDB
        );

        return $response->toArray();
    }
    public function getVideosOfMovie($idMovie): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/movie/' . $idMovie . '/videos?api_key=' . $this->keyTMDB
        );

        return $response->toArray();
    }
}