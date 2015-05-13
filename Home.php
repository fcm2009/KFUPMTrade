<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 12:52 AM
 */

class Home extends Item {

    public static function createItem($itemData)
    {
        $home = new Home($itemData["id"], $itemData["title"], $itemData["seller"], $itemData["price"], $itemData["description"],
            $itemData["image"], $itemData["date"]);
        return $home;
    }
}