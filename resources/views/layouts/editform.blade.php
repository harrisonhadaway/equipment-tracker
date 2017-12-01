<!-- Modal -->
<div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Equipment Info</h4>
      </div>
      <div class="modal-body">
        <form id="update" method="post" action="{{action('EquipmentController@update',['id'=>$equipment->id])}}">
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="equipment_id" id="equipment_id" value="{{ $equipment->id }}">
            <div class="form-group row">
              <div class="col-xs-4">
                <label for="make">Make</label>
                <input class="form-control" id="make" name="make" type="text" value="{{ $equipment->make }}">
              </div>
              <div class="col-xs-4">
                <label for="model">Model</label>
                <input class="form-control" id="model" name="model" type="text" value="{{ $equipment->model }}">
              </div>
              <div class="col-xs-4">
                <label for="year">Year</label>
                <input class="form-control" id="year" name="year" type="text" value="{{ $equipment->year }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-4">
                <label for="purchase_from">Purchase From:</label>
                <input class="form-control" id="purchase_from" name="purchase_from" type="text" value="{{ $equipment->purchase_from }}">
              </div>
              <div class="col-xs-4">
                <label for="purchase_date">Purchase Date:</label>
                <input class="form-control" id="purchase_date" name="purchase_date" type="date" value="{{ $equipment->purchase_date }}">
              </div>
              <div class="col-xs-4">
                <label for="purchase_price">Purchase Price:</label>
                <input class="form-control" id="purchase_price" name="purchase_price" type="number" step="0.01" min="0" 
                value="{{ $equipment->purchase_price }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-4">
                <label for="purchase_usage">
                  <label><input type="radio" id="hours_or_miles" name="hours_or_miles" value="Hours" {{ $hours_select }}> <u>Hours</u>  </label> 
                  or
                  <label><input type="radio" id="hours_or_miles" name="hours_or_miles" value="Miles" {{ $miles_select }}> <u>Miles:</u> </label>
                </label>
                <input class="form-control" id="purchase_usage" name="purchase_usage" type="number" step="0.01" min="0" 
                value="{{$equipment->purchase_usage}}">
              </div>
              <div class="col-xs-4">
                <label for="serial_number">Serial Number:</label>
                <input class="form-control" id="serial_number" name="serial_number" type="text" value="{{ $equipment->serial_number }}">
              </div>
              <div class="col-xs-4">
                <label for="vin_number">VIN Number:</label>
                <input class="form-control" id="vin_number" name="vin_number" type="text" value="{{ $equipment->vin_number }}">
              </div>
            </div>    

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button form="update" type="submit" value="save" class="btn btn-primary">Save changes</button>
            </div>                      
        </form>
      </div>
    </div>
  </div>
</div>


