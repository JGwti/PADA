<div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel" >Eliminando Registro</h5>
        </div>
        <div class="modal-body">
          <p> ¿Estas seguro de eliminar el registro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" :disabled ="showSpiner">No</button>
          <button type="button" class="btn btn-primary" v-on:click="deleteIt" data-bs-dismiss="modal" :disabled ="showSpiner">
            <span v-if="showSpiner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Si, Estoy seguro
          </button>
        </div>
      </div>
    </div>
  </div>
