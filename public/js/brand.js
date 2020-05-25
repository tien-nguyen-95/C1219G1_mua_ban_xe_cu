var brand = {} || brand;
// Hàm lấy dữ liệu
brand.showData = function() {
        $('#table2').remove();
        $.ajax({
            url: "/brands/json",
            method: "GET",
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $('#table tbody').empty();
                $.each(data, function(i, brand) {
                    $('#table tbody').append(
                        `<tr>
                            <td>${i}</td>
                            <td>${brand.name}</td>
                            <td>
                                <a  href="javascript:;" onclick="brand.getDetail(${brand.id})"><i style="color:green" title="Chỉnh sửa" class="fa fa-edit"></i></a>
                                <a href="javascript:;" onclick="brand.remove(${brand.id})"><i style="color:red" title="Xóa mềm" class="fa fa-trash"></i></a>
                            </td>
                        </tr>`
                    );
                });
                $('#table').DataTable();
            }
        });
    }
    //Hàm lấy đối tượng chỉnh sửa
brand.getDetail = function(id) {
        $('#error').empty();
        $.ajax({
            url: "/brands/" + id,
            method: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#brandId').val(data.id);
                $('#name').val(data.name);
                $('#modal').find('.modal-title').text("Update Brand");
                $('.modal-footer').find('a').text('Update');
                $('#modal').modal('show');
            }

        });
    }
    //Hàm Thêm và Cập nhật
brand.save = function() {
        if ($('#Form').valid()) {
            //create
            if ($('#brandId').val() == 0) {
                var userOjb = {};
                userOjb.name = $('#name').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/brands/create",
                    method: "POST",
                    dataType: "json",
                    contentType: 'application/json',
                    data: JSON.stringify(userOjb),
                    success: function(data) {
                        $.toast({
                            heading: 'Thông báo',
                            text: 'Thêm thành công',
                            hideAfter: 5000,
                            position: 'top-center',
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        $('#modal').modal('hide');
                        brand.showData();
                    },
                    error: function(data) {
                        $.each(data.responseJSON.errors, function(key, value) {
                            $(`.errors-${key}`).text(value);
                        });
                    }
                });
            } else {
                var ojbEdit = {};
                ojbEdit.name = $('#name').val().toString();
                ojbEdit.id = $('#brandId').val();
                // console.log(ojbEdit);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/brands/" + ojbEdit.id,
                    method: "PUT",
                    dataType: "json",
                    contentType: 'application/json',
                    data: JSON.stringify(ojbEdit),
                    success: function(data) {
                        $.toast({
                            heading: 'Thông báo',
                            text: 'Cập nhật thành công',
                            hideAfter: 5000,
                            position: 'top-center',
                            showHideTransition: 'slide',
                            icon: 'success'
                        });
                        $('#modal').modal('hide');
                        brand.showData();
                    },

                    error: function(data) {
                        $.each(data.responseJSON.errors, function(key, value) {
                            $(`.errors-${key}`).text(value);
                        });
                    }
                });
            }
        }
    }
    // Hàm xóa mềm
brand.remove = function(id) {
        bootbox.confirm({
            title: "Thông báo",
            message: "Bạn chắc chắn muốn xóa không",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> No'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yes'
                }
            },
            callback: function(result) {
                if (result) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/brands/" + id,
                        method: "DELETE",
                        dataType: "json",
                        contentType: 'application/json',
                        success: function(data) {
                            console.log(data);
                            $.toast({
                                heading: 'Thông báo',
                                text: 'Xóa thành công',
                                hideAfter: 5000,
                                position: 'top-center',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            brand.showData();
                        }
                    });
                }
            }
        });
    }
    // Hàm đặt lại form
brand.resetForm = function() {
        $('#error').empty();
        $('#name').val("");
        $('#brandId').val("0");
        $('#modal').find('.modal-title').text("Create New Brand");
        $('.modal-footer').find('a').text('Create');

        var form = $('#Form').validate()
        form.resetForm();
    }
    // hàm show danh sách xóa mềm
brand.history = function() {
        $.ajax({
            url: "/brands/trash",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#table tbody').empty();
                $.each(data, function(i, v) {
                    $('#table tbody').append(
                        `<tr>
                            <td>${i}</td>
                            <td>${v.name}</td>
                            <td>
                                <a  href="javascript:;" onclick="brand.restore(${v.id})"><i title="Khôi phục" style="color:blue" class="fas fa-trash-restore"></i></i></a>
                                <a href="javascript:;" onclick="brand.delete(${v.id})"><i title="Xoá vĩnh viễn" style="color:red" class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>`
                    );
                });
                $('#table').DataTable();
            }
        });
    }
    // Hàm khôi phục
brand.restore = function(id) {
        bootbox.confirm({
            title: "Thông báo",
            message: "Bạn chắc chắn muốn khôi phục không",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> No'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yes'
                }
            },
            callback: function(result) {
                if (result) {
                    $.ajax({
                        url: "/brands/" + id + "/restore",
                        method: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.toast({
                                heading: 'Thông báo',
                                text: 'Khôi phục thành công',
                                hideAfter: 5000,
                                position: 'top-center',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            brand.comeback();
                        }
                    });
                }
            }
        });
    }
    //Hàm xóa vĩnh viễn
brand.delete = function(id) {
        bootbox.confirm({
            title: "Thông báo",
            message: "Nếu xóa sẽ mất vĩnh viễn",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> No'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yes'
                }
            },
            callback: function(result) {
                if (result) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/brands/" + id + "/delete",
                        method: "DELETE",
                        dataType: "json",
                        success: function(data) {
                            $.toast({
                                heading: 'Thông báo',
                                text: 'Xóa thành công',
                                hideAfter: 5000,
                                position: 'top-center',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            brand.history();
                        }
                    });
                }
            }
        });
    }
    //Hàm chuyển trang
brand.next = function() {
    $('#title').text("Danh sách xóa mềm");
    $('#trash').remove();
    $('#comeback').remove();
    $('#table tbody').empty();
    $('#btnBrand').replaceWith(
        `
        <div class="col-12 mb-3" id="btnBrand">
            <a id="trash" href="javascript:;" class="btn btn-primary" onclick="brand.comeback()"><i class="fas fa-arrow-circle-left"></i>Quay lại</a>
        </div>
        `
    );
    brand.history();
  
}
brand.comeback = function(){
    $('#title').text("Danh sách thương hiệu");
    $('#trash').remove();
    $('#btnBrand').replaceWith(
        `
        <div class="col-12 mb-3" id="btnBrand">
        <a href="javascript:;" class="btn btn-success" onclick="brand.showModal()" id="comeback"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
        <a id="trash" href="javascript:;" class="btn btn-warning" onclick="brand.next()"><i class="fas fa-trash"></i>Thùng rác</a>
        </div>
        `
    );
    $('#table tbody').empty();
    brand.showData();
}

// Hàm mở modal
brand.showModal = function() {
        brand.resetForm();
        $('#modal').modal('show');
    }
    //hàm chạy
$(document).ready(function() {
    brand.init();
});
// Hàm chạy đầu tiên
brand.init = function() {
    brand.showData();
};