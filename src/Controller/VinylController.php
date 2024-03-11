<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

use function Symfony\Component\String\u;


class VinylController extends AbstractController
{
    #[Route('/', name:'app_homepage')]
    public function homepage(Environment $twig): Response
    { 
      $tracks = [
        ['song' => 'Gangsta Paradise', 'artist' => 'coolio'],
        ['song' => 'oueli il darek', 'artist' => 'khaled'],
        ['song' => 'mr boombastic', 'artist' => 'Biggie Cheese'],
        ['song' => 'twenty one pilots', 'artist' => 'Ride'],
        ['song' => 'Astronaut In The Ocean', 'artist' => 'Masked Wolf']
        
     ];

        $html= $twig->render('main/homepage.html.twig' ,[
          'title' => 'PB & Jams',
          'track' =>$tracks,
        
        ]);

        return new Response($html);
        
    }
    


    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null) : Response {
      
      $genre=$slug ? u(str_replace('-',' ',$slug))->title(true):null;
      return $this->render('main/browse.html.twig',[
           'genre'=>$genre,
          

      ]);
    }

   
}