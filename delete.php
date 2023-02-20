<?php

require_once "pdo.php";

$id = $_GET['id'];

  $sql = "DELETE FROM notes WHERE id=$id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array());
  header('location:notes.php');
return;
