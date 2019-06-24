<table class="table table-hover table-bordered" id="data-table">
  <thead bgcolor=#f8f8f8>
    <tr align="center">
      <th>No</th>
      <th>Customer Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $v=0;
    $stmt = $conn->prepare("SELECT * FROM `user_customer`");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc())
    {
      $cust_id = $row['cust_id'];
      $cust_name = $row['cust_name'];
      $cust_email = $row['cust_email'];
      $cust_contact = $row['cust_contact'];
      $v++
      ?>
      <tr align="center">
        <td width="5%"><?php echo $v; ?></td>
        <td><?php echo $cust_name; ?></td>
        <td>
          <?php include('registration_visitor_edit.php'); ?>
          <a href="#edit<?php echo $cust_id; ?>" data-toggle="modal" class="btn btn-warning btn-sm" style="color:white"><i class='fa fa-edit '></i></a>
          <a href="registration_visitor_delete.php?cust_id=<?php echo $cust_id; ?>" onclick="return confirm('Are you sure?');"><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
