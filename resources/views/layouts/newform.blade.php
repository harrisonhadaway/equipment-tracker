<!-- Modal -->
<div class="modal fade" id="newform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Equipment</h4>
      </div>
      <div class="modal-body">
        <form data-toggle="validator" id="newform1" method="POST" action="/equipment" enctype="multipart/form-data">                   
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group row">
            <div class="col-xs-4">
              <label for="make">Make</label>
              <input class="form-control" id="make" name="make" type="text" required>
            </div>
            <div class="col-xs-4">
              <label for="model">Model</label>
              <input class="form-control" id="model" name="model" type="text" required>
            </div>
            <div class="col-xs-4">
              <label for="year">Year</label>
              <input class="form-control" id="year" name="year" type="text" maxlength="4" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-xs-4">
              <label for="purchase_from">Purchase From:</label>
              <input class="form-control" id="purchase_from" name="purchase_from" type="text">
            </div>
            <div class="col-xs-4">
              <label for="purchase_date">Purchase Date:</label>
              <input class="form-control" id="purchase_date" name="purchase_date" type="date">
            </div>
            <div class="col-xs-4">
              <label for="purchase_price">Purchase Price:</label>
              <input class="form-control" id="purchase_price" name="purchase_price" type="number" step="0.01" min="0" 
                onkeypress="return event.charCode >= 48 && event.charCode <= 57" title="Numbers only">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-xs-4">
              <label for="purchase_usage">
                <label><input type="radio" id="hours_or_miles" name="hours_or_miles" value="Hours"> <u>Hours</u> </label> 
                or
                <label><input type="radio" id="hours_or_miles" name="hours_or_miles" value="Miles"> <u>Miles:</u></label>
              </label>
              <input class="form-control" id="purchase_usage" name="purchase_usage" type="number" step="0.01" min="0">
            </div>
            <div class="col-xs-4">
              <label for="serial_number">Serial Number:</label>
              <input class="form-control" id="serial_number" name="serial_number" type="text">
            </div>
            <div class="col-xs-4">
              <label for="vin_number">VIN Number:</label>
              <input class="form-control" id="vin_number" name="vin_number" type="text">
            </div>
          </div>  
          <div class="form-group row">
            <div class="col-xs-6">
              <strong>Equipment Photo Upload:</strong><input type="file" name="file" id="file" accept="image/*">
            </div>
          </div>             
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button form="newform1" type="submit" value="save" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>



