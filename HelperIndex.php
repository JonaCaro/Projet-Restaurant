<?php
class HelperIndexClass
{
  public function __construct()
  {
  }

  public function SearcheParameter($paramI)
  {
    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("SELECT ParameterValue FROM adminparametersindex where ParameterName = ? ");
    $tmt->execute(array('' . $paramI . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterValue'];
  }
}
