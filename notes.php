<?php

require('pdo.php');

$notes = [];

@$note = $_POST['note'];
@$time = date('Y-m-d H:i:s');
@$status = '0';

if (isset($note)) {
    if (strlen($note) == 0) {
        die('Note is required');
    }
    if (strlen($note) > 100) {
        die('Note is too long');
    } else {
        $sql = "insert into notes (note, time, status) values (:note, :time, :status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            array(
                ':note' => $_POST['note'],
                ':time' => $time,
                ':status' => $status
            )
        );
    }
}