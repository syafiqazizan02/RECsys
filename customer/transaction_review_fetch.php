<?php

$connect = new PDO('mysql:host=localhost;dbname=recreation', 'root', '');

$list_id= @$_REQUEST['list_id'];

$query = "SELECT * FROM `used_list` WHERE list_status=2 AND list_id = '".$list_id."' ";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
  $rating = count_rating($row['list_id'], $connect);
  $color = '';
  $output .= '

  <p class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">
  ';

  for($count=1; $count<=5; $count++)
  {
    if($count <= $rating)
    {
      $color = 'color:#ffcc00;';
    }
    else
    {
      $color = 'color:#ccc;';
    }
    $output .= '<label title="'.$count.'" id="'.$row['list_id'].'-'.$count.'" data-index="'.$count.'"  data-list_id="'.$row['list_id'].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:30px;">&#9733;</label>';
  }
  $output .= '
  </p>
  ';

}
echo $output;

function count_rating($list_id, $connect)
{
  $output = 0;
  $query = "SELECT AVG(rating) as rating FROM `used_rating` WHERE list_id = '".$list_id."'";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  if($total_row > 0)
  {
    foreach($result as $row)
    {
      $output = round($row["rating"]);
    }
  }
  return $output;
}

?>
