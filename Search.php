<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 3:12 PM
 */

$sql = "SELECT id FROM Item
        WHERE title LIKE '%:keyword%'";
$keyword = "a";

try {
$db = new PDO("msql:host=localhost;port=3306;dbname=KFUPMTrade", "root", "hg,i,l,vh");
$db->prepare($sql);
$result = $db->exec(array(/*"category" => $_GET["category"],*/ "keyword" => $keyword));
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}

foreach($result as $row) {
    foreach ($row as $value) {
        echo $value;
    }
}



