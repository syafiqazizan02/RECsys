<?php

  session_start();

  if(isset($_POST["action"]))
  {
    if($_POST["action"] == "add")
    {
      $facilities_id = $_POST["facilities_id"];
      $facilities_name = $_POST["facilities_name"];
      $facilities_rate = $_POST["facilities_rate"];
      for($count = 0; $count < count($facilities_id); $count++)
      {
        $list_facilities_id = array_keys($_SESSION["display_list"]);
        if(in_array($facilities_id[$count], $list_facilities_id))
        {
          // $_SESSION["display_list"][$facilities_id[$count]]['facilities_quantity']++;
        }
        else
        {
          $list_array = array(
            'facilities_id'               =>     $facilities_id[$count],
            'facilities_name'             =>     $facilities_name[$count],
            'facilities_rate'            =>      $facilities_rate[$count],
            'facilities_quantity'         =>     1
          );
          $_SESSION["display_list"][$facilities_id[$count]] = $list_array;
        }
      }
    }

    if($_POST["action"] == 'empty')
    {
      unset($_SESSION["display_list"]);
    }
  }

?>
