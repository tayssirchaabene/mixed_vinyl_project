<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class SongController extends AbstractController{

    #[Route('/api/songs/{id<\d+>}', methods:['GET'],name:'api_songs_get_one')]
    public function getSong(int $id,LoggerInterface $logger): Response{


        $song = [
            1=>['name' => 'Gangsta Paradise','url' => '/audio/music1.mp3'],
            2=>['name' => 'ueli il darek','url' => '/audio/music2.mp3'],
            3=>['name' => 'mr boombastic','url' => '/audio/music3.mp3'],
            4=>['name' => 'Wtwenty one pilots','url' => '/audio/music4.mp3'],
            5=>['name' => 'Astronaut In The Ocean','url' => '/audio/music5.mp3']

           
        ];

        
        return $this->json($song[$id]);

        
    }

}