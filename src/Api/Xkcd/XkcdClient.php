<?php

namespace App\Api\Xkcd;

use App\Api\Xkcd\Dto\Xkcd;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class XkcdClient {

    private $client;

    private $serializer;

    public function __construct() {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $this->serializer = new Serializer(
            [new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter)],
            ['json' => new JsonEncoder()]
        );
        $this->client = new Client();
    }

    public function getLatest($num = 1): Xkcd|array {
        $response = $this->client->get(Xkcd::getBaseUrl() . 'info.0.json');
        /** @var Xkcd $first */
        $first = $this->serializer->deserialize($response->getBody()
            ->getContents(), Xkcd::class, 'json');

        if ($num === 1) {
            return $first;
        }
        $start = $first->getNum() - 1;
        $col[] = $first;
        foreach (range($start, $start - ($num - 2)) as $id) {
            $response = $this->client->get(str_replace('%id', $id, 'https://xkcd.com/%id/info.0.json'));
            $col[] = $this->serializer->deserialize($response->getBody()
                ->getContents(), Xkcd::class, 'json');
        }
        return $col;
    }

}
