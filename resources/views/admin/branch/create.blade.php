<!-- Modal -->
<div class="modal fade" id="addBranchModel" tabindex="-1" role="dialog" aria-labelledby="addBranchModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addBranchModelLabel">Thêm chi nhánh mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="addform" action="{{ route('branch.store') }}" method="post">
                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Tên</label><br>
                        <input type="text" class="form-control" name="name" placeholder="nhập Tên ...">
                    </div>

                    <div class="form-group">
                        <label for="">Điện thoại</label><br>
                        <input type="text" class="form-control" name="phone" placeholder="nhập điện thoại ...">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ</label><br>
                        <input type="text" class="form-control" name="address" placeholder="nhập địa chỉ ...">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="event.preventDefault();store(this)">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
