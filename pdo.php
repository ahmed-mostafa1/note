<?php

try{
  $pdo = new PDO('mysql:host=localhost;dbname=my_notes', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'connected to database';
}
catch (PDOException $e){
  echo 'FAILED' . $e->getMessage();
}


