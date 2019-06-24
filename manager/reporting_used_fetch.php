<?php
include ('dbconnection.php');

  $sql1 = 'SELECT MONTHNAME(start_date) as month
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result1 = $conn->query($sql1);

    $data->labels = array();
    while($row=$result1->fetch_assoc()){
      array_push($data->labels,$row['month']);
    }

  $sql2 = 'SELECT COUNT(MONTH(start_date)) as paddle
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 1 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result2 = $conn->query($sql2);

    $data->datasets1->data = array();
    while($row=$result2->fetch_assoc()){
      array_push($data->datasets1->data,(int)$row['paddle']);
    }

  $sql3 = 'SELECT COUNT(MONTH(start_date)) as electric
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 2 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result3 = $conn->query($sql3);

    $data->datasets2->data = array();
    while($row=$result3->fetch_assoc()){
      array_push($data->datasets2->data,(int)$row['electric']);
    }

  $sql4 = 'SELECT COUNT(MONTH(start_date)) as kayak
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 3 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result4 = $conn->query($sql4);

    $data->datasets3->data = array();
    while($row=$result4->fetch_assoc()){
      array_push($data->datasets3->data,(int)$row['kayak']);
    }

  $sql5 = 'SELECT COUNT(MONTH(start_date)) as fly
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 4 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result5 = $conn->query($sql5);

    $data->datasets4->data = array();
    while($row=$result5->fetch_assoc()){
      array_push($data->datasets4->data,(int)$row['fly']);
    }

  $sql6 = 'SELECT COUNT(MONTH(start_date)) as wall
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 5 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result6 = $conn->query($sql6);

    $data->datasets5->data = array();
    while($row=$result6->fetch_assoc()){
      array_push($data->datasets5->data,(int)$row['wall']);
    }

  $sql7 = 'SELECT COUNT(MONTH(start_date)) as paint
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 6 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result7 = $conn->query($sql7);

    $data->datasets6->data = array();
    while($row=$result7->fetch_assoc()){
      array_push($data->datasets6->data,(int)$row['paint']);
    }

  $sql8 = 'SELECT COUNT(MONTH(start_date)) as arch
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 7 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result8 = $conn->query($sql8);

    $data->datasets7->data = array();
    while($row=$result8->fetch_assoc()){
      array_push($data->datasets7->data,(int)$row['arch']);
    }

  $sql9 = 'SELECT COUNT(MONTH(start_date)) as tram
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 8 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result9 = $conn->query($sql9);

    $data->datasets8->data = array();
    while($row=$result9->fetch_assoc()){
      array_push($data->datasets8->data,(int)$row['tram']);
    }

  $sql10 = 'SELECT COUNT(MONTH(start_date)) as spac
  FROM `used_start`
  JOIN `used_list` ON `used_list`.start_id = `used_start`.start_id
  WHERE list_status = 2 AND fac_id = 9 AND YEAR(start_date) = '.$_REQUEST["year"].'
  GROUP BY MONTH(start_date) ORDER BY MONTH(start_date)';
  $result10 = $conn->query($sql10);

    $data->datasets9->data = array();
    while($row=$result10->fetch_assoc()){
      array_push($data->datasets9->data,(int)$row['spac']);
    }

    echo json_encode($data);
?>
