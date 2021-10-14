<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class PokemonController extends AbstractController
{

    public function index()
    {

        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'https://pokeapi.co/api/v2/pokedex/2/');
        $pokemones = $response->getContent();
        return $this->render('pokemon/index.html.twig', [
            'controller_name' => 'PokemonController',
            'pokemones' => json_decode($pokemones)
        ]);



    }
}
