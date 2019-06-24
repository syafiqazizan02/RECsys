<?php

$connect = new PDO('mysql:host=localhost;dbname=recreation', 'root', '');

if(isset($_POST["index"], $_POST["list_id"], $_POST["fac_id"]))
{
  $query = "INSERT INTO `used_rating`(list_id, fac_id, rating) VALUES (:list_id, :fac_id, :rating) ";
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      ':list_id' => $_POST["list_id"],
      ':fac_id'  => $_POST["fac_id"],
      ':rating'  => $_POST["index"],
    )
  );
  $result = $statement->fetchAll();

  $query2 = "UPDATE `used_list` SET list_review=:list_review WHERE list_id=:list_id";
  $statement2 = $connect->prepare($query2);
  $statement2->execute(
    array(
      ':list_review'  => 1,
      ':list_id' => $_POST["list_id"],
    )
  );
  $result2 = $statement2->fetchAll();

  if(isset($result,$result2))
  {
    echo 'Done';
  }
}



?>
