<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/7/15
 * Time: 11:32 PM
 */

class Movie extends Item {
    private $movieId;

    public static function createItem($itemData)
    {
        $movie = new Movie($itemData["id"], $itemData["title"], $itemData["seller"], $itemData["price"], $itemData["description"],
            $itemData["image"], $itemData["date"]);
        $movie->setMovieId($itemData["movieId"]);
        return $movie;
    }

    /**
     * @return mixed
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    /**
     * @param mixed $movieId
     */
    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }

    function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        $json["movieId"] = $this->movieId;
        return $json;
    }
}