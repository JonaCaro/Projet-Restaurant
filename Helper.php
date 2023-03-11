<?php
class HelperClass
{
  public function __construct()
  {
  }

  public function SearcheParameter($param)
  {
    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("SELECT ParameterValue FROM adminparameters where ParameterName = ? ");
    $tmt->execute(array('' . $param . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterValue'];
  }
}
