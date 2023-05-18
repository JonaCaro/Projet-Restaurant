<?php
session_start();
require_once('../pdo.php');

$role = 0;
if (isset($_SESSION["Role"])) {
  $role = 1;
} else {
  $_SESSION["Role"] = '';
}

if (isset($_POST["idParam"]) && isset($_POST["parameterValue"]) && $_SESSION["Role"] == 1)
  try {
    $name =  $_POST["parameterValue"];
    $id =  $_POST["idParam"];

    $PhpData = new HelperBDD();
    $tmt = $PhpData->UpdateIndexParameter($name, $id);

    if ($tmt->rowCount() == 1) {
      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  '/ParamIndex.php');
    }
  } catch (PDOException $e) {
    echo $e;
  }
