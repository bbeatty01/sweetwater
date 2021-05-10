<?php
    /* connect to DB */
    include "inc/conn.php";
    /* make all the silly requests and load them into objects */
    $sql = "SELECT comments FROM sweetwater_test WHERE comments LIKE '%candy%'";
    $candy = $conn->query($sql);
    $sql = "SELECT comments FROM sweetwater_test WHERE comments LIKE '%call me%' OR comments LIKE '%don''t call me%'";
    $calls = $conn->query($sql);
    $sql = "SELECT comments FROM sweetwater_test WHERE 'comments' LIKE '&refer$' OR 'comments' LIKE 'heard'";
    $referred = $conn->query($sql);
    $sql = "SELECT comments FROM sweetwater_test WHERE 'comments' LIKE '%signed%' OR 'comments' LIKE '%signature%'";
    $sigs = $conn->query($sql);
    $sql = "SELECT comments FROM sweetwater_test";
    $allIsAll = $conn->query($sql);
    $sql = "SELECT shipdate_expected FROM sweetwater_test";
    $ships = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sweetwater Test</title>
    <script language="javascript">
        function doReset() {
            
        }
        
        function doDates() {
            var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                /* populate DIV */
               document.getElementById("shipping").innerHTML = this.responseText;
            }
            xhttp.open("GET", "inc/doDates.php", true);
            xhttp.send();
        }
    </script>    
</head>

<body>
    <!-- display each set of results -->
    <!-- yeah, should be a switch or adapter! -->
    <h2>Report:</h2>
    <div>
        <h3>Candy</h3>
        <?php foreach ($candy as $can) {
            $that = $can['comments'];
            echo "<p>$that</p>";
        } ?>
    </div>
    <div>
        <h3>Call Me!</h3>
        <?php foreach ($calls as $call) {
            $that = $call['comments'];
            echo "<p>$that</p>";
        } ?>
    </div>
    <div>
        <h3>Who referred me?</h3>
        <?php if ($referred->num_rows > 0) {
            foreach ($referred  as $ref)
                $that = $ref['comments'];
                echo "<p>$that</p>";
            } else {
                echo "No results found.";
        }?>
    </div>
    <div>
        <h3>Signature requirements upon delivery</h3>
        <?php if ($sigs->num_rows > 0) {
            foreach ($sigs  as $sig)
                $that = $sig['comments'];
                echo "<p>$that</p>";
            } else {
                echo "No results found.";
        }?>
    </div>
    <div>
        <h3>Miscellaneous comments</h3>
        <?php if ($allIsAll->num_rows > 0) {
            foreach ($allIsAll as $all)
                $that = $all['comments'];
                echo "<p>$that</p>";
            } else {
                echo "No results found.";
        }?>
    </div>
    <!-- get or reset shipping dates -->
    <h2>Shipping: </h2>
    <div>
        <button onclick="doDates()" value="Add Dates">Add Dates</button> 
        <button onclick="doReset()" value="Reset Dates">Reset Dates</button>
    </div>
    <div id="shipping">
        <?php 
        if ($ships->num_rows > 0) {
            foreach ($ships as $ship) {
                $that = $ship["shipdate_expected"];
                echo "<p>$that</p>";
            }
        } else {
                echo "No results found.";
        } ?>
    </div>
</body>
</html>