<?php
    include "conn.php";
    $sql = "UPDATE SET shipdate_expected = NULL";
    $conn->query($sql);
    $sql = "SELECT shipdate_expected FROM sweetwater_test";
    $ships = $conn->query($sql);
    echo $ships;
?>