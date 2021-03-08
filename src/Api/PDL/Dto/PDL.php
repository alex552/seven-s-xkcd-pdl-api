<?php

namespace App\Api\PDL\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PDL {

    private const BASE_URL = 'http://feeds.feedburner.com/PoorlyDrawnLines';

    private $title;

    private $url;

    private $description;

    private $createdAt;

    public function __construct($title,$url,$description,$createdAt) {

        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->createdAt = $createdAt;
    }

    public static function getBaseUrl(): string {
        return SELF::BASE_URL;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void {
        $this->url = $url;
    }


    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }


    /**
     * @return mixed
     */
    public function getCreatedAt() {
        $date =  new \DateTime($this->createdAt);
        return $date->format('Y-m-d');
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void {
        $this->createdAt = $createdAt;
    }

}
