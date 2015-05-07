<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/7/15
 * Time: 11:47 PM
 */

class Tv extends Item {
    private $tvId;

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
}