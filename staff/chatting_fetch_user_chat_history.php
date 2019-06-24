<?php

include('database_connection.php');

session_start();

echo fetch_user_chat_history($_SESSION['staff_id'], $_POST['to_user_id'], $connect);

?>
