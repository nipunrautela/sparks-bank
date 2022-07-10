<?php
    include("../dbconfig.php");

    header('Content-Type: application/json; charset=utf-8');
    $error = array();
    if ($_SERVER["REQUEST_METHOD"] === "GET") {

        $query = ("SELECT * FROM transactions");
        $result = $CONN->query($query);

        if ($result->num_rows === 0) {
            $error["statusCode"] = 404;
            $error["status"] = "No transactions found.";
            echo json_encode($error);
            die();
        }

        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    }
    else if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
    }

    $CONN->close();
?>