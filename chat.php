<?php

function getAll() {

    try {

        $db = getDB();

        $stmt = $db->query('SELECT * FROM chat ORDER BY id DESC');

        //returns row as an array indexed by column name
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getMessage() {

    try {

        $db = getDB();

        //checking if submit button is pressed and that username isn't blank
        if (isset($_POST['submit']) && !empty($_POST['name'])) {

            $name = $_POST['name'];
            $msg = $_POST['message'];

            $sql = "INSERT INTO chat (id, name, message, date) VALUES (NULL, :name, :message, CURRENT_TIMESTAMP)";

            $stmt = $db->prepare($sql);

            $stmt->bindValue(":name", $name, PDO::PARAM_STR);
            $stmt->bindValue(":message", $msg, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "<embed loop='false' src='tap.wav' hidden='true' autoplay='true' />";
            }
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function formatDate($date) {
    return date('g:i A', strtotime($date));
}
