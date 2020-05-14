
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
                        <td>${v.title}</td>
                        <td>${v.category}</td>
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
    $('#addEditTag').modal('show');
};
tag.remove = function (id) {
    bootbox.confirm({
        title: "Remove tag?",
        message: "Do you want to the tag move trash now ?",
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
                        bootbox.alert("Remove successfully");
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
            $('#Title').val(data.title);
            $('#TagId').val(data.id);
            $('#Category').val(data.category);
            $('#addEditTag').find('.modal-title').text("Update Tag");
            $('.modal-footer').find('a').text('Update');

            $('#addEditTag').modal('show');
        }
    });
}
tag.save = function () {
    if ($('#formAddEditTag').valid()) {
        // create
        if ($('#TagId').val() == 0) {
            var objAdd = {};
            objAdd.title = $('#Title').val();
            objAdd.category = $('#Category').val();
            console.log(objAdd);
            $.ajax({
                url: "http://127.0.0.1:8000/tag",
                method: "POST",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objAdd),
                success: function (data) {
                    console.log(data)
                    bootbox.alert("Tag has been created successfully");
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
            objEdit.category = $('#Category').val();
            objEdit.id =  $('input[type=hidden]').val();
            console.log(objEdit);
            $.ajax({
                url: "http://127.0.0.1:8000/tag/" + objEdit.id,
                method: "PUT",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objEdit),
                success: function (data) {
                    bootbox.alert("Tag has been updated successfully");
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
    $('#Category').val("");
    $('.error-title').empty();
    $('.error-category').empty();
    $('#TagId').val("0");
    $('#addEditTag').find('.modal-title').text("Create New Tag");
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
                        <td>${v.title}</td>
                        <td>${v.category}</td>
                        <td>${v.deleted_at}</td>
                        <td>
                            <a href="javascript:;" onclick="tag.restore(${v.id})" class="btn btn-info">Restore</a>
                            <a href="javascript:;" onclick="tag.delete(${v.id})" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbTagTrash').DataTable();

        },
    });
};

tag.back = function(){
    $('.container').find('h1').text('Tag');
    $('#tbTag').find('#date').text('Created_at');
    $('#create').empty();
    $('#addTag').replaceWith(
        `<a href="javascript:;" class="btn btn-info" onclick="tag.showModal()">Create</a>`
    );
};
tag.restore = function (id){
    $.ajax({
        type: "GET",
        url: "/tag-restore/" + id,
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            bootbox.alert("Khôi phục danh mục thành công");
            tag.showTrash();
            tag.showData();
        },
        error: function (errors){
            console.log(errors);
        }
    });
}

tag.delete = function(id){
    bootbox.confirm({
        title: "Xóa tag này?",
        message: "Bạn có chắc muốn xóa hoàn toàn tag này?",
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

