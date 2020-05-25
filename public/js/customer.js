var customer = {} || customer;

customer.table;

function messenger(_text){
    $.toast({
        heading: 'Thông báo',
        text: _text,
        hideAfter: 2000,
        position: 'top-center',
        showHideTransition: 'slide',
        icon: 'success'
    })
}

function printErrorMsg (msg) {
    console.log(msg);
    $('span.alert-danger').remove();
    $.each( msg, function( key, value ) {
        $(`input[name=${key}]`).before(`<span class="alert-danger" >${value}</span>`);
    });
}

customer.showData = function(){
    customer.table = $('#tbCustomer').DataTable({
        ajax: {
            url : "/customer",
            dataSrc: function(jsons){
                return jsons.map(obj=>{
                    return {
                        name: obj.name,
                        email: obj.email,
                        created_at: obj.created_at,
                        action: `
                                <a href="javascript:;" class="text-info mx-auto btn" onclick="customer.show(${obj.id})" title="thông tin"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:;" class="text-warning mx-auto btn" onclick="customer.getDetail(${obj.id})" title="sửa"><i class="fa fa-edit"></i></a>
                                <a href="javascript:;" class="text-danger mx-auto btn" onclick="customer.remove(${obj.id})" title="xóa"><i class="fa fa-trash"></i></a>
                                `
                    }
                })
            }
        },
        columns: [
            {data: 'name'},
            {data: 'email'},
            {data: 'created_at'},
            {data: 'action'}
        ]
    });
}


customer.getDetail = function (id) {
    $('.errors-name').empty();
    $('.errors-phone').empty();
    $('.errors-email').empty();
    $('.errors-address').empty();
    $.ajax({
        url: "/customer/" + id +"/edit",
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#name').val(data.customers.name);
            $('#customerId').val(data.customers.id);
            $('#phone').val(data.customers.phone);
            $('#email').val(data.customers.email);
            $('#address').val(data.customers.address);
            $('#customerModal').find('.modal-title').text("Cập nhật danh mục");
            $('#customerModal').find('a').text("Cập nhật");
            $('#customerModal').modal('show');

        }
    });
}

customer.save = function () {
    if($('#formCustomer').valid()){
        if ($('#customerId').val() == 0) {
            var objAdd = {};
            objAdd.name = $('#name').val();
            objAdd.phone = $('#phone').val();
            objAdd.email = $('#email').val();
            objAdd.address = $('#address').val();
            console.log(objAdd);
            $.ajax({
                type: "POST",
                url: "/customer",
                data: JSON.stringify(objAdd),
                dataType: "JSON",
                contentType: 'application/json',
                success: function (data) {
                    console.log(data);
                    $('#customerModal').modal('hide');
                    customer.table.ajax.reload(null,false);
                    messenger("Tạo mới thành công");
                },
                error: function(data){
                    console.log(data);
                    $.each(data.responseJSON.errors, function(key, val) {
                        $(`.errors-${key}`).text(val);
                    });
                }
            });
        } else {
            bootbox.confirm({
                title: "Cập nhật bây giở?",
                message: "Bạn có chắc muốn sửa danh mục này.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Đóng'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Có'
                    }
                },
                callback: function (result) {
                    if(result){
                        var objEdit = {};
                        objEdit.id = $('#customerId').val();
                        objEdit.name = $('#name').val();
                        objEdit.phone = $('#phone').val();
                        objEdit.email = $('#email').val();
                        objEdit.address = $('#address').val();
                        console.log(objEdit);
                        $.ajax({
                            url: "/customer/" + objEdit.id,
                            method: "PUT",
                            dataType: "json",
                            contentType: 'application/json',
                            data: JSON.stringify(objEdit),
                            success: function (data) {
                                $('#customerModal').modal('hide');
                                customer.table.ajax.reload(null,false);
                                messenger("Cập nhật thành công");
                            },
                            error: function(data){
                                console.log(data);
                                $.each(data.responseJSON.errors, function(key, val) {
                                    $(`.errors-${key}`).text(val);
                                });
                            }

                        });
                    }
                }
            });
        }
    }
}

customer.remove = function(id) {
    bootbox.confirm({
        title: "Xóa khách hàng?",
        message: "Bạn có chắc muốn xóa bây giờ?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            console.log('dele');
            if (result) {
                $.ajax({
                    url: "/customer/" + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: 'application/json',
                    success: function (data) {
                        customer.table.ajax.reload(null,false);
                        // category.showTrash();
                        messenger("Xóa tạm thời thành công");
                    }
                });
            }
        }
    });
}

customer.resetForm = function () {
    $('input:hidden[name=customerId]').val("0");
    $('#name').val("");
    $('#phone').val("");
    $('#email').val("");
    $('#address').val("");
    $('.errors-name').empty();
    $('.errors-phone').empty();
    $('.errors-email').empty();
    $('.errors-address').empty();
    $('#formCustomer').find('.modal-title').text("Thêm khách hàng mới");
    $('#formCustomer').find('a').text('Thêm');
    var form = $('#formCustomer').validate();
    form.resetForm();
}

customer.show = function(id) {
    // console.log("show");
    // $('p#id').text();
    // $('p#name').text();
    // $('p#phone').text();
    // $('p#email').text();
    // $('p#address').text();
    // $('p#created_at').text();
    // $('p#updated_at').text();
    $.ajax({
        type: "GET",
        url: "/customer/" + id,
        dataType: "JSON",
        contentType: 'application/json',
        success: function (data) {
            // console.log(data.name);
            $('p#id').text(data.id);
            $('p#name').text(data.name);
            $('p#phone').text(data.phone);
            $('p#email').text(data.email);
            $('p#address').text(data.address);
            $('p#created_at').text(data.created_at);
            $('p#updated_at').text(data.updated_at);

            $("#thongtin").modal('show');
        }
    });
    
}

customer.getDataTrash = function(){
    $.ajax({
        url: "/customer-trash",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbCustomerTrash tbody').empty();
            $.each(data, function (i, v) {
                $('#tbCustomerTrash tbody').append(
                    `
                    <tr>
                        <td>${v.name}</td>
                        <td>${v.email}</td>
                        <td>${v.deleted_at}</td>
                        <td>
                            <a href="javascript:;" class="text-primary mx-auto btn" onclick="customer.restore(${v.id})" title="Khôi phục"><i class="fa fa-retweet"></i></a>
                            <a href="javascript:;" class="text-danger mx-auto btn" onclick="customer.delete(${v.id})" title="Xóa vĩnh viễn"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbCustomerTrash').DataTable();
        }
    });
}


customer.showTrash = function(){
    customer.getDataTrash();
    $("#customerTrashModal").modal('show');

}

customer.restore = function (id){
    $.ajax({
        type: "PUT",
        url: "/customer-restore/" + id,
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            messenger("Khôi phục thành công");
            customer.getDataTrash();
            customer.table.ajax.reload(null,false);
        },
        error: function (errors){
            console.log(errors);
        }
    });
}

customer.delete = function(id){
    bootbox.confirm({
        title: "Xóa vỉnh viễn khách hàng?",
        message: "Bạn có chắc muốn xóa bây giờ?",
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
                    url: "/customer-delete/" + id,
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        messenger("Xóa thành công");
                        customer.getDataTrash();
                    },
                    error: function (errors){
                        console.log(errors);
                    }
                });
            }
        }
    });
}


customer.showModal = function(){
    customer.resetForm();
    $('#customerModal').modal('show');
}


customer.init = function() {

    customer.showData();

}


$(document).ready(function () {

    customer.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
