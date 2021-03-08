<?php

namespace App\Api\PDL;

use App\Api\PDL\Dto\PDL;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

class PDLClient {

    private $client;

    private $serializer;

    public function __construct() {
        $this->client = new Client();
    }

    public function getLatest10(): array {
        $response = $this->client->get(PDL::getBaseUrl());
        $data = (new XmlEncoder())->decode($response->getBody()->getContents(),'xml');
        $res = [];
        foreach($data['channel']['item'] as $item){
            $res[] = new PDL(
                $item['title'],
                $item['link'],
                $item['description'],
                $item['pubDate']
            );
        }
        return $res;
    }

}
