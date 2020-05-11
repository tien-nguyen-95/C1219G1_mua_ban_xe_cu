var brand = {} || brand;


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
                                <a  href="javascript:;" onclick="brand.getDetail(${brand.id})"><i class="fa fa-edit"></i></a>
                                <a href="javascript:;" onclick="brand.remove(${brand.id})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`
                );
            });
            $('#table').DataTable();
        }
    });
}

brand.getDetail = function(id) {
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
                }
            })
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

                error: function(err) {
                    console.log(err);
                }
            });
        }
    }
}

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

brand.resetForm = function() {
    $('#name').val("");
    $('#brandId').val("0");
    $('#modal').find('.modal-title').text("Create New Brand");
    $('.modal-footer').find('a').text('Create');

    var form = $('#Form').validate()
    form.resetForm();
}

brand.history = function() {
    $.ajax({
        url: "/brands/trash",
        method: "GET",
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            $('#table2 tbody').empty();
            $.each(data, function(i, v) {
                $('#table2 tbody').append(
                    `<tr>
                        <td>${i}</td>
                        <td>${v.name}</td>
                        <td>
                            <a  href="javascript:;" title="Khôi phục" onclick="brand.restore(${v.id})"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="javascript:;" title ="Xóa hẳn" onclick="brand.delete(${v.id})"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        </td>
                    </tr>`
                );
            });
            $('#table2').DataTable();
        }
    });
}

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
                        brand.history();
                    }
                });
            }
        }
    });

}
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
brand.next = function() {
    $('.container ').find('#title').text("History");
    $('.container').find('#comback').text("comback");
    $('#trash').remove();
    $('#table').remove();
    $('.table-responsive').load('/brands/history');
    brand.history();
    $('#modal').empty();
    $('#a1').click(function() {
        $('.table-responsive').load('/brands');
        brand.showData();
    });

}

brand.showModal = function() {
    brand.resetForm();
    $('#modal').modal('show');
}


//hàm chạy
$(document).ready(function() {
    brand.init();
});

brand.init = function() {
    brand.showData();
};