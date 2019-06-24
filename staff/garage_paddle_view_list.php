<?php include "dbconnection.php"; ?>

<table class="table table-hover table-bordered" id="data-table">
  <thead bgcolor=#f8f8f8>
    <tr align="center">
      <th>No.</th>
      <th>Boat Code</th>
      <th>Boat Model</th>
      <th>Boat Color</th>
      <th>Date Receive</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $fac_id = 1;
      $v = 0;

      $stmt = $conn->prepare("SELECT * FROM `facility_new` WHERE fac_id=?");
      $stmt->bind_param("s", $fac_id);
      $stmt->execute();
      $result = $stmt->get_result();

      while($row = $result->fetch_assoc())
      {
        $new_id = $row['new_id'];
        $new_code = $row['new_code'];
        $new_model = $row['new_model'];
        $new_color = $row['new_color'];
        $new_receive = date_format(date_create($row['new_receive']), 'd/m/Y');
        $v++;
      ?>
      <tr align="center">
        <td><?php echo $v; ?></td>
        <td><?php echo $new_code; ?></td>
        <td><?php echo $new_model; ?></td>
        <td><?php echo $new_color; ?></td>
        <td><?php echo $new_receive; ?></td>
        <td>
          <?php include('garage_paddle_view_edit.php'); ?>
          <a href="#edit<?php echo $new_id; ?>" data-toggle="modal" class="btn btn-warning btn-sm" style="color:white"><i class='fa fa-edit'></i></a>
          <a href="garage_paddle_view_delete.php?new_id=<?php echo $new_id; ?>" onclick="return confirm('Are you sure?');"><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
