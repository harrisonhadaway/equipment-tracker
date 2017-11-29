<div class="modal fade" id="addrecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Maintenance Record</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="/profile/{id}" id="record">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
              <div class="row">
                <div class="col-xs-4">Brief Description
                  <input id="service_description" name="service_description" type="text" class="form-control" placeholder="Oil Change">
                </div>
                <div class="col-xs-4">Serviced by
                  <input id="serviced_by" name="serviced_by" type="text" class="form-control" placeholder="Billy Bob">
                </div>
                <div class="col-xs-2">Hours
                  <input id="hours_at_service" name="hours_at_service" type="text" class="form-control" placeholder="1,234">
                </div>
                <div class="col-xs-2">Cost
                  <input id="service_cost" name="service_cost" type="text" class="form-control" placeholder="1,234">
                </div>
              </div>Notes
              <textarea id="service_notes" name="service_notes" class="form-control" rows="2" placeholder="He did good."></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button form="record" type="submit" value="save" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>