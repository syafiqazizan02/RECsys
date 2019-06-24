<div class="container">
  <br/><br/>
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
      <table class="table table-hover table-bordered">
        <thead bgcolor=#f8f8f8>
          <tr>
            <th colspan="2"><h5 align="center"><i class="fa fa-hourglass-start" aria-hidden="true"></i>&nbsp;&nbsp;Facilities Start</h5></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="25%">Customer Name :</td>
            <td width="75%"><input class="form-control" type="text" name="cust_name" id="cust_name" readonly /></td>
          </tr>
          <tr>
            <td width="25%"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;Reserve Time:</td>
            <td width="75%"><input class="form-control" type="text" name="reserve_time" id="reserve_time" readonly></td>
          </tr>
          <tr>
            <td width="25%">Facilities Category :</td>
            <td width="75%"><input class="form-control" type="text" name="fac_name" id="fac_name" readonly></td>
          </tr>
          <tr>
            <td width="25%">Facilities Code:</td>
            <td width="75%">
              <input type="text" name="list_barcode" id="list_barcode" class="form-control" autofocus/>
              <input type="hidden" name="post_id" id="post_id" />
              <div id="autoSaveStart"></div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-1">
    </div>
  </div>
</div>
