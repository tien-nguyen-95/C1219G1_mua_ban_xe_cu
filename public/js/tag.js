
    var tag = {} || tag;

tag.showData = function () {
    $.ajax({
        url: "http://127.0.0.1:8000/tag",
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#tbTagData tbody').empty();
            $.each(data, function (i, v) {
                $('#tbTagData tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.title}</td>
                        <td>${v.category.name}</td>
                        <td>${v.created_at}</td>
                        <td>
                            <a href="javascript:;" onclick="tag.getDetail(${v.id})"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" onclick="tag.remove(${v.id})"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbTagData').DataTable();

        },
        error : function(e){
            console.log(e);
        }
    });
}


tag.showModal = function () {
    tag.resetForm();
    $.ajax({
        url: "http://127.0.0.1:8000/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            // console.log(data);
            $.each(data, function (i, v){
                $('#Category').append(
                    `<option value="${v.id}">${v.name}</option>`
                );
            });
        }
    });
    $('#addEditTag').modal('show');
};


tag.remove = function (id) {
    bootbox.confirm({
        title: "Tạm xóa thẻ?",
        message: "Chuyển thẻ này đến mục tạm xóa ?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: "http://127.0.0.1:8000/tag/" + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: 'application/json',
                    success: function (data) {
                        tag.showData();
                        tag.showTrash();
                        bootbox.alert("Thẻ này đã chuyển đến mục xóa tạm");
                    }
                });
            }
        }
    });
}


tag.getDetail = function (id) {

    $.ajax({
        url: "http://127.0.0.1:8000/tag/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#Title').val(data.title);
            $('#TagId').val(data.id);
            $('#Category').val(data.category_id);
            $('#addEditTag').find('.modal-title').text("Sửa thẻ");
            $('.modal-footer').find('a').text('Sửa');

            // $('#addEditTag').modal('show');

        }
    });
    tag.showModal();
}


tag.save = function () {
    if ($('#formAddEditTag').valid()) {
        // create
        if ($('#TagId').val() == 0) {
            var objAdd = {};
            objAdd.title = $('#Title').val();
            objAdd.category_id = $('#Category').val();
            console.log(objAdd);
            $.ajax({

                url: "http://127.0.0.1:8000/tag",
                method: "POST",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objAdd),
                success: function (data) {
                    console.log(data);
                    bootbox.alert("Thêm thẻ mới thành công");
                    $('#addEditTag').modal('hide');
                    tag.showData();

                },
                error: function(data){
                    console.log(data);
                    $.each(data.responseJSON.errors, function (i, v) {
                        $(`.error-${i}`).text(v);
                    });
                }

            });
        }
        //update
        else {
            var objEdit = {};
            objEdit.title = $('#Title').val();
            objEdit.category_id = $('#Category').val();
            objEdit.id =  $('input[type=hidden]').val();
            console.log(objEdit);
            $.ajax({
                url: "http://127.0.0.1:8000/tag/" + objEdit.id,
                method: "PUT",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objEdit),
                success: function (data) {
                    bootbox.alert("Sửa thẻ thành công");
                    $('#addEditTag').modal('hide');
                    tag.showData();

                },
                error: function(data){
                    console.log(data);
                    $.each(data.responseJSON.errors, function (i, v) {
                        $(`.error-${i}`).text(v);
                    });
                }

            });
        }

    }
}
tag.resetForm = function () {
    $('#Title').val("");
    // $('#Category').val("");
    $('.error-title').empty();
    // $('.error-category').empty();
    $('#TagId').val("0");
    $('#addEditTag').find('.modal-title').text("Thêm thẻ mới");
    $('.modal-footer').find('a').text('Create');

    var form = $('#formAddEditTag').validate();
    form.resetForm();
}


tag.showTrash = function (){
    $.ajax({
        url: "/tag-trash",
        method: "GET",
        dataType: "json",
        success: function (data) {

            $('#tbTagTrash tbody').empty();
            console.log(data);
            $.each(data, function (i, v) {
                // alert(v.title);
                $('#tbTagTrash tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.title}</td>
                        <td>${v.category.name}</td>
                        <td>${v.deleted_at}</td>
                        <td>
                            <a href="javascript:;" onclick="tag.restore(${v.id})" class="fa fa-trash-restore"></a>
                            <a href="javascript:;" onclick="tag.delete(${v.id})" class="fa fa-ban"></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbTagTrash').DataTable();

        },
    });
};


tag.restore = function (id){
    bootbox.confirm({
        title: "Trở lại danh sách ?",
        message: "Khôi phục thẻ này trở lại danh sách thẻ ?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "GET",
                    url: "/tag-restore/" + id,
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        bootbox.alert("Khôi phục thẻ thành công");
                        tag.showTrash();
                        tag.showData();
                    },
                    error: function (errors){
                        console.log(errors);
                    }

                });
            }
        }
    });
}
tag.delete = function(id){
    bootbox.confirm({
        title: "Xóa thẻ này?",
        message: "Bạn có chắc muốn xóa hoàn toàn thẻ này?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "/tag-delete/" + id,
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        bootbox.alert("Xóa hoàn toàn thành công");
                        tag.showTrash();

                    },
                    error: function (errors){
                        console.log(errors);
                    }
                });
            }
        }
    });
}
$(document).ready(function () {
    tag.showData();
    tag.showTrash();
    // tag.showTrash();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
});

