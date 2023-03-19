<?php
session_start();

$role = 0;
if (isset($_SESSION["Role"])) {
  $role = 1;
} else {
  $_SESSION["Role"] = '';
}

if (isset($_POST["idResa"])  && $_SESSION["Role"] == 1)
  try {
    $id =  $_POST["idResa"];

    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("Delete FROM reservation  where ID = ?");
    $tmt->execute(array($id));
    $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
    header('Location: http://' . $uri .  'admin.php');
  } catch (PDOException $e) {
    echo $e;
  }
