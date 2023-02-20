<?php

require('pdo.php');

// Adding Notes
@$note = $_POST['note'];
// @$time = date('Y-m-d H:i:s');
// @$status = '0';

if (isset($note)) {
    if (strlen($note) == 0) {
        die('Note is required');
    }
    if (strlen($note) > 100) {
        die('Note is too long');
    } else {
        $sql = "INSERT INTO notes (note) VALUES (:note)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            array(
                ':note' => $note
                // ':time' => $time,
                // ':status' => $status
            )
        );
    }
}

// Viewing Notes   

$sql = "SELECT * FROM notes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $result){
    echo $result['note'] . "<br>";
}
