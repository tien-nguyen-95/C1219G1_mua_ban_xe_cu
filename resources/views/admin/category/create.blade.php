<!-- Modal -->
<div class="modal fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form id="frmAddEditCategory">
                <input type="hidden" id="CategoryId" name="CategoryId" value="0">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input name="categoryName" type="text" id="categoryName" class="form-control" 
                    placeholder="Enter category name">
                    <span id="error" class="errors-categoryName"></span>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary" onclick="category.save()">Save</a>
            </form>
        </div>
    </div>
    </div>
</div>