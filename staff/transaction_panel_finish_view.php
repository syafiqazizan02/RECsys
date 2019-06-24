<div class="container">
  <br/><br/>
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
      <table class="table table-hover table-bordered">
        <thead bgcolor=#f8f8f8>
          <tr>
            <th colspan="2"><h5 align="center"><i class="fa fa-hourglass-end" aria-hidden="true"></i>&nbsp;&nbsp;Facilities Finish</h5></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="25%">Customer Name :</td>
            <td width="75%"><input class="form-control" type="text" name="cus_name" id="cus_name" readonly /></td>
          </tr>
          <tr>
            <td width="25%"><i class="fa fa-pause-circle-o" aria-hidden="true"></i></i>&nbsp;Used Time:</td>
            <td width="75%"><input class="form-control" type="text" name="rve_time" id="rve_time" readonly></td>
          </tr>
          <tr>
            <td width="25%">Facilities Category :</td>
            <td width="75%"><input class="form-control" type="text" name="faci_name" id="faci_name" readonly></td>
          </tr>
          <tr>
            <td width="25%">Facilities Code:</td>
            <td width="75%">
              <input type="text" name="lis_barcode" id="lis_barcode" class="form-control" autofocus/>
              <input type="hidden" name="pos_id" id="pos_id" />
              <div id="autoSaveFinish"></div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-1">
    </div>
  </div>
</div>
