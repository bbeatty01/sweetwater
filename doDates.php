<?php
    include "conn.php";
    $sql = "SELECT REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') AS dates, orderid FROM sweetwater_test WHERE REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') != ''";
    $dates = $conn->query($sql);
    foreach ($dates as $date) {
        $newDate = $date['dates'];
        $newId = $date['orderid'];
        $sql = "UPDATE sweetwater_test SET 'shipdate_expected' = '$newDate' WHERE orderid = '$newId'";
        $conn->query($sql);
    }
    $sql = "SELECT REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') AS dates FROM sweetwater_test WHERE REGEXP_SUBSTR(comments, '([0-9]{2}/[0-9]{2})/[0-9]{2}') != ''";
    $dates = $conn->query($sql);
    echo $dates;
?>