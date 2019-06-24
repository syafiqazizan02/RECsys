<table class="table table-hover table-bordered" id="data-table">
  <thead bgcolor=#f8f8f8>
    <tr align="center">
      <th>No.</th>
      <th>Staff Name</th>
      <th>Account Status</th>
      <th><button type="button" name="btn_active" id="btn_active" class="btn btn-secondary btn-sm"><i class='fa fa-exchange'></i>Update</button></th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $v = 0;

    $stmt = $conn->prepare("SELECT * FROM `user_staff`");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc())
    {
      $staff_id = $row['staff_id'];
      $staff_full = $row['staff_full'];
      $staff_email = $row['staff_email'];
      $staff_phone = $row['staff_phone'];
      $staff_status = $row['staff_status'];
      $v++;
      ?>
      <tr align="center">
        <td width="5%"><?php echo $v; ?></td>
        <td><?php echo $staff_full; ?></td>
        <td><?php if($staff_status==0){ echo "<h5><span class='badge badge-success'>&nbsp;&nbsp;Active&nbsp;&nbsp;</span></h5>"; }else{ echo "<h5><span class='badge badge-danger'>&nbsp;Inactive&nbsp;</span></h5>"; }?></td>
        <td><input type="checkbox" value="<?php echo $staff_id; ?>"/></td>
        <td>
          <?php include('registration_staff_info.php'); ?>
          <a href="#info<?php echo $staff_id; ?>" data-toggle="modal" class="btn btn-warning btn-sm" style="color:white"><i class='fa fa-edit '></i></a>
          <a href="registration_staff_delete.php?staff_id=<?php echo $staff_id; ?>" onclick="return confirm('Are you sure?');"><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
