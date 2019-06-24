<?php
include ('dbconnection.php');

  $sql1 = 'SELECT MONTHNAME(done_cat_date) as month
 FROM `damage_category`
 WHERE YEAR(done_cat_date) = '.$_REQUEST["year"].'
 GROUP BY MONTH(done_cat_date) ORDER BY MONTH(done_cat_date)';
  $result1 = $conn->query($sql1);

    $data->labels = array();
    while($row=$result1->fetch_assoc()){
      array_push($data->labels,$row['month']);
    }

  $sql2 = 'SELECT SUM(done_cat_price) as water
  FROM `damage_category`
  WHERE  fac_id <= 3 AND YEAR(done_cat_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(done_cat_date) ORDER BY MONTH(done_cat_date)';
  $result2 = $conn->query($sql2);

    $data->datasets1->data = array();
    while($row=$result2->fetch_assoc()){
      array_push($data->datasets1->data,(int)$row['water']);
    }

  $sql3 = 'SELECT SUM(done_cat_price) as extreme
  FROM `damage_category`
  WHERE  fac_id >= 4 AND YEAR(done_cat_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(done_cat_date) ORDER BY MONTH(done_cat_date)';
  $result3 = $conn->query($sql3);

    $data->datasets2->data = array();
    while($row=$result3->fetch_assoc()){
      array_push($data->datasets2->data,(int)$row['extreme']);
    }

    echo json_encode($data);
?>
