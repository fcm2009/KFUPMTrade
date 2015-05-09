<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/7/15
 * Time: 10:05 PM
 */

include_once "Item.php";

class Book extends Item {
    private $isbn;

    public static function createItem($itemData)
    {
        $book = new Book($itemData["id"], $itemData["title"], $itemData["seller"], $itemData["price"]);
        $book->setIsbn($itemData["isbn"]);
        $book->setDescription($itemData["description"]);
        $book->setImage($itemData["image"]);
        return $book;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        $json["isbn"] = $this->isbn;
        return $json;
    }

}