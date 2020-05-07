
<!-- The Modal -->
<div class="modal" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Brand</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <form  id="form-add" method="post">
            @csrf
            <div class="modal-body">
                <label >Name</label>
                <input style="width:100%" name="name" id="name" type="text" placeholder="Nhập tên">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="btn-add" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
