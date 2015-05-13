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
    private $date;

    /**
     * Item constructor.
     * @param $id
     * @param $title
     * @param $seller
     * @param $price
     * @param $description
     * @param $image
     * @param $date
     */

    public function __construct($id, $title, $seller, $price, $description, $image, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->seller = $seller;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->date = $date;
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
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
            "type" => get_class($this),
            "description" => $this->description,
            "image" => $this->image,
            "date" => $this->date
        ];
    }

    public function toArray() {
        return $this->jsonSerialize();
    }
}