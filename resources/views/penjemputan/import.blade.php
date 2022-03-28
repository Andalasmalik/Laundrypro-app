<div class="modal fade" id="importExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ImportExcel">import File Excel</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="/imports/PenjemputanImport" enctype="multipart/form-data">>
           
                {{ csrf_field() }}
           
                <label>Pilih file excel</label>
                <div class="form-group">
                  <input type="file" name="file" required="required">
                </div>
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
              </div>
            </div>
          </form>
            
            
          
        </form>
        </div>
    </div>
    </div>
  </div>