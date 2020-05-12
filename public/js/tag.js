
    var tag = {} || tag;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
tag.showData = function () {
    $.ajax({
        url: "http://127.0.0.1:8000/tag",
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#tbTag tbody').empty();
            $.each(data, function (i, v) {
                $('#tbTag tbody').append(
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
            $('#tbTag').DataTable();

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
    $('.container').find('h1').text('Tag Trash List');
    $('#tbTag').find('#date').text('Delete_at');
    $('#addTag').replaceWith(
        `<a href="javascript:;" class="btn btn-dark" id="back" onclick="tag.back()">Back</a>`
    );
    $.ajax({
        url: "http://127.0.0.1:8000/tag-trash",
        method: "GET",
        dataType: "json",
        success: function (data) {

            $('#tbTag tbody').empty();
            console.log(data);
            $.each(data, function (i, v) {
                // alert(v.title);
                $('#tbTag tbody').append(
                    `
                    <tr>
                        <td>${v.title}</td>
                        <td>${v.category}</td>
                        <td>${v.deleted_at}</td>
                        <td>
                            <a href="javascript:;" onclick="tag.restore(${v.id})" class="btn btn-info">Restore</a>
                            <a href="javascript:;" onclick="tag.remove(${v.id})" class="btn btn-danger">Delete</a>
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
   $.ajax({
       type: "get",
       url: "http://127.0.0.1:8000/",
       dataType: "",
       success: function (data) {
           $('body').html(data);
       }
   });
};
tag.restore = function(id){
    $.ajax({
        url: "http://127.0.0.1:8000/tag-restore/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);



        },
    });
};
$(document).ready(function () {
    tag.showData();
});

