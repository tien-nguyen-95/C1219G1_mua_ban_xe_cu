    <!-- Modal -->
    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form id="Form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input hidden id="brandId" name="brandId" value="0">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Name</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="name" name="name" class="form-control">
                                <label id="error" class='errors-name'></label >
                            </div>
                        </div>
                        <div class="row form-group">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <a href="javascript:;" class="btn btn-danger" onclick="brand.save()">Create</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
