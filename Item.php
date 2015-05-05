<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/6/15
 * Time: 12:59 AM
 */

class Item {
    private $id;

    /**
     * Item constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
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
}