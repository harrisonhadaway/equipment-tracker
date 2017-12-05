<!-- Modal -->
<div class="modal fade" id="filemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Files for {{ $equipment->year }} {{ $equipment->make }} {{ $equipment->model }}</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            @forelse($files as $file)
              <a href="{{ $file->fileurl }}"><button type="button" class="btn btn-primary btn-lg btn-block">{{ $file->filename }}</button></a>
              <br>
              @empty
              <p>Upload equipment documentation here and be able to access it anytime from anywhere on earth.</p>
            @endforelse
          </div>
        </div>
        <hr>
        <form id="newfile" method="post" action="{{action('EquipmentController@newfile',['id'=>$equipment->id])}}" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="put" />
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group row">
            <div class="col-md-4">
              <label for="filename">File Name:</label>
            </div>
            <div class="col-md-5">
              <label for="file">Select File:</label>
            </div>
            <div class="col-md-3">
            </div>
          </div>    
          <div class="form-group row">
            <div class="col-xs-4">
              <input type="text" name="filename" id="filename" placeholder="Owner's Manual">
            </div>
            <div class="col-xs-5">
              <input type="file" name="file" id="file">
            </div>
            <div class="col-xs-3">
              <button form="newfile" type="submit" value="save" class="btn btn-sm btn-primary">Save File</button>
            </div>
          </div>    
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>                      
      </div>
    </div>
  </div>
</div>


