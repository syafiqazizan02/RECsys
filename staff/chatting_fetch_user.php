<?php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM user_staff
WHERE staff_id != '".$_SESSION['staff_id']."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$u=0;

$output = '
<table class="table table-bordered table-striped">
 <tr align="center">
  <th width="5%">No.</th>
  <th width="50%">Messaging</th>
  <th width="20%">Status</th>
  <th width="15%">Action</th>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['staff_id'], $connect);

 if($user_last_activity > $current_timestamp)
 {
  $status = '<span style="color:green;font-weight:bold;">Online</span>';

 }
 else
 {
  $status = '<span style="color:red;font-weight:bold;">Offline</span>';
 }

$u++;

 $output .= '
 <tr>
  <td align="center">'.$u.'</td>
  <td>'.$row['staff_full'].' '.count_unseen_message($row['staff_id'], $_SESSION['staff_id'], $connect).' '.fetch_is_type_status($row['staff_id'], $connect).'</td>
  <td align="center">'.$status.'</td>
  <td align="center"><button type="button" class="btn btn-info btn-sm start_chat" data-tostaffid="'.$row['staff_id'].'" data-tostaffemail="'.$row['staff_full'].'"><i class="fa fa-weixin"></i> Message</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>
