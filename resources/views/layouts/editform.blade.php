<!-- Modal -->
<div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Equipment Info</h4>
      </div>
      <div class="modal-body">
        
        <form method="post" action="{{action('EquipmentController@update',['id'=>$equipment->id])}}">
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="equipment_id" id="equipment_id" value="{{ $equipment->id }}">
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
                            <label for="purchase_miles">Miles at purchase:</label>
                            <input class="form-control" id="purchase_miles" name="purchase_miles" type="text">
                          </div>
                          <div class="col-xs-3">
                            <label for="purchase_hours">Hours at purchase:</label>
                            <input class="form-control" id="purchase_hours" name="purchase_hours" type="text">
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


