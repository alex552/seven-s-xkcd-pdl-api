<?php

namespace App\Api\Xkcd\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Xkcd {

    private const BASE_URL = 'https://xkcd.com/';

    /**
     * @SerializedName("month")
     * @var string
     */
    private $month;

    /**
     * @SerializedName("num")
     * @var int
     */
    private $num;

    /**
     * @SerializedName("link")
     * @var string
     */
    private $link;

    /**
     * @SerializedName("year")
     * @var string
     */
    private $year;

    /**
     * @SerializedName("news")
     * @var string
     */
    private $news;

    /**
     * @SerializedName("safe_title")
     * @var string
     */
    private $safeTitle;

    /**
     * @SerializedName("transcript")
     * @var string
     */
    private $transcript;

    /**
     * @SerializedName("alt")
     * @var string
     */
    private $alt;

    /**
     * @SerializedName("img")
     * @var string
     */
    private $img;

    /**
     * @SerializedName("title")
     * @var string
     */
    private $title;

    /**
     * @SerializedName("day")
     * @var string
     */
    private $day;

    /**
     * @return string
     */
    public function getMonth(): ?string {
        return $this->month;
    }

    /**
     * @param string $month
     */
    public function setMonth(string $month): void {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getNum(): int {
        return $this->num;
    }

    /**
     * @param int $num
     */
    public function setNum(int $num): void {
        $this->num = $num;
    }

    /**
     * @return string
     */
    public function getLink(): ?string {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getYear(): ?string {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear(string $year): void {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getNews(): ?string {
        return $this->news;
    }

    /**
     * @param string $news
     */
    public function setNews(string $news): void {
        $this->news = $news;
    }

    /**
     * @return string
     */
    public function getSafeTitle(): ?string {
        return $this->safeTitle;
    }

    /**
     * @param string $safeTitle
     */
    public function setSafeTitle(string $safeTitle): void {
        $this->safeTitle = $safeTitle;
    }

    /**
     * @return string
     */
    public function getTranscript(): ?string {
        return $this->transcript;
    }

    /**
     * @param string $transcript
     */
    public function setTranscript(string $transcript): void {
        $this->transcript = $transcript;
    }

    /**
     * @return string
     */
    public function getAlt(): ?string {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void {
        $this->alt = $alt;
    }

    /**
     * @return string
     */
    public function getImg(): ?string {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string {
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
    public function getDay(): ?string {
        return $this->day;
    }

    /**
     * @param string $day
     */
    public function setDay(string $day): void {
        $this->day = $day;
    }

    public function getCreatedAt(): ?string {
        $date = \DateTime::createFromFormat("Y-m-d", implode('-', [
            $this->year,
            $this->month,
            $this->day,
        ]));
        return $date->format('Y-m-d');
    }

    public function getUrl(): ?string {
        return self::BASE_URL . $this->num;
    }

    public static function getBaseUrl(): ?string {
        return SELF::BASE_URL;
    }

}
