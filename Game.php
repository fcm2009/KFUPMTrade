<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 12:22 AM
 */

class Game extends Item{
    private $gameId;

    public static function createItem($itemData)
    {
        $game = new Game($itemData["id"], $itemData["title"], $itemData["seller"], $itemData["price"]);
        $game->setGameId($itemData["gameId"]);
        $game->setDescription($itemData["description"]);
        $game->setImage($itemData["image"]);
        return $game;
    }

    /**
     * @return mixed
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * @param mixed $gameId
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

    function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        $json["gameId"] = $this->gameId;
        return $json;
    }
}