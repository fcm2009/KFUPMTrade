<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/9/15
 * Time: 12:40 AM
 */

include_once "Factory.php";
include_once "Book.php";
include_once "Electronic.php";
include_once "Game.php";
include_once "Home.php";
include_once "Movie.php";
include_once "Other.php";
include_once "Tv.php";

class ItemFactory implements Factory {

    public static function createItem($itemData)
    {
        if($itemData["type"] == "Book")
            return Book::createItem($itemData);
        elseif($itemData["type"] == "Electronic")
            return Electronic::createItem($itemData);
        elseif($itemData["type"] == "Game")
            return Game::createItem($itemData);
        elseif($itemData["type"] == "Home")
            return Home::createItem($itemData);
        elseif($itemData["type"] == "Movie")
            return Movie::createItem($itemData);
        elseif($itemData["type"] == "Other")
            return Other::createItem($itemData);
        elseif($itemData["type"] == "Tv")
            return Tv::createItem($itemData);
        else
            return null;
    }
}

