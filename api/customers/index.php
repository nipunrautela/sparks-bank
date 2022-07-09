<?php
    include("../dbconfig.php");

    header('Content-Type: application/json; charset=utf-8');
    $error = array();
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $search_by = $_GET["search_by"];

        if ($search_by === "name") {
            $to_search = $_GET["name"];
            $search_offset = 0;
            $search_limit = 1000;

            if (isset($_GET["offset"]))
                $search_offset = $_GET["offset"];
            if (isset($_GET["limit"]))
                $search_limit = $_GET["limit"];

            $stmt = $CONN->prepare("SELECT * FROM customers WHERE (firstName LIKE ?) or (lastName LIKE ?) LIMIT ? OFFSET ?");
            $to_search = "%".$to_search."%";
            $stmt->bind_param("ssii", $to_search, $to_search, $search_limit, $search_offset);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                $error["statusCode"] = 404;
                $error["status"] = "No such user found in the database.";
                echo json_encode($error);
                die();
            }

            echo json_encode($result->fetch_all(MYSQLI_ASSOC));
        }
        else if ($search_by === "id") {
            $error["statusCode"] = 503;
            $error["status"] = "The API does not support this search method yet";
            echo json_encode($error);
        }
        else {
            $error["statusCode"] = 404;
            $error["status"] = $search_by.": No such search method exists.";
            echo json_encode($error);
        }
    }

    $CONN->close();
?>