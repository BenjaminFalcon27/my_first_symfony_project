<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;

class ApiController extends AbstractController
{
  #[Route('/api')]
  public function index(): Response
  {
    $client = HttpClient::create();
    $response = $client->request('GET', 'https://api.chucknorris.io/jokes/random');
    $content = $response->getContent();
    $data = json_decode($content, true);
    return $this->render('api/api.html.twig', [
      'content' => $data['value'],
    ]);
  }
}
