<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/7/15
 * Time: 10:05 PM
 */

class Book extends Item {
    private $isbn;

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
}