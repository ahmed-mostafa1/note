<?php

require('pdo.php');

// Adding Notes
@$note = $_POST['note'];
@$time = date('Y-m-d H:i:s');
@$status = 'Pending';

if (isset($note)) {
    if (strlen($note) == 0) {
        die('Note is required');
    }
    if (strlen($note) > 100) {
        die('Note is too long');
    } else {
        $sql = "INSERT INTO notes (note,time,status) VALUES (:note,:time,:status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            array(
                ':note' => $note,
                ':time' => $time,
                ':status' => $status
            )
        );
    }
}



// Viewing Notes   
$sql = "SELECT * FROM notes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $result) {
    $n = $result['note'];
    $t = $result['time'];
    $s = $result['status'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" src="./style.css">
</head>

<body>
    <div class="container">
        <h1>Notes</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Note</th>
                    <th>Check</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $result) {
                    $id = $result['id'];
                    $n = $result['note'];
                    $t = $result['time'];
                    
                    echo '<tr>;';
                    echo '<td>' . $n . '</td>';
                    echo '<td>' . $t . '</td>';
                    echo '<td>' . '<a href="delete.php?id='.$result['id'].'">Done</a>' . '</td>';
                    echo '</tr>';
                } ?>
            </tbody>
        </table>
</body>