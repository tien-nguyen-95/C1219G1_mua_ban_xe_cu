
    var guarantee = {} || guarantee;

    guarantee.showData = function () {
        $.ajax({
            url: "http://127.0.0.1:8000/guarantee",
            method: "GET",
            dataType: "json",
            success: function (data) {

                $('#tbGuaranteeData tbody').empty();
                $.each(data, function (i, v) {
                    $('#tbGuaranteeData tbody').append(
                        `
                        <tr>
                            <td>${++i}</td>
                            <td>${v.customer.name}
                            <td>${v.product.name}</td>
                            <td>${v.issue}</td>
                            <td>${v.date_in}</td>
                            <td>${v.date_out}</td>
                            <td>
                                <a href="javascript:;" onclick="guarantee.getModalDetail(${v.id})"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:;" onclick="guarantee.getEdit(${v.id})"><i class="fa fa-edit"></i></a>
                                <a href="javascript:;" onclick="guarantee.remove(${v.id})"><i class="fa fa-trash"></i></a>
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
    guarantee.showModal = function (){
        guarantee.resetForm();
        $('#addEditGuarantee').modal('show');
    }

    guarantee.remove = function (id) {
        bootbox.confirm({
            title: "Tạm xóa dịch vụ?",
            message: "Chuyển dịch vụ này đến mục tạm xóa ?",
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
                        url: "http://127.0.0.1:8000/guarantee/" + id,
                        method: "DELETE",
                        dataType: "json",
                        contentType: 'application/json',
                        success: function (data) {
                            guarantee.showData();
                            guarantee.showTrash();
                            bootbox.alert("Dịch vụ này đã chuyển đến mục xóa tạm");
                        }
                    });
                }
            }
        });
    }

    guarantee.getModalDetail = function (id){
        $.ajax({
            url: "http://127.0.0.1:8000/guarantee/" + id,
            method: "GET",
            dataType: "json",
            success: function (data) {

                $('#nameCustomer').text(data.customer.name);
                $('#nameProduct').text(data.product.name);
                $('#issue').text(data.issue);
                $('#nameStaff').text(data.staff.name);
                $('#nameBranch').text(data.branch.name);
                $('#dateIn').text(data.date_in);
                $('#dateOut').text(data.date_out);
            }
        });
        $('#showModalDetail').modal('show');
    }


    guarantee.resetForm = function (){

        $('#Product').val("");
        $('#Customer').val("");
        $('#Issue').val("");
        $('#Branch').val("");
        $('#Staff').val("");
        $('#Date-in').val("");
        $('#Date-out').val("");
        $('#GuaranteeId').val("0");
        $('#addEditGuarantee').find('.modal-title').text("Thêm bảo hành");
        $('.modal-footer').find('a').text('Thêm');
        $('#addEditGuarantee').find('small').empty();
        var form = $('#formAddEditGuarantee').validate();
        form.resetForm();
    }


    guarantee.getEdit = function (id){
        guarantee.resetForm();
        $.ajax({
            url: "http://127.0.0.1:8000/guarantee/" + id,
            method: "GET",
            dataType: "json",
            success: function (data) {

                $('#GuaranteeId').val(data.id);
                $('#Product').val(data.product.id);
                $('#Customer').val(data.customer_id);
                $('#Issue').val(data.issue);
                $('#Branch').val(data.branch_id);
                $('#Staff').val(data.staff_id);
                $('#Date-in').val(data.date_in);
                $('#Date-out').val(data.date_out);
                $('#addEditGuarantee').find('.modal-title').text("Sửa dịch vụ");
                $('.modal-footer').find('a').text('Sửa');
            }
        });
        guarantee.showModal();
    }


    guarantee.save = function () {
        if(guarantee.compareDate()){
            if ($('#formAddEditGuarantee').valid()) {
                // create
                if ($('#GuaranteeId').val() == 0) {
                    var objAdd = {};
                    objAdd.product_id = $('#Product').val();
                    objAdd.customer_id = $('#Customer').val();
                    objAdd.issue = $('#Issue').val();
                    objAdd.branch_id = $('#Branch').val();
                    objAdd.staff_id = $('#Staff').val();
                    objAdd.date_in = $('#Date-in').val();
                    objAdd.date_out = $('#Date-out').val();

                    $.ajax({

                        url: "http://127.0.0.1:8000/guarantee",
                        method: "POST",
                        dataType: "json",
                        contentType: 'application/json',
                        data: JSON.stringify(objAdd),
                        success: function (data) {

                            bootbox.alert("Thêm dịch vụ thành công");
                            $('#addEditGuarantee').modal('hide');
                            guarantee.showData();
                        },
                        error: function(data){

                            $.each(data.responseJSON.errors, function (i, v) {
                                $(`.error-${i}`).text(v);
                            });
                        }
                    });
                }
                //update
                else {

                    var objEdit = {};
                    objEdit.product_id = $('#Product').val();
                    objEdit.customer_id = $('#Customer').val();
                    objEdit.issue = $('#Issue').val();
                    objEdit.branch_id = $('#Branch').val();
                    objEdit.staff_id = $('#Staff').val();
                    objEdit.date_in = $('#Date-in').val();
                    objEdit.date_out = $('#Date-out').val();
                    objEdit.id =  $('input[name="GuaranteeId"]').val();

                    $.ajax({
                        url: "http://127.0.0.1:8000/guarantee/" + objEdit.id,
                        method: "PUT",
                        dataType: "json",
                        contentType: 'application/json',
                        data: JSON.stringify(objEdit),
                        success: function (data) {
                            bootbox.alert("Sửa dịch vụ thành công");
                            $('#addEditGuarantee').modal('hide');
                            guarantee.showData();

                        },
                        error: function(data){

                            $.each(data.responseJSON.errors, function (i, v) {
                                $(`.error-${i}`).text(v);
                            });
                        }
                    });
                }
            }
        }else{
            $('#checkDate').html('Ngày trả bảo hành phải sau ngày nhận bảo hành');
        };
    }


    guarantee.getProduct = function() {
        $.ajax({
            url: "http://127.0.0.1:8000/products/json",
            method: "GET",
            dataType: "json",
            success: function (data) {

                $.each(data, function (i, v){
                    $('#Product').append(
                        `<option value="${v.id}">${v.name}</option>`
                    );
                });
            }
        });
    }


    guarantee.getCustomer = function() {
        $.ajax({
            url: "http://127.0.0.1:8000/customer",
            method: "GET",
            dataType: "json",
            success: function (data) {

                $.each(data, function (i, v){
                    $('#Customer').append(
                        `<option value="${v.id}">${v.name}</option>`
                    );
                });
            }
        });
    }


    guarantee.getBranch = function() {
        $.ajax({
            url: "http://127.0.0.1:8000/branch/index",
            method: "GET",
            dataType: "json",
            success: function (data) {

                $.each(data, function (i, v){
                    $('#Branch').append(
                        `<option value="${v.id}">${v.name}</option>`
                    );
                });
            }
        });
    }


    guarantee.getStaff = function() {
        $.ajax({
            url: "http://127.0.0.1:8000/staff/index",
            method: "GET",
            dataType: "json",
            success: function (data) {

                $.each(data, function (i, v){
                    $('#Staff').append(
                        `<option value="${v.id}">${v.name}</option>`
                    );
                });
            }
        });
    }


    guarantee.getAllForeign = function(){
        guarantee.resetForm();
        guarantee.getProduct();
        guarantee.getCustomer();
        guarantee.getBranch();
        guarantee.getStaff();
    }
    guarantee.showTrash = function (){
        $.ajax({
            url: "/guarantee-trash",
            method: "GET",
            dataType: "json",
            success: function (data) {

                $('#tbGuaranteeTrash tbody').empty();

                $.each(data, function (i, v) {

                    $('#tbGuaranteeTrash tbody').append(
                        `
                        <tr>
                        <td>${++i}</td>
                        <td>${v.customer.name}
                        <td>${v.product.name}</td>
                        <td>${v.issue}</td>
                        <td>${v.date_in}</td>
                        <td>${v.date_out}</td>
                            <td>
                                <a href="javascript:;" onclick="guarantee.restore(${v.id})" class="fa fa-trash-restore"></a>
                                <a href="javascript:;" onclick="guarantee.delete(${v.id})" class="fa fa-ban"></a>
                            </td>
                        </tr>
                        `
                    );
                });
                $('#tbGuaranteeTrash').DataTable();

            },
        });
    };


    guarantee.restore = function (id){
        bootbox.confirm({
            title: "Trở lại danh sách ?",
            message: "Khôi phục mục này trở lại danh sách bảo hành ?",
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
                        url: "/guarantee-restore/" + id,
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            bootbox.alert("Khôi phục thành công");
                            guarantee.showTrash();
                            guarantee.showData();
                        },
                        error: function (errors){
                            console.log(errors);
                        }

                    });
                }
            }
        });
    };


    guarantee.delete = function(id){
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
                        url: "/guarantee-delete/" + id,
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            bootbox.alert("Xóa hoàn toàn thành công");
                            guarantee.showTrash();

                        },
                        error: function (errors){
                            console.log(errors);
                        }
                    });
                }
            }
        });
    };


    guarantee.compareDate = function () {
        var dateIn = $('#Date-in').val();
        var dateOut = $('#Date-out').val();
        return(dateOut >= dateIn);
    };

    guarantee.invalidDate = function () {
        if(guarantee.compareDate()){
            $('#checkDate').empty();
        };
    }

    guarantee.init = function () {
        guarantee.showData();
        guarantee.getAllForeign();
        guarantee.showTrash();
    }


    $(document).ready(function () {
        guarantee.init();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
    });
