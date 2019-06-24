<?php

session_start();

  $total_price = 0;
  $total_item = 0;
  $count = 0;

  $output = '
  <div class="table-responsive" id="facilities_table">
    <table class="table table-bordered table-striped">
    <tr align="center">
      <th width="30%">Facilities Category</th>
      <th width="20%">Facilities Rate</th>
      <th width="10%">Facilities Quantity</th>
      <th width="20%">Facilities Amount</th>
    </tr>
  ';

  if(!empty($_SESSION["display_list"]))
  {
    foreach($_SESSION["display_list"] as $keys => $values)
    {
      $count++;

      $output .= '
      <tr>
        <td>'.$values["facilities_name"].'<input type="hidden" name="hidden_fac_id'.$count.'" id="fac_id'.$count.'" size="1" value="'.$values["facilities_id"].'"/><input type="hidden" name="hidcount" id="hidcount" size="1" value="'.$count.'"/></td>
        <td align="center">RM '.number_format($values["facilities_rate"], 2).'<input type="hidden" name="hidden_list_rate'.$count.'" id="list_rate'.$count.'" size="1" value="'.$values["facilities_rate"].'"/></td>
        <td align="center">'.$values["facilities_quantity"].'<input type="hidden" name="hidden_list_qty'.$count.'" id="list_qty'.$count.'" size="1" value="'.$values["facilities_quantity"].'"/></td>
        <td align="center">RM '.number_format($values["facilities_quantity"] * $values["facilities_rate"], 2).'</td>
      </tr>
      ';

      $total_price = $total_price + ($values["facilities_quantity"] * $values["facilities_rate"]);
    }

    $output .= '
    <tr>
      <td colspan="3" align="right"><b>Total :</b></td>
      <td align="center"><b>RM '.number_format($total_price, 2).'</b></td>
    </tr>
    ';
  }
  else
  {
    $output .= '
    <tr>
      <td colspan="5" align="center">
        <label>&nbsp;&nbsp;</label>
      </td>
    </tr>
    ';
  }
  $output .= '</table></div>';

  echo $output;

?>
