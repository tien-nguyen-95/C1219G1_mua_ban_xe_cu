var bill = {} || bill;

bill.table;
bill.trashTable;

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

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

function toggleComplete (complete, id)
{
    if(complete == 0){
        return `
        <select class="custom-select" id="hehe-${id}" onchange="completeBill(${id})">
            <option value="0" selected>Đã hoàn thành</option>
            <option value="1">Chưa hoàn thành</option>
        </select>
        `;
    }else{
        return `
        <select class="custom-select" id="hehe-${id}" onchange="completeBill(${id})">
            <option value="0">Đã hoàn thành</option>
            <option value="1" selected>Chưa hoàn thành</option>
        </select>
        `;
    }
}

function completeBill(id)
{
    var objEdit = {};
    objEdit.complete = $(`#hehe-${id}`).val();
    console.log(complete);
    $.ajax({
        type: "PUT",
        url: "/bill-complete/" + id,
        contentType: 'application/json',
        data: JSON.stringify(objEdit),
        success: function (data) {
            console.log(data);   
            bill.table.ajax.reload(null,false);
            messenger("Cập nhật thành công");
        },
        error: function(errors){
            console.log(errors)
        }
    });
   
}

bill.showData = function(){
    
    bill.table = $('#tbBill').DataTable({
        ajax: {
            url : "/bill",
            dataSrc: function(jsons){
                return jsons.map(obj=>{
                    var billType = null;
                    var payment = null;
                    var completeBill = obj.complete;
                    var billId = obj.id;

                    if(obj.status == 0 ){
                        billType = '<h5><span class="badge badge-primary">Mua</span></h5>';
                        payment = formatNumber(obj.product.import_price) + ' VNĐ';
                    }else{
                        billType = '<h5><span class="badge badge-warning">Bán</span></h5>';
                        payment = formatNumber(obj.product.export_price) + ' VNĐ';
                    }
                   
                    return {
                        customer_name: obj.customer.name,
                        product_name: obj.product.name,
                        branch_name: obj.product.branch.name,
                        payment: payment,
                        billType: billType,
                        status: toggleComplete(completeBill, billId),
                        action: `
                                <a href="javascript:;" class="text-info mx-auto btn" onclick="bill.showDetail(${obj.id})" title="thông tin"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:;" class="text-warning mx-auto btn" onclick="bill.getDetail(${obj.id})" title="sửa"><i class="fa fa-edit"></i></a>
                                <a href="javascript:;" class="text-danger mx-auto btn" onclick="bill.destroy(${obj.id})" title="xóa"><i class="fa fa-trash"></i></a>
                                `
                    }
                })
            },    
        },
        columns: [
            {data: 'customer_name'},
            {data: 'product_name'},
            {data: 'branch_name'},
            {data: 'payment'},
            {data: 'billType'},
            {data: 'status'},
            {data: 'action'}
        ],
        // fnDrawCallback: function() {
        //     $(`.completeToggle`).bootstrapToggle();
        // },
    });
}

bill.showDataTrash = function(){
    
    bill.trashTable = $('#tbTrashBill').DataTable({
        ajax: {
            url : "/bill-trash",
            dataSrc: function(jsons){
                return jsons.map(obj=>{
                    var billType = null;
                    var billComplete = null;
                    var payment = null;

                    if(obj.status == 0 ){
                        billType = '<h5><span class="badge badge-primary">Mua</span></h5>';
                        payment = formatNumber(obj.product.import_price) + ' VNĐ';
                    }else{
                        payment = formatNumber(obj.product.export_price) + ' VNĐ';
                         billType = '<h5><span class="badge badge-warning">Bán</span></h5>';
                    }

                    if(obj.complete == 0){
                        billComplete = '<h5><span class="badge badge-pill badge-light">Đã hoàn thành</span></h5>';
                    }else{
                        billComplete = '<h5><span class="badge badge-pill badge-dark">Chưa hoàn thành</span></h5>';
                    } 

                    return {
                        customer_name: obj.customer.name,
                        product_name: obj.product.name,
                        branch_name: obj.product.branch.name,
                        payment: payment,
                        billType: billType,
                        status: billComplete,
                        action: `
                                <a href="javascript:;" class="text-success mx-auto btn" onclick="bill.restore(${obj.id})" title="Khôi phục"><i class="fa fa-refresh"></i></a>
                                <a href="javascript:;" class="text-danger mx-auto btn" onclick="bill.delete(${obj.id})" title="Xóa vĩnh viễn"><i class="fa fa-times"></i></a>
                                `
                    }
                })
            }
        },
        columns: [
            {data: 'customer_name'},
            {data: 'product_name'},
            {data: 'branch_name'},
            {data: 'payment'},
            {data: 'billType'},
            {data: 'status'},
            {data: 'action'}
        ]
    });
}

bill.showTrash = function()
{
    $("#billData").hide();
    $("#showModal").hide();
    $("#showTrash").hide();
    $("#titleDefine").hide();
    $("#titleTrash").attr('hidden', false);
    $("#billTrashData").attr('hidden', false);
    $("#back").attr('hidden', false);
}

bill.back = function () 
{
    $("#billData").show();
    $("#showModal").show();
    $("#showTrash").show();
    $("#titleDefine").show();
    $("#titleTrash").attr('hidden', true);
    $("#billTrashData").attr('hidden', true);
    $("#back").attr('hidden', true);
}

bill.getCustomer = function ()
{
    $.ajax({
        type: "GET",
        url: "/customer",
        dataType: "JSON",
        success: function (data) {
            // $("#customer_id").empty();
            $.each(data, function(i,v){
                $("#customer_id").append(
                    `
                    <option value="${v.id}">${v.name}</option>
                    `
                );
            });      
        }
    });
    
}

bill.getProduct = function ()
{ 
    $.ajax({
        type: "GET",
        url: "/products/json",
        dataType: "JSON",
        success: function (data) {
            // $("#branch_id").empty();
            $.each(data, function(i,v){
                // console.log('prduct: ' + v.name);
                $("#product_id").append(
                    `
                    <option value="${v.id}">${v.title}</option>
                    `
                );
            });       
        }
    });
}


bill.getPayment = function()
{
    $("#status").change(function () { 
        var status1 = $(this).val();
        let deposit = $("#deposit").val();
        if (status1  == '') {
            console.log('sản phẩm chưa có');
            $(".payment").text('Nhập loại đơn hàng');
        }else{ 
            var productId1 = $("#product_id").find(":selected").val();
            if(productId1 == ''){
                $(".payment").text('Nhập sản phẩm');
            }else{
                $.ajax({
                    type: "GET",
                    url: "/products/" + productId1,
                    data: status1,deposit,
                    dataType: "JSON",
                    success: function (data) {
                        if (status1 === '0') {
                            $(".payment").text(formatNumber(data.import_price) + " VNĐ");
                            $('#payment').val(data.import_price);
                            console.log('giá mua1');
                        } else {
                            $(".payment").text(formatNumber(data.export_price) + " VNĐ");
                            $('#payment').val(data.export_price);
                            console.log('giá bán1');
                        } 
                    } 
                });
            }
        }  
    });
  
    $("#product_id").change(function(){
        var productId = $("#product_id").val();
        let deposit = $("#deposit").val();
        console.log(productId);
        if(productId == ''){
            $(".payment").text('Nhập đơn hàng');
        }else{
            $.ajax({
                type: "GET",
                url: "/products/" + productId,
                data: deposit,
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    // $("#branch1").val(data.branch_id);
                    $('#branch').val(data.branch.id);
                    console.log(data.branch_id);
                    var statusBill = $("#status").find(":selected").val();
                    if(statusBill == ''){
                        $(".payment").text('Nhập loại đơn hàng');
                    }else{
                        if(statusBill === '0'){
                            $(".payment").text(formatNumber(data.import_price) + " VNĐ");
                            $('#payment').val(data.import_price);
                            console.log('giá mua2');
                        }else{
                            $(".payment").text(formatNumber(data.export_price) + " VNĐ");
                            $('#payment').val(data.export_price);
                            console.log('giá bán 2');
                        }   
                    }                                 
                } 
            });
        }
    });
}


bill.getDeposit = function ()
{
    
    $("#deposit").on('input ', function(){
        // var deposit2 = deposit.replace(new RegExp(',', 'g'),"");
        var payment = $("#payment").val();
        if(payment == ''){
           $(".errors-deposit").text('Vui lòng chọn sản phẩm và loại đơn hàng');
           $("#deposit").val('');
        }else{
            var deposit = $(this).val();
            console.log('đặt cọc: ' + (deposit - payment));
            $(".errors-deposit").empty();
            if(deposit - payment > 0){
                $("#deposit").val(payment);
            }
        }
        
    });
}

bill.getDetail = function (id)
{
    $(".sml-er").empty();
    $.ajax({
        url: "/bill/" + id +"/edit",
        method: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data.bills.customer_id);

            $("#billId").val(data.bills.id);

            $("#customer_id").val(data.bills.customer_id);
            $("#customer_hide").val(data.name_customer);
            
            $("#product_id").val(data.bills.product_id);
            $("#product_hide").val(data.name_product);
           
            if(data.bills.status == 0){
                $("#status_hide").val('Đơn mua hàng');
                $('#payment').val(data.import_product);
                $(".payment").text(formatNumber(data.import_product) + " VNĐ");
            }else{
                $("#status_hide").val('Đơn bán hàng');
                $('#payment').val(data.export_product);
                $(".payment").text(formatNumber(data.export_product) + " VNĐ")
            } 

            $(".edit-hide").removeAttr("hidden");
            $(".edit-show").hide();

            $("#staff_id").val(data.bills.staff_id);
            $("#branch").val(data.branch_product);

            $('#status').val(data.bills.status);
            $('#complete').val(data.bills.complete);

            $('input[name="payment_at"]').val(data.bills.payment_at);
            $('input[name="delivered_at"]').val(data.bills.delivered_at);

            $('#deposit').val(data.bills.deposit);

        
            $('#billModal').find('.modal-title').text("Cập nhật hóa đơn");
            $('#billModal').find('a').text("Cập nhật");
            $("#billModal").modal('show');
        }
    });
}

bill.showDetail = function (id)
{
    $.ajax({
        type: "GET",
        url: "/bill/" + id,
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            $("#codeBill").html(data.code_product);
            $("#cutomerInfo").html(data.customer_name);
            $("#productInfo").html(data.name_product);
            $("#staffInfo").html(data.name_staff);
            $("#branchInfo").html(data.name_branch);
            $("#depositInfo").html(formatNumber(data.bills.deposit) + " VNĐ");
            $("#paymentInfo").html(formatNumber(data.bills.payment) + " VNĐ");
            $("#remainInfo").html(formatNumber(data.name_remain) + " VNĐ"); 
            $("#statusInfo").html((data.status == 0 )? 'Đơn mua hàng': 'Đơn bán hàng');
            $("#completeInfo").html((data.complete == 0)? 'Đã hoàn thành': 'chưa hoàn thành');
            $("#payment_at_info").html(data.bills.payment_at);
            $("#delivered_at_info").html(data.bills.delivered_at);
            $("#billInfoModal").modal('show');
        }   
    });
}


bill.save = function () {
    if($('#formBill').valid()){
        if ($('#billId').val() == 0) {
            var objAdd = {};
            
            objAdd.customer_id  = $('#customer_id').val();
            objAdd.product_id   = $('#product_id').val();
            objAdd.branch_id    = $('#branch').val();
            objAdd.staff_id     = $('#staff_id').val();

            objAdd.complete     = $("#complete").val();
            objAdd.status       = $("#status").val();

            objAdd.delivered_at = $('input[name="delivered_at"]').val();
            objAdd.payment_at   = $('input[name="payment_at"]').val();
            objAdd.deposit      = $('#deposit').val();
            objAdd.payment      = $('#payment').val();
            $(".sml-er").empty();
            console.log(objAdd.staff_id);

            $.ajax({
                url: "/bill",
                type: "POST",
                dataType: "JSON",
                data: JSON.stringify(objAdd),
                contentType: 'application/json',
                success: function (data) {
                    console.log(data);
                    $('#billModal').modal('hide');
                    bill.table.ajax.reload(null,false);
                    messenger("Tạo mới thành công");
                },
                error: function(data){
                    console.log(data.responseJSON.errors);
                    $.each(data.responseJSON.errors, function(key, val) {
                        $(`.errors-${key}`).text(val);
                    });
                }
            });
        } else {
            bootbox.confirm({
                title: "Cập nhật bây giở?",
                message: "Bạn có chắc muốn sửa hóa đơn này.",
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
                        objEdit.id = $('#billId').val();
                        objEdit.customer_id = $('#customer_id').val();
                        objEdit.staff_id = $('#staff_id').val();
                        objEdit.product_id = $('#product_id').val();
                        objEdit.branch_id = $('#branch').val();
                        objEdit.status = $('#status').val();
                        objEdit.complete = $('#complete').val();
                        objEdit.payment_at = $('input[name="payment_at"]').val();
                        objEdit.delivered_at = $('input[name="delivered_at"]').val();
                        objEdit.deposit = $('#deposit').val();
                        objEdit.payment = $('#payment').val();
                        $.ajax({
                            url: "/bill/" + objEdit.id,
                            method: "PUT",
                            dataType: "JSON",
                            contentType: 'application/json',
                            data: JSON.stringify(objEdit),
                            success: function (data) {
                                $('#billModal').modal('hide');
                                bill.table.ajax.reload(null,false);
                                messenger("Cập nhật thành công");
                            },
                            error: function(data){
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

bill.destroy = function (id) 
{ 
    bootbox.confirm({
        title: "Xóa đơn hàng tạm thời",
        message: "Bạn có chắc muốn xóa bây giờ?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Không'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Có'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: "/bill/" + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: 'application/json',
                    success: function (data) {
                        bill.table.ajax.reload(null,false);
                        bill.trashTable.ajax.reload(null,false);
                        messenger("Xóa thành công");
                    }
                });
            }
        }
    });
}

bill.delete = function(id){
    bootbox.confirm({
        title: "Xóa vỉnh viễn đơn hàng",
        message: "Bạn có chắc muốn xóa bây giờ?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Không'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Có'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "/bill-delete/" + id,
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        messenger("Xóa thành công");
                        bill.trashTable.ajax.reload(null,false)
                    },
                    error: function (errors){
                        console.log(errors);
                    }
                });
            }
        }
    });
}


bill.restore = function (id){
    $.ajax({
        type: "PUT",
        url: "/bill-restore/" + id,
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            messenger("Khôi phục thành công");
            bill.table.ajax.reload(null,false);
            bill.trashTable.ajax.reload(null,false);
        },
        error: function (errors){
            console.log(errors);
        }
    });
}


bill.resetForm = function () {
    $(".edit-hide").attr('hidden', true);
    $(".edit-show").show();

    $(".sml-er").empty();
    $('#billId').val("0");
    $('#customer_id').val("");
    $('#product_id').val("");
    $('#branch').val("");
    $('#status').val("");
    $('#complete').val("");
    $('input[name="payment_at"]').val("");
    $('input[name="delivered_at"]').val("");
    $('#deposit').val('');
    $("#payment").val('');
    $('.payment').text("Trống");
    $('#billModal').find('.modal-title').text("Thêm hóa đơn");
    $('#formBill').find('a').text('Thêm');
    var form = $('#formBill').validate();
    form.resetForm();
}


bill.showModal= function()
{
    
    $('#payment_at').datetimepicker({
        format:'YYYY-MM-DD',
    });

    $('#delivered_at').datetimepicker({
        format:'YYYY-MM-DD',
    });

    bill.resetForm();
    $('#billModal').modal('show');
}

bill.init = function()
{
    bill.showData();
    bill.showDataTrash();
    bill.getProduct();
    bill.getCustomer();
    bill.getPayment();  
    bill.getDeposit();
}


$(document).ready(function () {

    bill.init();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
