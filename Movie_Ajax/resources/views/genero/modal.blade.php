	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Genero</h4>
      </div>
      <div class="modal-body">
        <div id='message-error' class="alert alert-danger danger" role='alert' style="display: none">
      <strong>No puede dejar campos vacios</strong>
    </div>

      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<input type="hidden" id="id">
        @include('genero.form.form_edit')
      </div>
      <div class="modal-footer">
     <button id="actualizar" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>