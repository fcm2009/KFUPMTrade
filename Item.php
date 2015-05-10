<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/6/15
 * Time: 12:59 AM
 */

include_once "Factory.php";

abstract class Item implements JsonSerializable, Factory {
    private $id;
    private $title;
    private $seller;
    private $price;
    private $description;
    private $image;

    /**
     * Item constructor.
     * @param $title
     * @param $seller
     * @param $price
     */
    public function __construct($title, $seller, $price)
    {
        $this->title = $title;
        $this->seller = $seller;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @param mixed $seller
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "seller" => $this->seller,
            "price" => $this->price,
            "description" => $this->description,
            "image" => $this->image
        ];
    }

    public function toArray() {
        return [
            "title" => $this->title,
            "seller" => $this->seller,
            "price" => $this->price,
            "description" => $this->description,
            "image" => $this->image
        ];
    }

}