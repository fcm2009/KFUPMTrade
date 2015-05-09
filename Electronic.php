<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 12:14 AM
 */

class Electronic extends Item {

    public static function createItem($itemData)
    {
        $electronic = new Electronic($itemData["id"], $itemData["title"], $itemData["seller"], $itemData["price"]);
        $electronic->setDescription($itemData["description"]);
        $electronic->setImage($itemData["image"]);
        return $electronic;
    }
}