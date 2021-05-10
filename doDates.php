<?php
    include "conn.php";
    $sql = "SELECT REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') AS dates, orderid FROM sweetwater_test WHERE REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') != ''";
    $dates = $conn->query($sql);
    foreach ($dates as $date) {
        print_r($date->dates);
        //"UPDATE sweetwater_test SET 'shipdate_expected' = {$new} WHERE orderid = \"{$date['orderid']}\"";
    }
    $sql = "SELECT REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') AS dates, orderid FROM sweetwater_test WHERE REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') != ''";
    $dates = $conn->query($sql);
    //echo $dates["dates"];
?>