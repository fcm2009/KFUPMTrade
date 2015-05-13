<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 12:53 AM
 */

class Other extends Item {

    public static function createItem($itemData)
    {
        $other = new Other($itemData["id"], $itemData["title"], $itemData["seller"], $itemData["price"], $itemData["description"],
            $itemData["image"], $itemData["date"]);
        return $other;
    }
}