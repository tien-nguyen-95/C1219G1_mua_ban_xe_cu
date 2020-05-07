<!-- Modal -->
<div class="modal fade" id="editBranchModel" tabindex="-1" role="dialog" aria-labelledby="editBranchModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editBranchModelLabel">Thay đổi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="editform">
                @csrf
                @method('put')
                <div class="modal-body">
                    <input type="hidden" id="eidt_id" name="id">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" value="{{ $dataBranch->name }}" placeholder="nhập Tên ...">
                    </div>
                    <div class="form-group">
                        <label for="">Điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="{{ $dataBranch->phone }}" placeholder="nhập điện thoại ...">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" value="{{ $dataBranch->address }}" placeholder="nhập địa chỉ ...">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" data-url="{{ route('branch.update', $dataBranch) }}" class="btn btn-primary" onclick="event.preventDefault();save(this)">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
