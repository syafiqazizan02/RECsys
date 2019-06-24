<table class="table table-hover table-bordered" id="data-table">
  <thead bgcolor=#f8f8f8>
    <tr align="center">
      <th>No.</th>
      <th>Facilities Category</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $u=0;

    $stmt = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id >3");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc())
    {
      $fac_id = $row['fac_id'];
      $fac_name = $row['fac_name'];
      $u++
      ?>
      <tr align="center">
        <td width="10%"><?php echo $u; ?></td>
        <td><?php echo $fac_name; ?></td>
        <td align="center">
            <?php include('reporting_extreme_view.php'); ?>
            <a href="#info<?php echo $fac_id; ?>" data-toggle="modal" class="btn btn-info btn-sm"><i class="fa fa-bullseye"></i></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
