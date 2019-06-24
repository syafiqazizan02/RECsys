<?php

include('database_connection.php');

session_start();

  $data = array(
   ':to_user_id' => $_POST['to_user_id'],
   ':from_user_id' => $_SESSION['staff_id'],
   ':chat_message' => $_POST['chat_message'],
   ':notification' => '1',
   ':status'  => '1'
  );

  $query = "
  INSERT INTO chat_message
  (to_user_id, from_user_id, chat_message, notification, status)
  VALUES (:to_user_id, :from_user_id, :chat_message, :notification, :status)
  ";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo fetch_user_chat_history($_SESSION['staff_id'], $_POST['to_user_id'], $connect);
}

?>
