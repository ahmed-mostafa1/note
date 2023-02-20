<?php
$notes = [];
@$note = $_POST['note'];
if (isset($note)){
    $note = trim($note);
    if (strlen($note) == 0){
        die('Note is required');
    }
    if (strlen($note) > 100){
        die('Note is too long');
    }else{
        array_push($notes, $note);
    }
}

var_dump($notes);

foreach ($notes as $note) {
    echo "<ul>
    <li>$note</li></ul>
    <li><a href='index.php'>Back to index</a></li>";
}