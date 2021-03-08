<?php

namespace App\Controller;

use App\Api\PDL\PDLClient;
use App\Api\Xkcd\XkcdClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $data = [...(new XkcdClient)->getLatest(10),...(new PDLClient())->getLatest10()];
        usort($data, function($a, $b) {
            return (strtotime($a->getCreatedAt()) < strtotime($b->getCreatedAt())) ? 1 : -1;
        });
        return $this->json($data);
    }
}
