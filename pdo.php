<?php
class HelperBDD
{
  protected $PDObdd;

  public function __construct()
  {
    $this->PDObdd = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
  }

  //Fonction de selection des données

  // Recherche le nom du menu
  public function SearcheParameterValueMenu($paramM)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT ParameterValue FROM adminparametersmenu where ParameterName = ?");
    $tmt->execute(array('' . $paramM . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterValue'];
  }

  //recherche le prix du menu
  public function SearcheParameterPriceMenu($paramM)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT ParameterPrice FROM adminparametersmenu where ParameterName = ?");
    $tmt->execute(array('' . $paramM . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterPrice'];
  }

  //Recherche la description du menu
  public function SearcheParameterDescriptionMenu($paramM)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT ParameterDescription FROM adminparametersmenu where ParameterName = ?");
    $tmt->execute(array('' . $paramM . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterDescription'];
  }

  //recherche la valeur des horaires d'ouverture
  public function SearcheParameterHourly($paramH)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT ParameterValue FROM adminparametershourly where ParameterName = ? ");
    $tmt->execute(array('' . $paramH . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterValue'];
  }

  //recherche la valeur pour l'affichage de la page d'accueil
  public function SearcheParameterIndex($paramI)
  {
    $PhpData = $this->PDObdd;

    $tmt = $PhpData->prepare("SELECT ParameterValue FROM adminparametersindex where ParameterName = ? ");
    $tmt->execute(array('' . $paramI . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterValue'];
  }

  //Recherche pour savoir si une personne est inscrite sur le site
  public function SelectConnectionElement($mail, $mdp)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT u.id, u.name, u.Role FROM users u 
      inner join signup s where u.email = ? and s.Password = ?");
    $tmt->execute(array('' . $mail . '', '' . $mdp . ''));
    return $tmt;
  }

  //Recherche les reservations
  public function SelectReservation()
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM reservation r inner join users u on r.ID_User = u.id");
    $tmt->execute();
    return $tmt;
  }

  //recherche les horaires
  public function SelectParamHour()
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM adminparametershourly");
    $tmt->execute();
    return $tmt;
  }

  //recherche Les menus
  public function SelectParamMenu()
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM adminparametersmenu");
    $tmt->execute();
    return $tmt;
  }

  //Recherches les parametres de la page d'accueil
  public function SelectParamIndex()
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM adminparametersindex");
    $tmt->execute();
    return $tmt;
  }

  //recherche une reservation
  public function selectReservationById($Id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM reservation p where p.id = ?");
    $tmt->execute(array('' . $Id . ''));
    return $tmt;
  }

  //recherche un menu
  public function selectMenuParameterById($Id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM adminparametersmenu p where p.id = ?");
    $tmt->execute(array('' . $Id . ''));
    return $tmt;
  }

  //recherche un parametre de la page d'accueil
  public function selectIndexParameterById($Id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM adminparametersindex p where p.id = ?");
    $tmt->execute(array('' . $Id . ''));
    return $tmt;
  }

  //recherche une heure
  public function selectHourParameterById($Id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM adminparametershourly p where p.id = ?");
    $tmt->execute(array('' . $Id . ''));
    return $tmt;
  }

  //recherche les commentaires
  public function selectCommentaire()
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("SELECT * FROM comment c  inner join users u on c.ID_User = u.id");
    $tmt->execute();
    return $tmt;
  }

  //Fonction d'insertion de données 
  //Ajoute un nouvel utilisateur 
  public function InsertUser($name, $firstName, $mail, $tel, $mdp)
  {
    try {
      $PhpData = $this->PDObdd;
      $tmt = $PhpData->prepare("insert into users(name, firstname, email, Telephone) values (?,?,?,?)");
      $tmt->execute(array('' . $name . '', '' . $firstName . '', '' . $mail . '', '' . $tel . ''));
      $IDUser = $PhpData->lastInsertId();
      $tmts = $PhpData->prepare("insert into signup(ID_User, Password) values (?,?)");
      $tmts->execute(array($IDUser, '' . $mdp . ''));

      return $IDUser;
    } catch (Exception $e) {
      return '';
    }
  }

  //Ajoute un nouveau Commentaire 
  public function InsertCommentaire($IDUser, $ParameterValue)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("insert into comment(ID_User, ParameterValue) values (?,?)");
    $tmt->execute(array('' . $IDUser . '', '' . $ParameterValue . ''));
    return $tmt;
  }

  //Ajoute une nouvelle reservatrion
  public function InsertReservation($IDUser, $DateResa, $TimeResa, $PeopleNumber, $Allergens)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("insert into reservation(ID_User, DateResa, TimeResa, PeopleNumber, Allergens) values (?,?,?,?,?)");
    $tmt->execute(array('' . $IDUser . '', '' . $DateResa . '', '' . $TimeResa . '', '' . $PeopleNumber . '', '' . $Allergens . ''));
    return $tmt;
  }

  //Fonction de mise à jour de données
  //MAJ d'une reservation
  public function UpdateReservation($dateResa, $timeResa, $allergen, $PeopleNumber, $id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("update reservation r set r.DateResa =?, r.TimeResa = ? , r.Allergens = ?, r.PeopleNumber = ?
    where r.ID = ?");
    $tmt->execute(array($dateResa, $timeResa, $allergen, $PeopleNumber, $id));
    return $tmt;
  }

  //MAJ d'un menu de la carte
  public function UpdateMenuParameter($flatName, $price, $description, $id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("update adminparametersmenu p  set p.ParameterValue =?, p.ParameterPrice =?, p.ParameterDescription =? where p.ID = ?");
    $tmt->execute(array($flatName, $price, $description, $id));
    return $tmt;
  }

  //MAJ d'un parametre de la page d'acceuil
  public function UpdateIndexParameter($name, $id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("update adminparametersindex p  set p.ParameterValue =? where p.ID = ?");
    $tmt->execute(array($name, $id));
    return $tmt;
  }

  //MAJ d'une heure
  public function UpdateHoursParameter($horaire, $id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("update adminparametershourly p  set p.ParameterValue =? where p.ID = ?");
    $tmt->execute(array($horaire, $id));
    return $tmt;
  }


  //Fonction de suppression de données
  //Supprime une réservation
  public function DeleteReservationById($id)
  {
    $PhpData = $this->PDObdd;
    $tmt = $PhpData->prepare("Delete FROM reservation  where ID = ?");
    $tmt->execute(array($id));
    return $tmt;
  }
}
