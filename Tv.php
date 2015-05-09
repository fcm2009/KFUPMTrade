<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/7/15
 * Time: 11:47 PM
 */

class Tv extends Item {
    private $tvId;

    public static function createItem($itemData)
    {
        $tv = new Tv($itemData["id"], $itemData["title"], $itemData["seller"], $itemData["price"]);
        $tv->setTvId($itemData["tvId"]);
        $tv->setDescription($itemData["description"]);
        $tv->setImage($itemData["image"]);
        return $tv;
    }

    /**
     * @return mixed
     */
    public function getTvId()
    {
        return $this->tvId;
    }

    /**
     * @param mixed $tvId
     */
    public function setTvId($tvId)
    {
        $this->tvId = $tvId;
    }

    function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        $json["tvId"] = $this->tvId;
        return $json;
    }
}