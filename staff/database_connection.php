<?php

$connect = new PDO("mysql:host=localhost;dbname=recreation;charset=utf8mb4", "root", "");

date_default_timezone_set('Asia/Kuala_Lumpur');

function fetch_user_last_activity($staff_id, $connect)
{
  $query = "
  SELECT * FROM login_details
  WHERE staff_id = '$staff_id'
  ORDER BY last_activity DESC
  LIMIT 1
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    return $row['last_activity'];
  }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
  $query = "
  SELECT * FROM chat_message
  WHERE (from_user_id = '".$from_user_id."'
  AND to_user_id = '".$to_user_id."')
  OR (from_user_id = '".$to_user_id."'
  AND to_user_id = '".$from_user_id."')
  ORDER BY timestamp DESC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '<ul class="list-unstyled">';
  foreach($result as $row)
  {
    $user_name = '';
    $dynamic_background = '';
    $chat_message = '';
    if($row["from_user_id"] == $from_user_id)
    {
      if($row["status"] == '2')
      {
        $chat_message = '<p style="color:red;"><em>This message has been removed</em></p>';
        $user_name = '<b class="text-primary">You</b>';
      }
      else
      {
        $chat_message = $row['chat_message'];
        $user_name = '<b class="text-primary">You</b><button style="float:right;padding:1px 1.5px;border-radius:20px;text-align:center;" type="button" class="btn btn-danger btn-sm remove_chat" id="'.$row['chat_message_id'].'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
      }

      $dynamic_background = 'background-color:#ffffff;';

    }
    else
    {
      if($row["status"] == '2')
      {
        $chat_message = '<p style="color:red;"><em>This message has been removed</em></p>';
      }
      else
      {
        $chat_message = $row["chat_message"];
      }
      $user_name = '<b class="text-warning">'.get_user_name($row['from_user_id'], $connect).'</b>';
      $dynamic_background = 'background-color:#ffffff;';
    }

    $output .= '
    <li style="border-bottom:2px dotted #ccc;padding-top:4px; padding-left:4px; padding-right:4px;'.$dynamic_background.'">
    '.$user_name.'
    <br>
    '.$chat_message.'
    <div align="right">
    - <small><em>'.$row['timestamp'].'</em></small>
    </div>

    </li>
    ';
  }
  $output .= '</ul>';
  $query = "
  UPDATE chat_message
  SET status = '0'
  WHERE from_user_id = '".$to_user_id."'
  AND to_user_id = '".$from_user_id."'
  AND status = '1'
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $output;
}

function get_user_name($staff_id, $connect)
{
  $query = "SELECT staff_full FROM user_staff WHERE staff_id = '$staff_id'";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    return $row['staff_full'];
  }
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
  $query = "
  SELECT * FROM chat_message
  WHERE from_user_id = '$from_user_id'
  AND to_user_id = '$to_user_id'
  AND status = '1'
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $count = $statement->rowCount();
  $output = '';
  if($count > 0)
  {
    $output = '&nbsp;<span style="padding:1px 5px;" class="alert alert-danger"><strong>'.$count.'</strong></span>';
  }
  return $output;
}

function fetch_is_type_status($staff_id, $connect)
{
  $query = "
  SELECT is_type FROM login_details
  WHERE staff_id = '".$staff_id."'
  ORDER BY last_activity DESC
  LIMIT 1
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  foreach($result as $row)
  {
    if($row["is_type"] == 'yes')
    {
      $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
    }
  }
  return $output;
}


function fetch_group_chat_history($connect)
{
  $query = "
  SELECT * FROM chat_message
  WHERE to_user_id = '0'
  ORDER BY timestamp DESC
  ";

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  $output = '<ul class="list-unstyled">';
  foreach($result as $row)
  {
    $user_name = '';
    if($row["from_user_id"] == $_SESSION["staff_id"])
    {
      $user_name = '<b class="text-primary">You</b>';
    }
    else
    {
      $user_name = '<b class="text-warning">'.get_user_name($row['from_user_id'], $connect).'</b>';
    }

    $output .= '

    <li style="border-bottom:1px dotted #ccc">
    <p>'.$user_name.' - '.$row['chat_message'].'
    <div align="right">
    - <small><em>'.$row['timestamp'].'</em></small>
    </div>
    </p>
    </li>
    ';
  }
  $output .= '</ul>';
  return $output;
}


?>
