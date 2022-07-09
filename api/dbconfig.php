<?php
    $USER = "root";
    $PASSWORD = "root";

    $SERVERNAME = "localhost";
    $DBNAME = "sparksbank";

    $CONN = new mysqli($SERVERNAME, $USER, $PASSWORD, $DBNAME);

    if ($CONN->connect_error) {
        die("MySQL connection Failed: ".$CONN->connect_error);
    }
?>