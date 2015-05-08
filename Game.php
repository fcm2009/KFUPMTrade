<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 12:22 AM
 */

class Game {
    private $gameId;

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