<!-- Modal -->
<div class="modal fade" id="newform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Equipment</h4>
      </div>
      <div class="modal-body">
        
        <form method="post" action="/equipment">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="make">Make</label>
                            <input class="form-control" id="make" name="make" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="model">Model</label>
                            <input class="form-control" id="model" name="model" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="year">Year</label>
                            <input class="form-control" id="year" name="year" type="text">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="purchase_from">Purchase From:</label>
                            <input class="form-control" id="purchase_from" name="purchase_from" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="purchase_date">Purchase Date:</label>
                            <input class="form-control" id="purchase_date" name="purchase_date" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="purchase_price">Purchase Price:</label>
                            <input class="form-control" id="purchase_price" name="purchase_price" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="hours_or_miles"></label>  <br>                          
                              <label><input type="radio" id="hours_or_miles" name="hours_or_miles" value="Hours"> Hours  </label> 
                              <label><input type="radio" id="hours_or_miles" name="hours_or_miles" value="Miles"> Miles </label>
                          </div>
                          <div class="col-xs-3">
                            <label for="purchase_usage">Amount</label>
                            <input class="form-control" id="purchase_usage" name="purchase_usage" type="text">
                          </div>
                        </div>      
                        <div class="form-group row">
                          <div class="col-xs-3">
                            <label for="serial_number">Serial Number:</label>
                            <input class="form-control" id="serial_number" name="serial_number" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="vin_number">VIN Number:</label>
                            <input class="form-control" id="vin_number" name="vin_number" type="text">
                          </div>
                        </div>                

                        <button type="submit" value="save" class="btn btn-default">Save</button>

                    </form>

      </div>
    </div>
  </div>
</div>


