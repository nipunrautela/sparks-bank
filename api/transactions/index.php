<?php
    include("../dbconfig.php");

    header('Content-Type: application/json; charset=utf-8');
    $error = array();
    // echo json_encode(array(
    //     "Server" => $_SERVER,
    //     "get" => $_GET
    // ));
    // die();
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $query = ("SELECT * FROM transactions");
        $result = $CONN->query($query);

        if ($result->num_rows === 0) {
            $error["statusCode"] = 404;
            $error["status"] = "No transactions found.";
            $error["request"] = "get";
            echo json_encode($error);
            die();
        }
        $transactions = $result->fetch_all(MYSQLI_ASSOC);
        $data["data"] = $transactions;
        $data["userData"] = array();
        foreach($transactions as $transaction) {
            if (!array_key_exists($transaction["senderId"], $data["userData"])) {
                $sender_query = "SELECT id, firstName, lastName FROM customers WHERE id={$transaction["senderId"]}";
                $result = $CONN->query($sender_query);
                $senderData = $result->fetch_assoc();
                $data["userData"][$senderData["id"]] = $senderData["firstName"]." ".$senderData["lastName"];
            }

            if (!array_key_exists($transaction["receiverId"], $data["userData"])) {
                $receiver_query = "SELECT id, firstName, lastName FROM customers WHERE id={$transaction["receiverId"]}";
                $result = $CONN->query($receiver_query);
                $receiverData = $result->fetch_assoc();
                $data["userData"][$receiverData["id"]] = $receiverData["firstName"]." ".$receiverData["lastName"];
            }
        }

        echo json_encode($data);
    }
    else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
        $stmt = $CONN->prepare("INSERT INTO transactions(senderId, receiverId, amount) VALUES(?, ?, ?);");
        
        $sender = (int)$_GET["from"];
        $receiver = (int)$_GET["to"];
        $amount = (int)$_GET["amount"];

        $stmt->bind_param("iii", $sender, $receiver, $amount);
        $rc = $stmt->execute();

        $remove_from_sender = "UPDATE customers SET balance=balance-{$amount} WHERE id={$sender};";
        $add_to_receiver = "UPDATE customers SET balance=balance+{$amount} WHERE id={$receiver};";
        $CONN->query($remove_from_sender);
        $CONN->query($add_to_receiver);

        
        $response = array();
        $response["statusCode"] = 200;
        $response["status"] = "Transactions Successful";
        $response["getData"] = array($sender, $receiver, $amount); 
        
        if ($rc === false) {
            $response["statusCode"] = 500;
            $response["status"] = "Internal Server error.";
        }
        $stmt->close();

        echo json_encode($response);
    }

    $CONN->close();
?>