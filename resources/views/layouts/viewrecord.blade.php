<div class="modal fade" id="{{ $maintenance_log->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Maintenance Record</h4>
      </div>
      <div class="modal-body">
        
          Equipment ID:{{ $equipment->id }} <br> Log ID:{{ $maintenance_log->id }}


            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

    </div>
  </div>
</div>
</div>