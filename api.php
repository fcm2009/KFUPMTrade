<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 3:51 PM
 */

if(true) {
    include_once "search.php";
    if($objects != null) {
        print_r(json_encode($objects));
    }
    else {
         print(null);
    }
}

elseif(false) {
    $object = $_GET["add"];
    include_once "api.php";
}